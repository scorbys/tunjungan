<?php
class M_login extends CI_Model{

    function cek_login($username,$password){
		$query=$this->db->query("SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password' AND level = 1 LIMIT 1");
		return $query;
	}

    function cek_kasir($username,$password){
		$query=$this->db->query("SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password' AND level = 2 LIMIT 1");
		return $query;
	}

    function cek_keanggotaan($username,$password){
		$query=$this->db->query("SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password' AND level = 3 LIMIT 1");
		return $query;
	}
    
}