<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retur extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_akun');
		$this->load->model('m_crud');
		$this->load->model('m_retur');
		$this->load->model('m_supplier');

		if($this->is_not_login()){
			redirect(base_url('login'));
		}

        if($this->is_not_admin()){
			show_404();
		}
    }

	public function index()
	{
		$data["title"]		= "Retur Produk";
		$data['retur']		= $this->m_retur->tampil_data()->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/retur',$data);
		$this->load->view('admin/footer',$data);
	}
	
	function tambah()
	{
		$data["title"]			= "Retur Produk";
		$data['supplier']	    = $this->m_supplier->tampil_data()->result();
	  	$data['id_admin']     	= $this->session->userdata('tunjungan@id_user');

		foreach($this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result() as $a){
			$data['nama_admin'] = $a->nama;
		}
		$data['tgl_retur']   	= date('Y-m-d');
		$id_outlet          	= $this->session->userdata('tunjungan@id_outlet');
		
		if(empty($this->session->userdata('kode_faktur'))){
			$data['id_supplier']= '';
			$data['kode_faktur']= 'RET-'.date('ymd').$id_outlet.$this->m_retur->today()->num_rows();
		}else{
			$data['id_supplier']= $this->session->userdata('id_supplier');
			$data['kode_faktur']= $this->session->userdata('kode_faktur');
		}
		$this->session->set_userdata('kode_faktur', 'RET-'.date('ymd').$id_outlet.$this->m_retur->today()->num_rows());
		$data['detail']	    	= $this->m_retur->tampil_detail_kode($this->session->userdata('kode_faktur'))->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/tambah-retur',$data);
		$this->load->view('admin/footer',$data);
	}

	public function aksi_tambah(){
		$tgl_retur				= $_POST['tgl_retur'];
		$kode_faktur			= $_POST['kode_faktur'];
		$id_supplier			= $_POST['id_supplier'];

		$id_produk				= $_POST['id_produk'];
		$qty					= $_POST['qty'];

		$data					= array(
								'kode_faktur' => $kode_faktur,
								'id_admin' => $this->session->userdata('tunjungan@id_user'),
								'tgl_transaksi' => $tgl_retur.' '.date('H:i:s'),
								'id_supplier' => $id_supplier
		);
		$this->m_crud->tambah_data($data,'tbl_retur');
		$session_faktur			= $this->session->userdata('kode_faktur');
		if(empty($session_faktur)){
			$this->m_crud->tambah_data($data,'tbl_retur');
			$this->session->set_userdata('kode_faktur', $kode_faktur);
			$this->session->set_userdata('id_supplier', $id_supplier);
		}

		$id_retur				= $this->m_retur->tampil_data_kode($kode_faktur)->row()->id;

		$detail					= array(
								'id_retur' => $id_retur,
								'tgl_retur' => $tgl_retur,
								'id_produk' => $id_produk,
								'qty' => $qty,
								'catatan' => '-'
		);
		
		$this->m_crud->tambah_data($detail,'tbl_retur_detail');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data produk berhasil dimasukan ke daftar retur.</div>');
		//echo"<Script>window.location=history.go(-1)</script>";
		redirect(base_url('admin/retur/tambah'));
	}

	public function konfirmasi(){
		$this->session->unset_userdata('id_supplier');
		$this->session->unset_userdata('kode_faktur');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data retur berhasil disimpan.</div>');
		redirect(base_url('admin/retur'));
	}

	public function detail($a){
		$data["title"]			= "Retur Produk";
		$data['retur']	    	= $this->m_retur->edit_data($a)->result();
		$data['detail']	    	= $this->m_retur->tampil_detail($a)->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/detail-retur',$data);
		$this->load->view('admin/footer',$data);
	}

	public function cetak($a){
		$data["title"]			= "Cetak Retur Produk";
		$data['retur']	    	= $this->m_retur->edit_data($a)->result();
		$data['detail']	    	= $this->m_retur->tampil_detail($a)->result();
		$this->load->view('admin/cetak-retur',$data);
	}
}