<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_akun');
		$this->load->model('m_crud');
		$this->load->model('m_promo');

		if($this->is_not_login()){
			redirect(base_url('login'));
		}

        if($this->is_not_admin()){
			show_404();
		}
    }

	public function index()
	{
		$data["title"]		= "Promo";
		$data['promo']		= $this->m_promo->tampil_data()->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/promo',$data);
		$this->load->view('admin/footer',$data);
	}

	public function tambah()
	{
		$data["title"]		= "Promo";
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/tambah-promo',$data);
		$this->load->view('admin/footer',$data);
	}

	public function aksi_tambah()
	{
		$input					= $this->input->post();
		$nmfile 				= "promo".'-'.time();
		$path   				= './img/';
		$config['upload_path'] 	= $path;
		$config['allowed_types']= 'gif|jpg|png|jpeg|bmp';
		$config['file_name'] 	= $nmfile;
		$this->upload->initialize($config);

		if ($this->upload->do_upload('foto')){
			$gbr 				= $this->upload->data();
			
			$data					= array(
									'foto' => $gbr['file_name'],
									'nama' => $input['nama'],
									'kd_promo' => $input['kd_promo'],
									'no_urut' => $input['no_urut'],
									'status' => $input['status']
			);
			$this->m_crud->tambah_data($data,'tbl_promo');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data promo berhasil disimpan.</div>');
			redirect(base_url('admin/promo'));
		}
		
	}

	public function edit($a)
	{
		$data["title"]		= "Promo";
		$data['edit']		= $this->m_promo->edit_data($a)->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/edit-promo',$data);
		$this->load->view('admin/footer',$data);
	}

	public function aksi_edit()
	{
		$input					= $this->input->post();
		$nmfile 				= "promo".'-'.time();
		$path   				= './img/';
		$config['upload_path'] 	= $path;
		$config['allowed_types']= 'gif|jpg|png|jpeg|bmp';
		$config['file_name'] 	= $nmfile;
		$this->upload->initialize($config);

		if ($this->upload->do_upload('foto')){
			$gbr 				= $this->upload->data();
			
			$data				= array(
								'foto' => $gbr['file_name'],
								'nama' => $input['nama'],
								'kd_promo' => $input['kd_promo'],
								'no_urut' => $input['no_urut'],
								'status' => $input['status']
			);
			$where				= array('id' => $input['id']);
			$this->m_crud->update_data('tbl_promo',$data,$where);
			unlink('./img/'.$input['foto_lama']);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data promo berhasil disimpan.</div>');
			redirect(base_url('admin/promo'));
		}
		else{
			$data				= array(
								'nama' => $input['nama'],
								'kd_promo' => $input['kd_promo'],
								'no_urut' => $input['no_urut'],
								'status' => $input['status']
			);
			$where				= array('id' => $input['id']);
			$this->m_crud->update_data('tbl_promo',$data,$where);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data promo berhasil disimpan.</div>');
			redirect(base_url('admin/promo'));
		}
	}

	public function detail($a)
	{
		$data["title"]		= "Promo";
		$data['id']         = $a;
		$data['id_pembelian']= NULL;
		$data['detail']		= $this->m_promo->tampil_detail($a)->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/detail-promo',$data);
		$this->load->view('admin/footer',$data);
	}

	public function tambahdetail($a)
	{
		$data["title"]		= "Promo";
		$data['id']         = $a;
		$data['id_pembelian']= NULL;
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/tambah-detail-promo',$data);
		$this->load->view('admin/footer',$data);
	}
	
	public function aksi_tambah_detail(){
		$harga_promo    		= str_replace(".", "", $_POST['harga_promo']);
        $data					= array(
								'id_promo' => $_POST['id'],
								'id_produk' => $_POST['id_produk'],
								'harga_promo' => $harga_promo,
								'jumlah' => $_POST['jumlah']
		);
		$this->m_crud->tambah_data($data,'tbl_promo_detail');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data produk promo berhasil ditambahkan.</div>');
		redirect(base_url('admin/promo/tambahdetail/'.$_POST['id']));
	}

	public function hapus($a){
		$tabel		= 'tbl_promo';
		$where		= array('id' => $a);
		$foto		= $this->db->query("SELECT * FROM tbl_promo WHERE id = '$a' limit 1")->row()->foto;
		unlink('./img/'.$foto);
		$this->m_crud->hapus($tabel,$where);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data promo berhasil dihapus.</div>');
		redirect(base_url('admin/promo'));
	}

	public function hapusdetail($a){
		$tabel		= 'tbl_promo';
		$where		= array('id' => $a);
		$foto		= $this->db->query("SELECT * FROM tbl_promo WHERE id = '$a' limit 1")->row()->foto;
		unlink('./img/'.$foto);
		$this->m_crud->hapus($tabel,$where);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data promo berhasil dihapus.</div>');
		redirect(base_url('admin/promo'));
	}
}