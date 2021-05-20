<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_crud');
		$this->load->model('m_akun');
		$this->load->model('m_about');

		if($this->is_not_login()){
			redirect(base_url('login'));
		}

        if($this->is_not_admin()){
			show_404();
		}
    }

	public function index()
	{
		$data["title"]		= "Tentang KUD TUNJUNGAN";
		$data['about']		= $this->m_about->tampil_data()->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/about',$data);
		$this->load->view('admin/footer',$data);
	}

	public function edit()
	{
		$input			= $this->input->post();
        $data			= array(
                        'nama' => $input['nama'],
                        'email_support' => $input['email_support'],
                        'wa' => $input['wa'],
                        'kontak' => $input['kontak'],
                        'alamat' => $input['alamat'],
                        'bdn_hukum' => $input['bdn_hukum'],
                        'keterangan' => $input['keterangan'],
                        'visi' => $input['visi'],
                        'syarat' => $input['syarat'],
                        'tentang' => $input['tentang']
        );		
		
		$where				= array('id_setting' => $input['id_setting']);
		$this->m_crud->update_data('tbl_setting',$data,$where);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data tentang KUD TUNJUNGAN berhasil disimpan.</div>');
		redirect(base_url('admin/about'));
	}
}