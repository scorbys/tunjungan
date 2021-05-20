<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_akun');
		$this->load->model('m_crud');
		$this->load->model('m_penerimaan');
		$this->load->model('m_pembelian');
		$this->load->model('m_produk');

		if($this->is_not_login()){
			redirect(base_url('login'));
		}

        if($this->is_not_admin()){
			show_404();
		}
    }

	public function detail($a)
	{
        $data["title"]		        = "Penerimaan Pembelian"; 
        foreach($this->m_pembelian->edit_data($a)->result() as $b){
            $data['kode_pembelian'] = $b->kode_pembelian;
        }
        $data['a']                  = $a;
		$data['penerimaan']	        = $this->m_penerimaan->detail_penerimaan($a)->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/penerimaan',$data);
		$this->load->view('admin/footer',$data);
    }

	public function tambah($a)
	{
        $data["title"]		        = "Penerimaan Pembelian"; 
        $data['a']                  = $a;
        $data['id_pembelian']       = $a;
        foreach($this->m_pembelian->edit_data($a)->result() as $b){
            $data['kode_pembelian'] = $b->kode_pembelian;
        }

        foreach($this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result() as $a)
        {
          $data['nama_admin'] = $a->nama;
        }

		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/tambah-penerimaan',$data);
		$this->load->view('admin/footer',$data);
    }

    public function aksi_tambah()
    {
        $id_produk                  = $_POST['id_produk'];
        $qty                        = $_POST['jumlah'];
        $id_pembelian               = $_POST['id_pembelian'];
        $tgl                        = date('Y-m-d');
        $harga                      = $_POST['harga_beli'];

        $data                       = array(
                                    'id_produk' => $id_produk,
                                    'id_pembelian' => $id_pembelian,
                                    'qty' => $qty,
                                    'tgl' => $tgl,
                                    'harga_beli' => str_replace(".", "", $harga),
                                    'tgl' => $tgl,
                                    'catatan' => '-',
                                    'id_admin' => $this->session->userdata('tunjungan@id_user')
        );
        $this->m_crud->tambah_data($data,'tbl_pembelian_diterima');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <small><strong>Berhasil !!!</strong> Penerimaan produk dari Supplier berhasil disimpan.</small></div>');
        redirect(base_url('admin/penerimaan/detail/'.$id_pembelian));
    }


	public function cari_produk($a)
	{
		if (isset($_GET['term'])) {
			$b				= 'B';
		  	$c 				= $this->m_produk->cari_produknya($b,$a);
		   	if (count($c) > 0) {
		    foreach ($c as $d)
		     	$data[]	 	= array(
							'label' => $d->barcode,
							'nama_produk' => $d->nama_produk,
							'id_produk' => $d->id_produk,
							'harga_beli' => $d->harga,
							'harga' => $d->harga_jual,
							'qty' => $d->qty
				);
		     	echo json_encode($data);
		   	}
		}
	}
    

	public function edit($a)
	{
        $data["title"]		        = "Penerimaan Pembelian"; 
        $data['a']                  = $a;
        foreach($this->m_penerimaan->edit_data($a)->result() as $b)
        {
            $data['id_pembelian']   = $b->id_pembelian;
            $c                      = $b->id_pembelian;
        }
        foreach($this->m_pembelian->edit_data($c)->result() as $d)
        {
            $data['kode_pembelian'] = $d->kode_pembelian;
        }

        foreach($this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result() as $e)
        {
          $data['nama_admin']       = $e->nama;
        }
        $data['edit']               = $this->m_penerimaan->edit_data($a)->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/edit-penerimaan',$data);
		$this->load->view('admin/footer',$data);
    }

    public function aksi_edit()
    {
        $id                         = $_POST['id'];
        $id_produk                  = $_POST['id_produk'];
        $qty                        = $_POST['jumlah'];
        $id_pembelian               = $_POST['id_pembelian'];
        $tgl                        = date('Y-m-d');
        $harga                      = $_POST['harga_beli'];

        $data                       = array(
                                    'id_produk' => $id_produk,
                                    'id_pembelian' => $id_pembelian,
                                    'qty' => $qty,
                                    'tgl' => $tgl,
                                    'harga_beli' => str_replace(".", "", $harga),
                                    'tgl' => $tgl,
                                    'catatan' => '-',
                                    'id_admin' => $this->session->userdata('tunjungan@id_user')
        );
        $where                      = array('id' => $id);
        $this->m_crud->update_data('tbl_pembelian_diterima',$data,$where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <small><strong>Berhasil !!!</strong> Penerimaan produk dari Supplier berhasil disimpan.</small></div>');
        redirect(base_url('admin/penerimaan/detail/'.$id_pembelian));
    }

    public function cetak($a)
    {
        $data["title"]		        = "Penerimaan Pembelian"; 
        $data['a']                  = $a;
        $data['kasir']              = $this->session->userdata('tunjungan@id_user');
        foreach($this->m_pembelian->edit_data($a)->result() as $b){
            $data['kode_pembelian'] = $b->kode_pembelian;
        }

		$data['penerimaan']	        = $this->m_penerimaan->detail_penerimaan($a)->result();
		$this->load->view('admin/cetak-penerimaan',$data);
    }
}