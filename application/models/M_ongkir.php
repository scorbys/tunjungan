<?php
class M_ongkir extends CI_Model{

    function tampil_data(){
        $query=$this->db->query("SELECT * FROM tbl_ongkir");
        return $query;
    }
    
    function edit_data($a){
        $query=$this->db->query("SELECT * FROM tbl_ongkir WHERE id = '$a'");
        return $query;
    }
}