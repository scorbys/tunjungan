<?php
class M_kategori extends CI_Model{

  function tampil_data(){
    $query=$this->db->query("SELECT * FROM tbl_category");
    return $query;
  }

  function edit_data($a){
    $query=$this->db->query("SELECT * FROM tbl_category WHERE cid = '$a'");
    return $query;
  }
}