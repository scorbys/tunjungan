<?php
class M_shu extends CI_Model{

  function tampil_data($a){
    $query=$this->db->query("SELECT * FROM v_shu WHERE periode = '$a'");
    return $query;
  }

  function edit_data($a){
    $query=$this->db->query("SELECT * FROM v_shu WHERE id = '$a'");
    return $query;
  }

  function tampil_akumulasi(){
    $query=$this->db->query("SELECT SUM(v_total_simpanan.total_pokok) AS pokok, SUM(v_total_simpanan.total_wajib) AS wajib, SUM(v_total_simpanan.total_pokok)+SUM(v_total_simpanan.total_wajib) AS akumulasi FROM v_total_simpanan");
    return $query;
  }
}