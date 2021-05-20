<?php
class M_pelaporan extends CI_Model{

    function tampil_data(){
      $query=$this->db->query("SELECT * FROM tbl_transaksi LIMIT 1");
      return $query;
    }
    public function General($sql){  
      return $this->db->query($sql);
   }
}