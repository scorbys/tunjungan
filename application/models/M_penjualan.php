<?php
class M_penjualan extends CI_Model{

    function tampil_penjualan_kasir_harian(){
        $query=$this->db->query("SELECT id_petugas, nama_admin, substr(tgl_transaksi,1,10) AS tgl_transaksi, SUM(harga_total) AS total_transaksi FROM `v_transaksi` WHERE id_pembayaran = 3 GROUP BY id_petugas, substr(tgl_transaksi,1,10) ORDER BY substr(tgl_transaksi,1,10)DESC");
        return $query;
    }
    
    function tampil_penjualan_kasir_harianNota($tgl,$nama){
        $query=$this->db->query("SELECT
        tbl_transaksi.id,
        tbl_admin.nama,
        tbl_transaksi.harga_total,
        tbl_transaksi.uang_masuk,
        tbl_transaksi.uang_kembali,
        tbl_transaksi.tgl_transaksi,
        tbl_pembayaran.nama AS metode
        FROM
        tbl_transaksi
        INNER JOIN tbl_admin ON tbl_transaksi.id_admin = tbl_admin.id
        INNER JOIN tbl_pembayaran ON tbl_transaksi.id_pembayaran = tbl_pembayaran.id
        WHERE
        tbl_transaksi.tgl_transaksi LIKE '%$tgl%' AND
        tbl_admin.nama = '$nama'
        ORDER BY
        tbl_transaksi.id DESC      
        ");
        return $query;
    }
    function tampil_penjualan_kasir_harianNotaItem($id){
        $query=$this->db->query("SELECT
        tbl_transaksi.id,
        tbl_transaksi.harga_total,
        tbl_transaksi.tgl_transaksi,
        tbl_transaksi_detail.jumlah,
        tbl_transaksi_detail.harga,
        tbl_transaksi_detail.total_poin,
        tbl_transaksi_detail.diskon,
        tbl_admin.nama AS kasir,
        tbl_produk.nama AS produk
        FROM
        tbl_transaksi
        INNER JOIN tbl_transaksi_detail ON tbl_transaksi.id = tbl_transaksi_detail.id_transaksi
        INNER JOIN tbl_admin ON tbl_transaksi.id_admin = tbl_admin.id
        INNER JOIN tbl_produk ON tbl_transaksi_detail.id_produk = tbl_produk.id
        WHERE
        tbl_transaksi.id = '$id'
        ORDER BY
        tbl_transaksi.id DESC
             
        ");
        return $query;
    }
    function tampil_penjualan_terlaris(){
        $query=$this->db->query("SELECT
        Sum(tbl_transaksi_detail.jumlah) AS qty,
        tbl_produk.nama AS produk,
        SUBSTRING(tbl_transaksi.tgl_transaksi, 1, 7) AS tanggal 
        FROM
        tbl_transaksi_detail
        INNER JOIN tbl_produk ON tbl_transaksi_detail.id_produk = tbl_produk.id
        INNER JOIN tbl_transaksi ON tbl_transaksi.id = tbl_transaksi_detail.id_transaksi
        GROUP BY
        SUBSTRING(tbl_transaksi.tgl_transaksi, 1, 7) ,
        tbl_produk.id 
        ORDER BY
        SUBSTRING(tbl_transaksi.tgl_transaksi, 1, 7) DESC,
        Sum(tbl_transaksi_detail.jumlah) DESC
        ");
        return $query;
    }
    function exportItemTerjual($nama,$tgl){
        $query=$this->db->query("SELECT
        Sum(tbl_transaksi_detail.jumlah) AS qty,
        tbl_produk.nama AS produk,
        tbl_transaksi.tgl_transaksi,
        tbl_admin.nama
        FROM
        tbl_transaksi_detail
        INNER JOIN tbl_produk ON tbl_transaksi_detail.id_produk = tbl_produk.id
        INNER JOIN tbl_transaksi ON tbl_transaksi.id = tbl_transaksi_detail.id_transaksi
        INNER JOIN tbl_admin ON tbl_transaksi.id_admin = tbl_admin.id
        WHERE
        tbl_admin.nama = '$nama' AND
        tbl_transaksi.tgl_transaksi LIKE '%$tgl%'
        GROUP BY
        tbl_produk.id
        ORDER BY
        tbl_transaksi.tgl_transaksi ASC
        
        ");
        return $query;
    }
}