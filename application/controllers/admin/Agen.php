<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agen extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_crud');
		$this->load->model('m_akun');
		$this->load->model('m_ppob');
		$this->load->model('m_anggota');


		if($this->is_not_login()){
			redirect(base_url('login'));
		}

        if($this->is_not_admin()){
			show_404();
		}
    }

	public function index()
	{
		$data["title"]		= "Data Agen PPOB";
		$data['agen']		= $this->m_ppob->tampil_agen()->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/agen-ppob',$data);
		$this->load->view('admin/footer',$data);
	}

	public function tambah()
	{
		$data["title"]		= "Data Agen PPOB";
		$data['anggota']	= $this->m_anggota->tampil_data()->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/tambah-agen-ppob',$data);
		$this->load->view('admin/footer',$data);
	}

	public function transaksi($a)
	{
		$data["title"]		= "Data Agen PPOB";
		if(isset($_POST['awal'])){
		    $awal           = $_POST['awal'];
		    $akhir          = $_POST['akhir'];
		}else{
		    $awal           = date('Y-m-01');
		    $akhir          = date('Y-m-d');
		}
		$data['id_agen']    = $a;
		$data['awal']       = $awal;
		$data['akhir']      = $akhir;
		$data['transaksi']	= $this->m_ppob->transaksi_agen($a,$awal,$akhir)->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/transaksi-agen-ppob',$data);
		$this->load->view('admin/footer',$data);
	}

	public function aksi_tambah()
	{
        $data			= array(
                        'id_user' => $_POST['id_user']
        );		
		if($this->m_ppob->edit_agen($_POST['id_user'])->num_rows() == 0){
		    $this->m_crud->tambah_data($data,'tbl_agen');
		    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data agen baru berhasil disimpan.</div>');
		}else{
		    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Peringatan !</strong> Data anggota tersebut sudah terdaftar sebagai agen.</div>');
		}
		redirect(base_url('admin/agen'));
	}
	
	public function cetak($a,$b,$c){
		$data["title"]		= "Data Transaksi Agen PPOB";
		$data['id_agen']    = $a;
		$data['nama']       = $this->m_ppob->edit_agen($a)->row()->nama;
		$data['nomor']      = $this->m_ppob->edit_agen($a)->row()->no_anggota;
		$data['awal']       = $b;
		$data['akhir']      = $c;
		$data['cetak']	    = $this->m_ppob->transaksi_agen($a,$b,$c);
		$this->load->view('admin/cetak-transaksi-agen-ppob',$data);
	}

	public function hapus($a)
	{
        $tabel				= "tbl_agen";
		$where 				= array('id' => $a);
		
		$this->m_crud->hapus($tabel,$where);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data agen berhasil dihapus.</div>');
		echo"<Script>window.location=history.go(-1)</script>";
	}
}