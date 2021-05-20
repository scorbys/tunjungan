<?php
class M_pembelian extends CI_Model{

  function tampil_data(){
    $query=$this->db->query("SELECT * FROM v_pembelian order bY id DESC");
    return $query;
  }

  function edit_data($a){
    $query=$this->db->query("SELECT * FROM v_pembelian WHERE id = '$a'");
    return $query;
  }

  function detail_pembelian($a){
    $query=$this->db->query("SELECT * FROM v_pembelian_detail WHERE id_pembelian = '$a'");
    return $query;
  }

  function barang_list(){
    $hasil=$this->db->query("SELECT * FROM tbl_pembelian");
    return $hasil->result();
  }
  function saverecords($ongkir)
	{
		$query="INSERT INTO `tbl_pembelian`( `ongkir`) 
		VALUES ('$ongkir')";
		$this->db->query($query);
	}
}