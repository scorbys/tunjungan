<?php

class M_crud extends CI_Model{

    function tambah_data($data,$tabel){
        $this->db->insert($tabel, $data);
    }

    function insert_multiple($data,$tabel){
        $this->db->insert_batch($tabel, $data);
    }

    function update_data($tabel,$data,$where){
    	$this->db->where($where);
        $this->db->update($tabel, $data);
        return TRUE;
    }

    function hapus($tabel,$where)
    {
        $this->db->where($where);
        $this->db->delete($tabel);
    }
}