<?php
class M_supplier extends CI_Model{

  function tampil_data(){
    $query=$this->db->query("SELECT * FROM tbl_kontak order by nama ASC");
    return $query;
  }

  function edit_data($a){
    $query=$this->db->query("SELECT * FROM tbl_kontak Where id = '$a'");
    return $query;
  }
}