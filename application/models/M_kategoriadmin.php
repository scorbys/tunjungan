<?php
class M_kategoriadmin extends CI_Model{

  function tampil_data(){
    $query=$this->db->query("SELECT * FROM tbl_kategori order by id DESC");
    return $query;
  }

  function edit_data($a){
    $query=$this->db->query("SELECT * FROM tbl_kategori WHERE id = '$a'");
    return $query;
  }
  
  function cari_produk($a){
    $query=$this->db->query("SELECT * FROM tbl_kategori WHERE nama LIKE '%$a%' OR barcode LIKE '%$a%'")->result();
    return $query;
  }

  function tampil_kategori(){
    $query=$this->db->query("SELECT * FROM tbl_kategori");
    return $query;
  }
}