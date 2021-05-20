<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_akun');
		$this->load->model('m_crud');
		$this->load->model('m_wilayah');

		if($this->is_not_login()){
			redirect(base_url('login'));
		}

        if($this->is_not_admin()){
			show_404();
		}
    }

	public function kabupaten()
	{
		$data["title"]		= "Data Kabupaten";
		$data['kabupaten']	= $this->m_wilayah->tampil_kabupaten()->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/kabupaten',$data);
		$this->load->view('admin/footer',$data);
    }

	public function kecamatan()
	{
		$data["title"]		= "Data Kecamatan";
		$data['kecamatan']	= $this->m_wilayah->tampil_kecamatan()->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/kecamatan',$data);
		$this->load->view('admin/footer',$data);
    }

	public function desa()
	{
		$data["title"]		= "Data Desa";
		$data['kelurahan']	= $this->m_wilayah->tampil_kelurahan()->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/kelurahan',$data);
		$this->load->view('admin/footer',$data);
    }

    public function tambah($a)
    {
        switch ($a) {
            case 'kabupaten':
                $data["title"]		= "Data Kabupaten";
                $this->load->view('admin/head',$data);
                $this->load->view('admin/menu',$data);
                $this->load->view('admin/tambah-kabupaten',$data);
                $this->load->view('admin/footer',$data);
                break;
            
            case 'kecamatan':
                $data["title"]		= "Data Kecamtan";
                $this->load->view('admin/head',$data);
                $this->load->view('admin/menu',$data);
                $this->load->view('admin/tambah-kecamatan',$data);
                $this->load->view('admin/footer',$data);
                break;

            case 'desa':
                $data["title"]		= "Data Desa";
                $this->load->view('admin/head',$data);
                $this->load->view('admin/menu',$data);
                $this->load->view('admin/tambah-kelurahan',$data);
                $this->load->view('admin/footer',$data);
                break;

            default :
                show_404();
                break;
        }
    }

    public function tambah_kabupaten()
    {
        $data       = array(
                    'id_provinsi' => 2,
                    'kabupaten' => $_POST['kabupaten']
        );
        $this->m_crud->tambah_data($data,'tbl_kabupaten');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data kabupaten berhasil disimpan.</div>');
        redirect(base_url('admin/wilayah/kabupaten'));
    }

    public function tambah_kecamatan()
    {
        $data       = array(
                    'id_kabupaten' => $_POST['id_kabupaten'],
                    'kecamatan' => $_POST['kecamatan']
        );
        $this->m_crud->tambah_data($data,'tbl_kecamatan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data kecamatan berhasil disimpan.</div>');
        redirect(base_url('admin/wilayah/kecamatan'));
    }

    public function tambah_kelurahan()
    {
        $data       = array(
                    'id_kecamatan' => $_POST['id_kecamatan'],
                    'kelurahan' => $_POST['kelurahan']
        );
        $this->m_crud->tambah_data($data,'tbl_kelurahan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data desa berhasil disimpan.</div>');
        redirect(base_url('admin/wilayah/desa'));
    }

    public function edit($a,$b)
    {
        switch ($a) {
            case 'kabupaten':
                $data["title"]		= "Data Kabupaten";
                $data['edit']	    = $this->m_wilayah->edit_kabupaten($b)->result();
                $this->load->view('admin/head',$data);
                $this->load->view('admin/menu',$data);
                $this->load->view('admin/edit-kabupaten',$data);
                $this->load->view('admin/footer',$data);
                break;
            
            case 'kecamatan':
                $data["title"]		= "Data Kecamtan";
                $data['edit']	    = $this->m_wilayah->edit_kecamatan($b)->result();
                $this->load->view('admin/head',$data);
                $this->load->view('admin/menu',$data);
                $this->load->view('admin/edit-kecamatan',$data);
                $this->load->view('admin/footer',$data);
                break;
            
            case 'desa':
                $data["title"]		= "Data Desa";
                $data['edit']	    = $this->m_wilayah->edit_kelurahan($b)->result();
                $this->load->view('admin/head',$data);
                $this->load->view('admin/menu',$data);
                $this->load->view('admin/edit-kelurahan',$data);
                $this->load->view('admin/footer',$data);
                break;

            default :
                show_404();    

                break;
        }
    }

    public function edit_kabupaten()
    {
        $data       = array(
                    'kabupaten' => $_POST['kabupaten']
        );
        $where       = array(
                    'id_kabupaten' => $_POST['id_kabupaten']
        );
        $this->m_crud->update_data('tbl_kabupaten',$data,$where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data kabupaten berhasil disimpan.</div>');
        redirect(base_url('admin/wilayah/kabupaten'));
    }

    public function edit_kecamatan()
    {
        $data       = array(
                    'id_kabupaten' => $_POST['id_kabupaten'],
                    'kecamatan' => $_POST['kabupaten']
        );
        $where       = array(
                    'id_kecamatan' => $_POST['id_kecamatan']
        );
        $this->m_crud->update_data('tbl_kecamatan',$data,$where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data kecamatan berhasil disimpan.</div>');
        redirect(base_url('admin/wilayah/kecamatan'));
    }

    public function edit_kelurahan()
    {
        $data       = array(
                    'id_kecamatan' => $_POST['id_kecamatan'],
                    'kelurahan' => $_POST['kelurahan']
        );
        $where       = array(
                    'id_kelurahan' => $_POST['id_kelurahan']
        );
        $this->m_crud->update_data('tbl_kelurahan',$data,$where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data desa berhasil disimpan.</div>');
        redirect(base_url('admin/wilayah/desa'));
    }

    public function hapus($a,$b)
    {
        switch ($a) {
            case 'kabupaten':
                $tabel				= "tbl_kabupaten";
                $where 				= array('id_kabupaten' => $b);
                $this->m_crud->hapus($tabel,$where);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data kabupaten berhasil dihapus.</div>');
                echo"<Script>window.location=history.go(-1)</script>";
                break;
            
            case 'kecamatan':
                $tabel				= "tbl_kecamatan";
                $where 				= array('id_kecamatan' => $b);
                $this->m_crud->hapus($tabel,$where);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data kecamatan berhasil dihapus.</div>');
                echo"<Script>window.location=history.go(-1)</script>";
                break;
            
            
            case 'desa':
                $tabel				= "tbl_kelurahan";
                $where 				= array('id_kelurahan' => $b);
                $this->m_crud->hapus($tabel,$where);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data desa berhasil dihapus.</div>');
                echo"<Script>window.location=history.go(-1)</script>";
                break;
            
            default:
                show_404();
                break;
        }
    }
}