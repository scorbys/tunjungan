<?php
class M_retur extends CI_Model{

  function tampil_data(){
    $query=$this->db->query("SELECT * FROM v_retur order by id DESC");
    return $query;
  }

    function today(){
        $query=$this->db->query("SELECT * FROM v_retur WHERE substr(tgl_transaksi,0,10) = date(now()) order by id ASC");
        return $query;
    }

    function tampil_data_kode($a){
        $query=$this->db->query("SELECT * FROM v_retur WHERE kode_faktur = '$a'");
        return $query;
    }

    function tampil_detail_kode($a){
        $query=$this->db->query("SELECT * FROM v_retur_detail WHERE kode_faktur = '$a'");
        return $query;
    }

    function edit_data($a){
        $query=$this->db->query("SELECT * FROM v_retur WHERE id = '$a'");
        return $query;
    }

    function tampil_detail($a){
        $query=$this->db->query("SELECT * FROM v_retur_detail WHERE id_retur = '$a'");
        return $query;
    }
 
}