<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('m_login');

    }

	public function index()
	{
		redirect(base_url('login'));
  	}

	

	function auth(){
		$username	= $this->input->post('username');
		$password	= base64_encode(base64_encode(base64_encode($this->input->post('password'))));

		$cek_kasir=$this->m_login->cek_kasir($username,$password);
		if($cek_kasir->num_rows() > 0){
			$data		= $cek_kasir->row_array();
			$this->session->set_userdata('tunjungan@',TRUE);
			$this->session->set_userdata('tunjungan@id_user',$data['id']);
			$this->session->set_userdata('tunjungan@id_level',2);
			redirect(base_url('kasir/home'));
		}
		else{
       	 	$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><small><strong>Warning !!!<br></strong> Username atau password salah.</small></div>');
			redirect(base_url('kasir/login'));
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('kasir/login'));
	}
}
