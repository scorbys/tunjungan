<?php
class M_promo extends CI_Model{

  function tampil_data(){
    $query=$this->db->query("SELECT * FROM tbl_promo");
    return $query;
  }

  function tampil_detail($a){
    $query=$this->db->query("SELECT * FROM v_promo_detail WHERE id_promo = '$a'");
    return $query;
  }

  function tampil_detail_kd($a){
    $query=$this->db->query("SELECT * FROM v_promo_detail WHERE kd_promo = '$a'");
    return $query;
  }
    
  function cari_promo($a){
    $query=$this->db->query("SELECT * FROM tbl_promo WHERE kd_promo LIKE '%$a%' LIMIT 1")->result();
    return $query;
  }

  function edit_data($a){
    $query=$this->db->query("SELECT * FROM tbl_promo WHERE id = '$a'");
    return $query;
  }

  function kode_promo($a){
    $query=$this->db->query("SELECT * FROM tbl_promo WHERE kd_promo = '$a' LIMIT 1");
    return $query;
  }
}