<?php
class M_iklan extends CI_Model{

  function tampil_data(){
    $query=$this->db->query("SELECT * FROM tb_iklan");
    return $query;
  }

  function edit_data($a){
    $query=$this->db->query("SELECT * FROM tb_iklan WHERE banner_id = '$a'");
    return $query;
  }
}