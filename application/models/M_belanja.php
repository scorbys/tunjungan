<?php
class M_belanja extends CI_Model{

  function tampil_data(){
    $query=$this->db->query("SELECT * FROM v_blj group by id_trx DESC");
    return $query;
  }

  function belanja($a){
    $query=$this->db->query("SELECT * FROM v_blj WHERE id_user = '$a' OR status_trx = '' LIMIT 1");
    return $query;
  }

  function detail_belanja($a){
    $query=$this->db->query("SELECT * FROM v_blj_tmp WHERE id_user = '$a' AND aktif = 'Y'");
    return $query;
  }

  function belanja1($a){
    $query=$this->db->query("SELECT * FROM v_blj1 WHERE id_trx = '$a' LIMIT 1");
    return $query;
  }

  function detail_belanja1($a){
    $query=$this->db->query("SELECT
tb_blj_tmp.id,
tb_blj_tmp.id_user,
tbl_mp3.mp3_title,
tbl_mp3.total_rate AS harga,
tbl_mp3.diskon,
tb_blj_tmp.jumlah,
tb_blj_tmp.tgl,
tb_blj_tmp.id_trx,
tb_blj_tmp.`status`
FROM
tb_blj_tmp
LEFT JOIN tbl_mp3 ON tb_blj_tmp.id_barang = tbl_mp3.id

 WHERE id_trx = '$a'");
    return $query;
  }
}