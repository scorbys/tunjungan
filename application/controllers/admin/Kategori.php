<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_akun');
		$this->load->model('m_crud');
		$this->load->model('M_kategoriadmin');

		if($this->is_not_login()){
			redirect(base_url('login'));
		}

        if($this->is_not_admin()){
			show_404();
		}
    }

	public function index()
	{
		$data["title"]		= "Data Kategori";
		$data['produk']		= $this->M_kategoriadmin->tampil_data()->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/kategori',$data);
		$this->load->view('admin/footer',$data);
    }

	public function tambah()
	{
		$data["title"]		= "Data Kategori";
		$data['kategori']	= $this->M_kategoriadmin->tampil_kategori()->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/tambah-kategori',$data);
		$this->load->view('admin/footer',$data);
	}
	
	public function aksi_tambah()
	{
		$input					= $this->input->post(); 
    
		$nmfile 				= "kategori".'-'.time();
		$path   				= './img/';
		$config['upload_path'] 	= $path;
		$config['allowed_types']= 'gif|jpg|png|jpeg|bmp';
		$config['file_name'] 	= $nmfile;
		$this->upload->initialize($config); 
    		if ($this->upload->do_upload('foto')){
    			$gbr 				= $this->upload->data(); 
    			$data					= array(
    								'foto' => $gbr['file_name'],
									'nama' =>  $input['nama'],
									'no_urut' =>  $input['urut']
			);
    			$this->m_crud->tambah_data($data,'tbl_kategori');
    			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data produk berhasil disimpan.</div>');
    			redirect(base_url('admin/kategori'));
    		}
	}

	public function edit($a=NULL)
	{
		if(!empty($a))
		{
			$data["title"]		= "Data Kategori";
			$data['kategori']	= $this->M_kategoriadmin->tampil_kategori()->result();
			$data['edit']		= $this->M_kategoriadmin->edit_data($a)->result();
			$this->load->view('admin/head',$data);
			$this->load->view('admin/menu',$data);
			$this->load->view('admin/edit-kategori',$data);
			$this->load->view('admin/footer',$data);
		}
		else{
			show_404();
		}
	}

	public function aksi_edit()
	{
	
		$input					= $this->input->post(); 
		$nmfile 				= "kategori".'-'.time();
		$path   				= './img/';
		$config['upload_path'] 	= $path;
		$config['allowed_types']= 'gif|jpg|png|jpeg|bmp';
		$config['file_name'] 	= $nmfile;
		$this->upload->initialize($config);
		
		$tmpName                = $_FILES['foto']['tmp_name'];
       
		list($width, $height, $type, $attr) = getimagesize($tmpName);

		if ($this->upload->do_upload('foto')){
			$gbr 				= $this->upload->data(); 
			$data					= array(
									'foto' => $gbr['file_name'], 
									'nama' => $input['nama'],
									'no_urut' =>  $input['urut'] 
			);
			$where				= array('id' => $input['id']);
			$this->m_crud->update_data('tbl_kategori',$data,$where);
			unlink($path.$input['foto_lama']);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data produk berhasil disimpan.</div>');
			redirect(base_url('admin/kategori'));
		}
		else{
			$data					= array( 
									'nama' => $input['nama'],
									'no_urut' =>  $input['urut']  
			);
			$where				= array('id' => $input['id']);
			$this->m_crud->update_data('tbl_kategori',$data,$where);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data produk berhasil disimpan.</div>');
			redirect(base_url('admin/kategori'));
		}
	}

	public function hapus($a)
	{ 
		$path   			= './img/';
        $tabel				= "tbl_kategori";
		$where 				= array('id' => $a);
		
		foreach($this->M_kategoriadmin->edit_data($a)->result() as $b)
		{
		    $foto           = $b->foto;
		}
		if(!empty($foto)){
		    unlink($path.$foto);
		}
		$this->m_crud->hapus($tabel,$where);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data produk berhasil dihapus.</div>');
		echo"<Script>window.location=history.go(-1)</script>";
	}
}