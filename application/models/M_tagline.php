<?php
class M_tagline extends CI_Model{

  function tampil_data(){
    $query=$this->db->query("SELECT * FROM tb_tagline");
    return $query;
  }

  function edit_data($a){
    $query=$this->db->query("SELECT * FROM tb_tagline WHERE id = '$a'");
    return $query;
  }
}