<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_akun');
		$this->load->model('m_anggota');
		$this->load->model('m_simpanan');

		if($this->is_not_login()){
			redirect(base_url('login'));
		}

        if($this->is_not_keanggotaan()){
			show_404();
		}
    }

	public function index()
	{
		$data["title"]		= "Data Transaksi";
		$data['pokok']		= $this->m_simpanan->tampil_data('pokok')->result();
		$data['wajib']		= $this->m_simpanan->tampil_data('wajib')->result();
		$data['sukarela']	= $this->m_simpanan->tampil_data('sukarela')->result();
		$this->load->view('keanggotaan/head',$data);
		$this->load->view('keanggotaan/menu',$data);
		$this->load->view('keanggotaan/404',$data);
		$this->load->view('keanggotaan/footer',$data);
    }

	public function simpanan()
	{
		$data["title"]		= "Data Laporan";
		$data['simpanan']	= $this->m_simpanan->tampil_simpanan()->result();
		$this->load->view('keanggotaan/head',$data);
		$this->load->view('keanggotaan/menu',$data);
		$this->load->view('keanggotaan/laporan-simpanan',$data);
		$this->load->view('keanggotaan/footer',$data);
	}
	
	public function cetak($a)
	{
		switch ($a) {
			case 'simpanan':
				$data['simpanan']	= $this->m_simpanan->tampil_simpanan()->result();
				$this->load->view('keanggotaan/cetak-laporan-simpanan',$data);
				break;
			
			default:
				# code...
				break;
		}
	}
}