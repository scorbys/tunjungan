<?php
class Ajaxsearch_model extends CI_Model
{
	function fetch_data($a)
	{
		//$query=$this->db->query("SELECT * FROM tbl_produk_ppob WHERE penyedia LIKE '%$a%' AND kategori = 'pulsa'");
		$query=$this->db->query("SELECT *, tbl_produk_agratek.harga+tbl_produk_agratek.fee_vikosha+tbl_produk_agratek.biaya_admin AS harga_jual FROM tbl_produk_agratek WHERE penyedia LIKE '%$a%' AND kategori = 'pulsa' AND status = 'ACTIVE'");
		return $query;		
	}
	
	function fetch_data_paket($a)
	{
		//$query=$this->db->query("SELECT * FROM tbl_produk_ppob WHERE penyedia LIKE '%$a%' AND kategori = 'pulsa'");
		$query=$this->db->query("SELECT *, tbl_produk_agratek.harga+tbl_produk_agratek.fee_vikosha+tbl_produk_agratek.biaya_admin AS harga_jual FROM tbl_produk_agratek WHERE penyedia LIKE '%$a%' AND kategori = 'data' AND status = 'ACTIVE'");
		return $query;		
	}
	
	function fetch_plntoken($a)
	{
		//$query=$this->db->query("SELECT * FROM tbl_produk_ppob WHERE penyedia LIKE '%$a%' AND kategori = 'pulsa'");
		$query=$this->db->query("SELECT *, tbl_produk_agratek.harga+tbl_produk_agratek.fee_vikosha+tbl_produk_agratek.biaya_admin AS harga_jual FROM tbl_produk_agratek WHERE penyedia LIKE '%$a%' AND kategori = 'plntoken' AND status = 'ACTIVE'");
		return $query;		
	}
}
?>