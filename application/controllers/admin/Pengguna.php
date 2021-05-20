<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_akun');
		$this->load->model('m_crud');
		$this->load->model('m_pengurus');
		$this->load->model('m_poin');

		if($this->is_not_login()){
			redirect(base_url('login'));
		}

        if($this->is_not_admin()){
			show_404();
		}
    }

	public function index()
	{
		$data["title"]		= "Data Pengguna";
		$data['pengurus']	= $this->m_pengurus->tampil_data()->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/pengurus',$data);
		$this->load->view('admin/footer',$data);
	}
	
	public function tambah()
	{
		$data["title"]		= "Data Pengguna";
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/tambah-pengurus',$data);
		$this->load->view('admin/footer',$data);
	}
	
	public function aksi_tambah()
	{
		$input				= $this->input->post();
		$nama				= $input['nama'];
		$username			= $input['username'];
		$password			= $input['password'];
		$level				= $input['level'];

		$data				= array(
							'nama' => $nama,
							'username' => $username,
							'password' => base64_encode(base64_encode(base64_encode($password))),
							'level' => $level,
							'tgl_update' => date('Y-m-d H:i:s')
		);
		$this->m_crud->tambah_data($data,'tbl_admin');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data pengguna baru berhasil disimpan.</div>');
		redirect(base_url('admin/pengguna'));

	}
	
	public function edit($a)
	{
		$data["title"]		= "Data Pengguna";
		$data['edit']		= $this->m_pengurus->edit_data($a)->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/edit-pengurus',$data);
		$this->load->view('admin/footer',$data);
	}
	
	public function aksi_edit()
	{
		$input				= $this->input->post();
		$nama				= $input['nama'];
		$username			= $input['username'];
		$email				= $input['email'];
		$password			= $input['password'];
		$level				= $input['level'];

		if(!empty($password))
		{
			$data			= array(
							'nama' => $nama,
							'username' => $username,
							'email' => $email,
							'password' => base64_encode(base64_encode(base64_encode($password))),
							'level' => $level,
							'tgl_update' => date('Y-m-d H:i:s')
			);
		}
		else
		{
			$data			= array(
							'nama' => $nama,
							'username' => $username,
							'email' => $email,
							'level' => $level,
							'tgl_update' => date('Y-m-d H:i:s')
			);
		}
		$where				= array('id' => $input['id']);
		$this->m_crud->update_data('tbl_admin',$data,$where);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data pengguna berhasil disimpan.</div>');
		redirect(base_url('admin/pengurus'));
	}

	public function hapus($a)
	{
        $tabel				= "tbl_admin";
		$where 				= array('id' => $a);
		$this->m_crud->hapus($tabel,$where);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data pengguna berhasil dihapus.</div>');
		echo"<Script>window.location=history.go(-1)</script>";
	}
}