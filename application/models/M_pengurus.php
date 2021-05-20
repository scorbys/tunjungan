<?php
class M_pengurus extends CI_Model{

  function tampil_data(){
    $query=$this->db->query("SELECT * FROM tbl_admin order by level ASC");
    return $query;
  }

  function edit_data($a){
    $query=$this->db->query("SELECT * FROM tbl_admin WHERE id = '$a'");
    return $query;
  }
}