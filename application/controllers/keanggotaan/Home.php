<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_akun');
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
		$data["title"]		= "Beranda";
		$data['total']		= $this->m_simpanan->tampil_all()->result();
		$this->load->view('keanggotaan/head',$data);
		$this->load->view('keanggotaan/menu',$data);
		$this->load->view('keanggotaan/beranda',$data);
		$this->load->view('keanggotaan/footer',$data);
    }
}