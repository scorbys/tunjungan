<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_akun');
		$this->load->model('m_crud');
		$this->load->model('m_transaksi');

		if($this->is_not_login()){
			redirect(base_url('login'));
		}

        if($this->is_not_kasir()){
			show_404();
		}
    }

	public function Riwayat()
	{
		$data["title"]		= "Data Penjualan";
		$data['riwayat']	= $this->m_transaksi->riwayat_transaksi_kasir($this->session->userdata('tunjungan@id_user'))->result();
		$this->load->view('kasir/head',$data);
		$this->load->view('kasir/menu',$data);
		$this->load->view('kasir/riwayat-penjualan',$data);
		$this->load->view('kasir/footer',$data);
	}

	public function cetak($a)
	{
		$data['kasir']			= $this->session->userdata('tunjungan@id_user');
		foreach($this->m_transaksi->edit_data3($a)->result() as $b){
			$data['total']		= $b->harga_total;
			$data['kembalian']	= $b->uang_kembali;
			$data['masuk']		= $b->uang_masuk;
			$data['tanggal']	= $b->tgl_transaksi;
		}
		$data['detail']			= $this->m_transaksi->tampil_detail($a)->result();
		$this->load->view('kasir/cetak-nota',$data);
	}
}