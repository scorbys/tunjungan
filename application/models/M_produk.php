<?php
class M_produk extends CI_Model{

  function tampil_data_log(){
    $query=$this->db->query("SELECT tbl_admin.nama AS admin,tb_log_produk.* FROM tb_log_produk INNER JOIN tbl_admin ON tb_log_produk.id_admin = tbl_admin.id order by date DESC");
    return $query;
  }
  function tampil_data(){
    $query=$this->db->query("SELECT * FROM v_produk order by id DESC");
    return $query;
  }

  function edit_data($a){
    $query=$this->db->query("SELECT * FROM tbl_produk WHERE id = '$a'");
    return $query;
  }

  function lihat_produk($a){
    $query=$this->db->query("SELECT * FROM tbl_produk WHERE barcode = '$a' LIMIT 1");
    return $query;
  }

  function stok_opname_kasir($a){
    $query=$this->db->query("SELECT * FROM v_stok_opname WHERE id_admin = '$a' AND substr(tanggal,1,10) = date(now()) ORDER BY id DESC");
    return $query;
  }
    
  function cari_produk($a){
    $query=$this->db->query("SELECT * FROM v_produk WHERE barcode LIKE '%$a%' LIMIT 10")->result();
    return $query;
  }
    
  function cari_nama_produk($a){
    $query=$this->db->query("SELECT * FROM v_produk WHERE nama LIKE '%$a%' LIMIT 10")->result();
    return $query;
  }
    
  function cari_produknya($a,$b){
    $query=$this->db->query("SELECT * FROM v_pembelian_detail WHERE barcode LIKE '%$a%' AND id_pembelian = '$b'")->result();
    return $query;
  }

  function tampil_kategori(){
    $query=$this->db->query("SELECT * FROM tbl_kategori");
    return $query;
  }
}