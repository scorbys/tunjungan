<?php
class M_banner extends CI_Model{

  function tampil_data(){
    $query=$this->db->query("SELECT * FROM tbl_promo");
    return $query;
  }

  function edit_data($a){
    $query=$this->db->query("SELECT * FROM tbl_promo WHERE id = '$a'");
    return $query;
  }
}