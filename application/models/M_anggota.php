<?php
class M_anggota extends CI_Model{

  function tampil_data(){
    $query=$this->db->query("SELECT * FROM v_user order by id_user DESC");
    return $query;
  }

  function tampil_notifikasi(){
    $query=$this->db->query("SELECT * FROM tbl_notif_broadcast GROUP BY judul,keterangan,tanggal ORDER BY tanggal DESC");
    return $query;
  }

  function edit_data($a){
    $query=$this->db->query("SELECT * FROM v_user WHERE id_user = '$a'");
    return $query;
  }
    
  function cari_anggota($a){
    $query=$this->db->query("SELECT * FROM v_user WHERE no_anggota LIKE '%$a%'")->result();
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
		$query=$this->db->query("SELECT * FROM tbl_kelurahan WHERE id_kecamatan = '$a' ORDER BY id_kelurahan ASC");
		return $query;
    }
}