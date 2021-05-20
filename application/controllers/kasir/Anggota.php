<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_akun');
		$this->load->model('m_crud');
		$this->load->model('m_anggota');
		$this->load->model('m_poin');

		if($this->is_not_login()){
			redirect(base_url('login'));
		}

        if($this->is_not_kasir()){
			show_404();
		}
    }

	public function index()
	{
		$data["title"]		= "Data Anggota Aktif";
		$data['anggota']	= $this->m_anggota->tampil_data()->result();
		$this->load->view('kasir/head',$data);
		$this->load->view('kasir/menu',$data);
		$this->load->view('kasir/anggota',$data);
		$this->load->view('kasir/footer',$data);
	}
}