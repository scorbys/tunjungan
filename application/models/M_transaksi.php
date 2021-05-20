<?php
class M_transaksi extends CI_Model{

    function id_firebase($a){
        $query=$this->db->query("SELECT tbl_transaksi.kodeunik, tbl_user.id_user, tbl_user.id_firebase
        FROM tbl_transaksi INNER JOIN tbl_user ON tbl_transaksi.id_user = tbl_user.id_user
        WHERE tbl_transaksi.id = '$a'
        ");
    return $query;
  }
  function tampil_data(){
    $query=$this->db->query("SELECT * FROM v_transaksi order by id DESC");
    return $query;
  }

  function edit_data($a){
    $query=$this->db->query("SELECT * FROM v_transaksi WHERE kodeunik = '$a' LIMIT 1");
    return $query;
  }

  function edit_data2($a){
    $query=$this->db->query("SELECT * FROM v_transaksi WHERE id = '$a' LIMIT 1");
    return $query;
  }

  function edit_data3($a){
    $query=$this->db->query("SELECT * FROM v_transaksi WHERE id = '$a' LIMIT 1");
    return $query;
  }

  function tampil_detail($a){
    $query=$this->db->query("SELECT * FROM v_transaksi_detail WHERE id_transaksi = '$a' order by id DESC");
    return $query;
  }

  function riwayat_transaksi_kasir($a){
    $query=$this->db->query("SELECT * FROM v_transaksi WHERE id_petugas = '$a' order by id DESC");
    return $query;
  }

  function tampil_pembayaran(){
    $query=$this->db->query("SELECT * FROM v_bayar_apk order by tgl DESC");
    return $query;
  }

  function edit_pembayaran($a){
    $query=$this->db->query("SELECT * FROM v_bayar_apk WHERE id = '$a' LIMIT 1");
    return $query;
  }
}