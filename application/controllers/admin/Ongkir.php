<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_crud');
		$this->load->model('m_akun');
		$this->load->model('m_ongkir');

		if($this->is_not_login()){
			redirect(base_url('login'));
		}

        if($this->is_not_admin()){
			show_404();
		}
    }

    public function index(){        
		$data["title"]		= "Data Ongkir";
		$data['ongkir']		= $this->m_ongkir->tampil_data()->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/ongkir',$data);
		$this->load->view('admin/footer',$data);
    }

    public function tambah(){        
		$data["title"]		= "Data Ongkir";
		$data['ongkir']		= $this->m_ongkir->tampil_data()->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/tambah-ongkir',$data);
		$this->load->view('admin/footer',$data);
    }

    public function aksi_tambah(){        
        $ongkir				= str_replace(".", "", $_POST['ongkir']);
        $nama               = $_POST['nama'];

        $data               = array(
                            'nama' => $nama,
                            'ongkir' => $ongkir
        );
        $this->m_crud->tambah_data($data,'tbl_ongkir');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data ongkir berhasil disimpan.</div>');
        redirect(base_url('admin/ongkir'));
    }

    public function edit($a){    
        if($this->m_ongkir->edit_data($a)->num_rows() == 0)
        {
            show_404();
        }    
		$data["title"]		= "Data Ongkir";
		$data['edit']		= $this->m_ongkir->edit_data($a)->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/edit-ongkir',$data);
		$this->load->view('admin/footer',$data);
    }

    public function aksi_edit(){        
        $ongkir				= str_replace(".", "", $_POST['ongkir']);
        $nama               = $_POST['nama'];
        $id                 = $_POST['id'];

        $data               = array(
                            'nama' => $nama,
                            'ongkir' => $ongkir
        );
        $where				= array('id' => $id);
        $this->m_crud->update_data('tbl_ongkir',$data,$where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data ongkir berhasil disimpan.</div>');
        redirect(base_url('admin/ongkir'));
    }

	public function hapus($a)
	{
        $tabel				= "tbl_ongkir";
		$where 				= array('id' => $a);
		
		$this->m_crud->hapus($tabel,$where);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data ongkir berhasil dihapus.</div>');
		echo"<Script>window.location=history.go(-1)</script>";
	}
}