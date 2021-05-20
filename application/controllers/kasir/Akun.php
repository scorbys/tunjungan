<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_crud');
		$this->load->model('m_akun');

		if($this->is_not_login()){
			redirect(base_url('login'));
		}

        if($this->is_not_kasir()){
			show_404();
		}
    }

	public function index()
	{
		$data["title"]		= "Akun";
		$data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
		$this->load->view('kasir/head',$data);
		$this->load->view('kasir/menu',$data);
		$this->load->view('kasir/akun',$data);
		$this->load->view('kasir/footer',$data);
	}

	public function edit()
	{
		$input					= $this->input->post();
		$nmfile 				= "kasir".'-'.time();
		$path   				= './img/';
		$config['upload_path'] 	= $path;
		$config['allowed_types']= 'gif|jpg|png|jpeg|bmp';
		$config['file_name'] 	= $nmfile;
		$this->upload->initialize($config);
		if ($this->upload->do_upload('image')){
			$gbr 				= $this->upload->data();
			if(empty($input['password']))
			{
				$data			= array(
								'image' => $gbr['file_name'],
								'nama' => $input['nama'],
								'username' => $input['username'],
								'email' => $input['email'],
				);
			}else
			{
				$data			= array(
								'image' => $gbr['file_name'],
								'nama' => $input['nama'],
								'username' => $input['username'],
								'email' => $input['email'],
								'password' => base64_encode(base64_encode(base64_encode($input['password'])))
				);
			}
		
			$where				= array('id' => $this->session->userdata('tunjungan@id_user'));
			$this->m_crud->update_data('tbl_admin',$data,$where);
			unlink($path.$input['foto_lama']);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data akun berhasil disimpan.</div>');
			redirect(base_url('kasir/akun'));
		}
		else{
			if(empty($input['password']))
			{
				$data			= array(
								'nama' => $input['nama'],
								'username' => $input['username'],
								'email' => $input['email'],
				);
			}else
			{
				$data			= array(
								'nama' => $input['nama'],
								'username' => $input['username'],
								'email' => $input['email'],
								'password' => base64_encode(base64_encode(base64_encode($input['password'])))
				);
			}
		
			$where				= array('id' => $this->session->userdata('tunjungan@id_user'));
			$this->m_crud->update_data('tbl_admin',$data,$where);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data akun berhasil disimpan.</div>');
			redirect(base_url('kasir/akun'));
		}
	}
}