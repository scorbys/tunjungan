<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shu extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_akun');
		$this->load->model('m_crud');
		$this->load->model('m_anggota');
		$this->load->model('m_shu');
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
		$data["title"]		= "Data Laporan";
		$data['shu']		= $this->m_shu->tampil_data(date('Y'))->result();
		$this->load->view('keanggotaan/head',$data);
		$this->load->view('keanggotaan/menu',$data);
		$this->load->view('keanggotaan/data-shu',$data);
		$this->load->view('keanggotaan/footer',$data);
	}
	
	public function perbaharui()
	{
		$data["title"]		= "Data Laporan";
		$data['shu']		= $this->m_shu->tampil_data(date('Y'))->result();
		$data['akumulasi']	= $this->m_shu->tampil_akumulasi()->row()->akumulasi;
		$this->load->view('keanggotaan/head',$data);
		$this->load->view('keanggotaan/menu',$data);
		$this->load->view('keanggotaan/perbaharui-shu',$data);
		$this->load->view('keanggotaan/footer',$data);
	}

	public function aksi_pembaharuan(){
		$tanggal			= $_POST['tanggal'];
		$nominal_shu		= str_replace(".", "", $_POST['nominal_shu']);
		$akumulasi			= $_POST['akumulasi'];
		$periode			= substr($tanggal,0,4);

        $tabel				= "tbl_shu";
		$where 				= array('periode' => $periode);
		
		$this->m_crud->hapus($tabel,$where);

		foreach($this->m_simpanan->tampil_simpanan()->result() as $a){
			$id_user		= $a->id_user;
			$total_pokok	= $a->total_pokok;
			$total_wajib	= $a->total_wajib;
			$akum_simpanan	= $total_pokok+$total_wajib;
			$perolehan_shu	= $akum_simpanan/$akumulasi*$nominal_shu;

			$data			= array(
							'id_user' => $id_user,
							'tanggal' => $tanggal,
							'periode' => $periode,
							'nominal_shu' => $nominal_shu,
							'total_simpanan_anggota' => $akum_simpanan,
							'total_akumulasi_simpanan' => $akumulasi,
							'perolehan_shu' => $perolehan_shu
			);
			$this->m_crud->tambah_data($data,'tbl_shu');
		}
			
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data SHU berhasil diperbaharui.</div>');
		redirect(base_url('keanggotaan/shu'));
	}

	public function laporan()
	{
		$data["title"]		= "Data Laporan";
		$data['anggota']	= $this->m_anggota->tampil_data()->result();
		$this->load->view('keanggotaan/head',$data);
		$this->load->view('keanggotaan/menu',$data);
		$this->load->view('keanggotaan/404',$data);
		$this->load->view('keanggotaan/footer',$data);
	}
	
	public function cetak($a=NULL)
	{
		switch ($a) {
			case '':
				$data['periode']	= date('Y');
				$data['shu']		= $this->m_shu->tampil_data(date('Y'))->result();
				$this->load->view('keanggotaan/cetak-laporan-shu',$data);
				break;
			
			default:
				# code...
				break;
		}
	}
}