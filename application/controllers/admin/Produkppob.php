
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produkppob extends MY_Controller {
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
	    
        $json = '{"ref_id":"6007d3b157b36","status":0,"price":1900,"message":"PROCESS","balance":7991000,"tr_id":59078,"rc":"39","code":"htelkomsel1000","hp":"082213253325"}';
        
         echo $df = json_decode($json, TRUE)['ref_id'];
         
                     
		$data["title"]		= "Data Produk PPOB";
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/produkppob',$data);
		$this->load->view('admin/footer',$data); 
    }

 
}