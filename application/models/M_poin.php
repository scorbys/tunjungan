<?php
class M_poin extends CI_Model{

    function tampil_data(){
      $query=$this->db->query("SELECT * FROM v_tukar_poin");
      return $query;
    }

    function tampil_hadiah(){
      $query=$this->db->query("SELECT * FROM tb_hadiah");
      return $query;
    }

    function tampil_detail(){
      $query=$this->db->query("SELECT * FROM v_detail_poin");
      return $query;
    }

    function edit_data($a){
      $query=$this->db->query("SELECT * FROM v_tukar_poin WHERE id_tukar_poin = '$a'");
      return $query;
    }

    function edit_hadiah($a){
      $query=$this->db->query("SELECT * FROM tb_hadiah WHERE id_hadiah = '$a'");
      return $query;
    }

    function tampil_data_anggota($a){
      $query=$this->db->query("SELECT * FROM v_tukar_poin WHERE id_user = '$a'");
      return $query;
    }
}