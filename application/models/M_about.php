<?php
class M_about extends CI_Model{

    function tampil_data(){
      $query=$this->db->query("SELECT * FROM tbl_setting LIMIT 1");
      return $query;
    }
}