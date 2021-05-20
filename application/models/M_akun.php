<?php
class M_akun extends CI_Model{

  function cek_admin($a){
    $query  = $this->db->query("SELECT * FROM tbl_admin WHERE id = '$a' LIMIT 1");
    return $query;
  }

  function cek_username($a){
    $query  = $this->db->query("SELECT * FROM tbl_admin WHERE username = '$a' LIMIT 1");
    return $query;
  }
}