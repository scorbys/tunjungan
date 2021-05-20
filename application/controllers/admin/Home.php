<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_akun');
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
		if(!empty($this->session->userdata('id_anggota'))){
		  $data['id_user']        = $this->session->userdata('id_anggota');
		  $data['no_anggota']     = $this->session->userdata('no_anggota');
		  $data['nama_anggota']   = $this->session->userdata('nama_anggota');
		}else{
		  $data['id_user']        = '';
		  $data['no_anggota']     = '';
		  $data['nama_anggota']   = '';
		}
		$data["title"]		= "Beranda";
		foreach($this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result() as $a){
			$data['nama_admin'] = $a->nama;
		}
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/beranda',$data);
		$this->load->view('admin/footer',$data);
	}

	public function simpanan()
	{
		$data["title"]		= "Simpanan Anggota";
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/menu-simpanan',$data);
		$this->load->view('admin/footer',$data);
	}

	public function cari_produk()
	{
		if (isset($_GET['term'])) {
			$a				= $_GET['term'];
		  	$b 				= $this->m_produk->cari_produk($a);
		   	if (count($b) > 0) {
		    foreach ($b as $c)
		     	$data[]	 	= array(
							'label' => $c->barcode,
							'nama_produk' => $c->nama,
							'id_produk' => $c->id,
							'foto' => $c->foto,
							'harga' => $c->harga-$c->harga*$c->diskon/100,
							'harga_grosir' => $c->harga_grosir-$c->harga_grosir*$c->diskon/100,
							'poin' => $c->poin,
							'stok' => $c->stok
				);
		     	echo json_encode($data);
		   	}
		}
	}

	public function cari_produk2()
	{
		if (isset($_GET['term'])) {
			$a				= $_GET['term'];
		  	$b 				= $this->m_produk->cari_nama_produk($a);
		   	if (count($b) > 0) {
		    foreach ($b as $c)
		     	$data[]	 	= array(
							'barcode' => $c->barcode,
							'label' => $c->nama,
							'id_produk' => $c->id,
							'foto' => $c->foto,
							'harga' => $c->harga-$c->harga*$c->diskon/100,
							'harga_grosir' => $c->harga_grosir-$c->harga_grosir*$c->diskon/100,
							'poin' => $c->poin,
							'stok' => $c->stok
				);
		     	echo json_encode($data);
		   	}
		}
	}
}