<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logproduk extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_akun');
		$this->load->model('m_crud');
		$this->load->model('m_produk');

		if($this->is_not_login()){
			redirect(base_url('login'));
		}

        if($this->is_not_admin()){
			show_404();
		}
    }

	public function index()
	{
		$data["title"]		= "Data Log Produk";
		$data['produk']		= $this->m_produk->tampil_data_log()->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/logproduk',$data);
		$this->load->view('admin/footer',$data);
    }
 
}