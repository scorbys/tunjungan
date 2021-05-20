<?php
class M_simpanan extends CI_Model{

  function tampil_data($a){
    switch ($a) {
      case 'sukarela':
        $query      = $this->db->query("SELECT * FROM v_total_sukarela ORDER BY no_anggota ASC");
        break;
      
      case 'wajib':
        $query      = $this->db->query("SELECT * FROM v_total_wajib ORDER BY no_anggota ASC");
      break;

      default:
      $query        = $this->db->query("SELECT * FROM v_total_pokok ORDER BY no_anggota ASC");
        break;
    }    
    return $query;
  }

  function tampil_data_kasir($a){
    $kasir          = $this->session->userdata('7indora@id_user');
    switch ($a) {
      case 'sukarela':
        $query      = $this->db->query("SELECT * FROM v_sukarela where id_admin = '$kasir' ORDER BY no_anggota ASC");
        break;
        
      case 'wajib':
        $query      = $this->db->query("SELECT * FROM v_wajib where id_admin = '$kasir' ORDER BY no_anggota ASC");
        break;

      default:
        show_404();
        break;
    }    
    return $query;
  }

  function edit_data($a,$b){
    switch ($a) {
      case 'sukarela':
        $query      = $this->db->query("SELECT * FROM v_sukarela WHERE id_simpanan = '$b'");
        break;
        
      case 'wajib':
        $query      = $this->db->query("SELECT * FROM v_wajib WHERE id_simpanan = '$b'");
        break;

      default:
        $query      = $this->db->query("SELECT * FROM v_pokok WHERE id_simpanan = '$b'");
        break;
    }    
    return $query;
  }

  function tampil_pengambilan(){
    $query  = $this->db->query("SELECT tbl_pengambilan_sukarela.id_pengambilan,tbl_admin.id AS id_admin,tbl_admin.nama AS nama_admin,tbl_user.id_user,tbl_user.no_anggota,tbl_user.nama AS nama_anggota,tbl_pengambilan_sukarela.nominal,tbl_pengambilan_sukarela.tanggal,tbl_pengambilan_sukarela.kode_unik,tbl_pengambilan_sukarela.`status` FROM tbl_pengambilan_sukarela INNER JOIN tbl_admin ON tbl_pengambilan_sukarela.id_admin = tbl_admin.id INNER JOIN tbl_user ON tbl_pengambilan_sukarela.id_user = tbl_user.id_user ORDER BY tbl_pengambilan_sukarela.id_pengambilan DESC");
    return $query;
  }

  function edit_pengambilan($a){
    $query  = $this->db->query("SELECT tbl_pengambilan_sukarela.id_pengambilan,tbl_pengambilan_sukarela.id_admin,tbl_user.id_user,tbl_user.no_anggota,tbl_user.nama,tbl_kelurahan.id_kelurahan,tbl_kelurahan.kelurahan,tbl_pengambilan_sukarela.nominal,tbl_pengambilan_sukarela.tanggal FROM tbl_pengambilan_sukarela LEFT JOIN tbl_user ON tbl_pengambilan_sukarela.id_user = tbl_user.id_user LEFT JOIN tbl_kelurahan ON tbl_user.id_kelurahan = tbl_kelurahan.id_kelurahan WHERE tbl_pengambilan_sukarela.id_pengambilan = '$a'");
    return $query;
  }

  function tampil_all(){
    $query  = $this->db->query("SELECT * FROM v_total_simpanan_all");
    return $query;
  }

  function tampil_simpanan(){
    $query  = $this->db->query("SELECT * FROM v_total_simpanan");
    return $query;
  }
}