<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('m_login');

    }

	public function index()
	{
		$this->load->view('login-pengurus');
  	}

	

	function auth(){
		$username		= htmlspecialchars(addslashes(trim($this->input->post('username'))));
		$password		= base64_encode(base64_encode(base64_encode(htmlspecialchars(addslashes(trim($this->input->post('password')))))));
		//$id_level		= $this->input->post('id_level');

		
		$cek_kasir 		= $this->m_login->cek_kasir($username,$password);
		if($cek_kasir->num_rows() > 0){
			$data		= $cek_kasir->row_array();
			$this->session->set_userdata('tunjungan@',TRUE);
			$this->session->set_userdata('tunjungan@id_user',$data['id']);
			$this->session->set_userdata('tunjungan@id_level',$data['level']);
			$this->session->set_userdata('tunjungan@id_outlet',$data['id_outlet']);
			redirect(base_url('kasir/home'));
		}
		else{
			$cek_keanggotaan 	= $this->m_login->cek_keanggotaan($username,$password);
			if($cek_keanggotaan->num_rows() > 0){
				$data			= $cek_keanggotaan->row_array();
				$this->session->set_userdata('tunjungan@',TRUE);
				$this->session->set_userdata('tunjungan@id_user',$data['id']);
				$this->session->set_userdata('tunjungan@id_level',$data['level']);
				redirect(base_url('keanggotaan/home'));
			}else{
				$cek_admin=$this->m_login->cek_login($username,$password);
				if($cek_admin->num_rows() > 0){
					$data		= $cek_admin->row_array();
					$this->session->set_userdata('tunjungan@',TRUE);
					$this->session->set_userdata('tunjungan@id_user',$data['id']);
					$this->session->set_userdata('tunjungan@id_level',$data['level']);
					$this->session->set_userdata('tunjungan@id_outlet',$data['id_outlet']);
					redirect(base_url('admin/produk/ppob'));
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><small><strong>Warning !!!<br></strong> Username atau password salah.</small></div>');
					redirect(base_url('login'));
				}
			}
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
	
	function json(){
	    $json   = '{
                 "jsonrpc": "2.0",
                 "id": 1,
                 "result": {
                 "nopel": "530678910024",
                 "nama": "SUBCRIBER NAME",
                 "refno": "25641544",
                 "rincian":{
                 "pokok": 300000,
                 "denda": 0,
                 "admin": 2500,
                 "period": "2016-08",
                 "jml_bulan": 1,
                 "tarif": "R1\/1300VA",
                 "no_meter": "530678910012",
                 "meter": "567-756"
                 },
                 "subtotal": 302500,
                 "discount": 800,
                 "total": 301700
                 }
                }';
        $data = json_decode($json,FALSE); 
        
        echo $data->result->total;
	}
}
