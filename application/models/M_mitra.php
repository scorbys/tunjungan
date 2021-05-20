<?php
class M_mitra extends CI_Model{

    function tampil_koperasi(){
        $query=$this->db->query("SELECT * FROM tbl_koperasi order by nama ASC");
        return $query;
    }
    
    function edit_data($a){
        $query=$this->db->query("SELECT * FROM tbl_koperasi WHERE id = '$a'");
        return $query;
    }
}