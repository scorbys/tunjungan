<?php
class M_riwayat extends CI_Model{

    function tampil_data($a){
        switch ($a) {
            case 'sukarela':
                $query = $this->db->query("SELECT * FROM v_sukarela ORDER BY no_anggota ASC");
                break;
            
            case 'wajib':
                $query = $this->db->query("SELECT * FROM v_wajib ORDER BY no_anggota ASC");
            break;

            default:
            $query = $this->db->query("SELECT * FROM v_pokok ORDER BY no_anggota ASC");
                break;
        }
        return $query;
    }
}