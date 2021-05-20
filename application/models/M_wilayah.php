<?php
class M_wilayah extends CI_Model{

  	function tampil_kabupaten(){
		$query=$this->db->query("SELECT * FROM tbl_kabupaten WHERE id_kabupaten > 1 ORDER BY kabupaten ASC");
		return $query;
  	}

  	function tampil_kecamatan(){
		$query=$this->db->query("SELECT tbl_kecamatan.id_kecamatan, tbl_kabupaten.kabupaten, tbl_kabupaten.id_kabupaten, tbl_kecamatan.kecamatan, tbl_kabupaten.id_provinsi FROM tbl_kecamatan LEFT JOIN tbl_kabupaten ON tbl_kecamatan.id_kabupaten = tbl_kabupaten.id_kabupaten WHERE tbl_kecamatan.id_kecamatan > 1 ORDER BY tbl_kecamatan.kecamatan ASC");
		return $query;
  	}

  	function tampil_kelurahan(){
		$query=$this->db->query("SELECT tbl_kelurahan.id_kelurahan, tbl_kelurahan.kelurahan, tbl_kecamatan.id_kecamatan, tbl_kecamatan.kecamatan, tbl_kabupaten.id_kabupaten, tbl_kabupaten.kabupaten, tbl_kabupaten.id_provinsi FROM tbl_kelurahan LEFT JOIN tbl_kecamatan ON tbl_kelurahan.id_kecamatan = tbl_kecamatan.id_kecamatan LEFT JOIN tbl_kabupaten ON tbl_kecamatan.id_kabupaten = tbl_kabupaten.id_kabupaten WHERE tbl_kelurahan.id_kelurahan > 1 ORDER BY tbl_kelurahan.kelurahan ASC");
		return $query;
	}

	function edit_kabupaten($a)
	{
		$query=$this->db->query("SELECT * FROM tbl_kabupaten WHERE id_kabupaten = '$a'");
		return $query;
	}

	function edit_kecamatan($a)
	{
		$query=$this->db->query("SELECT tbl_kecamatan.id_kecamatan, tbl_kabupaten.kabupaten, tbl_kabupaten.id_kabupaten, tbl_kecamatan.kecamatan, tbl_kabupaten.id_provinsi FROM tbl_kecamatan LEFT JOIN tbl_kabupaten ON tbl_kecamatan.id_kabupaten = tbl_kabupaten.id_kabupaten WHERE tbl_kecamatan.id_kecamatan = '$a'");
		return $query;
	}


	function edit_kelurahan($a)
	{
		$query=$this->db->query("SELECT tbl_kelurahan.id_kelurahan, tbl_kelurahan.kelurahan, tbl_kelurahan.kode, tbl_kecamatan.id_kecamatan, tbl_kecamatan.kecamatan, tbl_kabupaten.id_kabupaten, tbl_kabupaten.kabupaten, tbl_kabupaten.id_provinsi FROM tbl_kelurahan LEFT JOIN tbl_kecamatan ON tbl_kelurahan.id_kecamatan = tbl_kecamatan.id_kecamatan LEFT JOIN tbl_kabupaten ON tbl_kecamatan.id_kabupaten = tbl_kabupaten.id_kabupaten WHERE tbl_kelurahan.id_kelurahan = '$a'");
		return $query;
	}


	function kabupaten($a){
		$query=$this->db->query("SELECT * FROM tbl_kabupaten WHERE id_provinsi = '$a' OR id_kabupaten = 1 ORDER BY id_kabupaten ASC");
		return $query;
	}
	
	function kecamatan($a){
		$query=$this->db->query("SELECT * FROM tbl_kecamatan WHERE id_kabupaten = '$a' OR id_kecamatan = 1 ORDER BY id_kecamatan ASC");
		return $query;
	}
	
	function kelurahan($a){
		$query=$this->db->query("SELECT * FROM tbl_kelurahan WHERE id_kecamatan = '$a' OR id_kelurahan = 1 ORDER BY id_kelurahan ASC");
		return $query;
  }
}