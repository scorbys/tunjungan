<?php
class M_penerimaan extends CI_Model{
 
  function tampil_data(){
    $query=$this->db->query("SELECT * FROM v_pembelian_diterima ORDER BY id");
    return $query;
  }
 
  function edit_data($a){
    $query=$this->db->query("SELECT * FROM v_pembelian_diterima WHERE id = '$a'");
    return $query;
  }

 
  function detail_penerimaan($a){
    $query=$this->db->query("SELECT * FROM v_pembelian_diterima WHERE id_pembelian = '$a'");
    return $query;
  }

}