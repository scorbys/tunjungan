<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_crud');
		$this->load->model('m_akun');
		$this->load->model('m_supplier');

		if($this->is_not_login()){
			redirect(base_url('login'));
		}

        if($this->is_not_admin()){
			show_404();
		}
    }

	public function index()
	{
		$data["title"]		= "Data Stokis";
		$data['supplier']	= $this->m_supplier->tampil_data()->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/supplier',$data);
		$this->load->view('admin/footer',$data);
    }

	public function tambah()
	{
        $data["title"]		= "Data Stokis";
        $kode               = $this->m_supplier->tampil_data()->num_rows()+1;
        if($this->m_supplier->tampil_data()->num_rows() < 10)
        {
            $data['kode']   = '00'.$kode;
        }elseif($this->m_supplier->tampil_data()->num_rows() < 100){
            $data['kode']   = '0'.$kode;
        }else{
            $data['kode']   = $kode;
        }
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/tambah-supplier',$data);
		$this->load->view('admin/footer',$data);
    }

    public function aksi_tambah()
    {
        $jenis              = $_POST['jenis'];
        $nama               = $_POST['nama'];
        $kode               = $_POST['kode'];
        $alamat             = $_POST['alamat'];
        $kode_pos           = $_POST['kode_pos'];
        $email              = $_POST['email'];
        $catatan            = $_POST['catatan'];
        $status             = $_POST['status'];
        $telp               = $_POST['telp'];
        $telp               = $_POST['telp'];

        $data               = array(
                            'nama' => $nama,
                            'kode' => $kode,
                            'alamat' => $alamat,
                            'kode_pos' => $kode_pos,
                            'email' => $email,
                            'catatan' => $catatan,
                            'jenis' => 'Supplier',
                            'status' => $status,
                            'jenis' => $jenis,
                            'telp' => $telp
        );

        $this->m_crud->tambah_data($data,'tbl_kontak');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data supplier baru berhasil disimpan.</div>');
        redirect(base_url('admin/supplier'));
    }

	public function edit($a)
	{
        $data["title"]		= "Data Stokis";
		$data['edit']	    = $this->m_supplier->edit_data($a)->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/edit-supplier',$data);
		$this->load->view('admin/footer',$data);
    }

    public function aksi_edit()
    {
        $id                 = $_POST['id'];
        $nama               = $_POST['nama'];
        $kode               = $_POST['kode'];
        $alamat             = $_POST['alamat'];
        $kode_pos           = $_POST['kode_pos'];
        $email              = $_POST['email'];
        $catatan            = $_POST['catatan'];
        $status             = $_POST['status'];
        $telp               = $_POST['telp'];

        $data               = array(
                            'nama' => $nama,
                            'kode' => $kode,
                            'alamat' => $alamat,
                            'kode_pos' => $kode_pos,
                            'email' => $email,
                            'catatan' => $catatan,
                            'status' => $status,
                            'telp' => $telp
        );

        $where              = array('id' => $id);

        $this->m_crud->update_data('tbl_kontak',$data,$where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data supplier baru berhasil disimpan.</div>');
        redirect(base_url('admin/supplier'));
    }

    public function hapus($a)
    {
        $tabel				= "tbl_kontak";
		$where 				= array('id' => $a);
		$this->m_crud->hapus($tabel,$where);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data supplier berhasil dihapus.</div>');
		echo"<Script>window.location=history.go(-1)</script>";
    }
}