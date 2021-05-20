<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_penjualan'); 
    $this->load->model('m_login');
    $this->load->model('m_akun');
    $this->load->model('m_crud'); 
    $this->load->model('m_supplier');
    $this->load->model('m_transaksi');

    if($this->is_not_login()){
      redirect(base_url('login'));
    }

        if($this->is_not_admin()){
      show_404();
    }
  }

  public function kasir()
	{
		$data["title"]		    = "Penjualan Kasir Harian";
		$data['penjualan']	  = $this->m_penjualan->tampil_penjualan_kasir_harian()->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/penjualan-kasir',$data);
		$this->load->view('admin/footer',$data);
  }

  public function grosir()
	{
    if(!empty($this->session->userdata('id_anggota'))){
      $data['id_user']        = $this->session->userdata('id_anggota');
      $data['no_anggota']     = $this->session->userdata('no_anggota');
      $data['nama_anggota']   = $this->session->userdata('nama_anggota');
      $data['detail']         = $this->m_transaksi->tampil_detail($this->session->userdata('id_transaksi'))->result();
      $data['jumlah_detail']  = $this->m_transaksi->tampil_detail($this->session->userdata('id_transaksi'))->num_rows();
    }else{
      $data['id_user']        = '';
      $data['no_anggota']     = '';
      $data['nama_anggota']   = '';
      $data['jumlah_detail']  = 0;
    }
		$data["title"]		    = "Penjualan Produk Grosir";
		foreach($this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result() as $a){
			$data['nama_admin'] = $a->nama;
		}
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/penjualan-grosir',$data);
		$this->load->view('admin/footer',$data);
  }
    public function kasirTerlaris()
    {
        $data["title"]		    = "Penjualan TerLaris/Bln";
        $data['penjualan']	  = $this->m_penjualan->tampil_penjualan_terlaris()->result();
        $this->load->view('admin/head',$data);
        $this->load->view('admin/menu',$data);
        $this->load->view('admin/penjualan-terlaris',$data);
        $this->load->view('admin/footer',$data);
    }
    
    public function kasirDetailNota($tgl,$nama)
	{
		$data["title"]		    = "Penjualan Kasir Harian /Nota";
		$data["nama"]		      = $nama;
		$data["tgl"]		      = $tgl;
		$data['penjualan']	  = $this->m_penjualan->tampil_penjualan_kasir_harianNota($tgl,$nama)->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/penjualan-kasirNota',$data);
		$this->load->view('admin/footer',$data);
    }
  

    public function kasirDetailNotaItem($id)
	{
		$data["title"]		    = "Penjualan Kasir Harian /Item Nota";
		$data['penjualan']	  = $this->m_penjualan->tampil_penjualan_kasir_harianNotaItem($id)->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/penjualan-kasirNotaItem',$data);
		$this->load->view('admin/footer',$data);
    }
  
    public function exportItemTerjual($nama,$tgl)
    { 
        $data["title"]		= "Data Penjualan $nama $tgl"; 
         $data['cetak']	    = $this->m_penjualan->exportItemTerjual($nama,$tgl)->result();
        $this->load->view('admin/cetak-penjualanItemTerjual',$data);
    }
    
    public function export()
	{ 
		$data["title"]		= "Data Penjualan Terlaris"; 
		$data['cetak']	    = $this->m_penjualan->tampil_penjualan_terlaris()->result();
		$this->load->view('admin/cetak-penjualan-excel',$data);
				
    }

  public function aksi_grosir()
  {
    $id_produk             = $_POST['id_produk'];
    $harga_grosir          = $_POST['harga_grosir'];
    $id_user               = $_POST['id_user'];
	$status_trx			   = 'selesai';
	$id_admin			   = $this->session->userdata('tunjungan@id_user');
    $tanggal			   = date('Y-m-d H:i:s');
    $id_pembayaran         = $_POST['id_pembayaran'];
    
    $this->session->set_userdata('id_anggota', $id_user);
    $this->session->set_userdata('id_pembayaran', $id_pembayaran);
    $this->session->set_userdata('no_anggota', $_POST['no_anggota']);
    $this->session->set_userdata('nama_anggota', $_POST['nama_anggota']);

    $data				  = array(
                          'id_admin' => $id_admin,
                          'id_user' => $id_user,
                          'harga_total' => $grand_total,
                          'status_trx' => $status_trx,
                          'tgl_transaksi' => $tanggal,
                          'id_pembayaran' => 3,
                          'kodeunik' => NULL
    );
		
    if(empty($this->session->userdata('id_transaksi'))){
		$this->m_crud->tambah_data($data,'tbl_transaksi');
		$id_transaksi		      = $this->db->query("SELECT id FROM tbl_transaksi WHERE id_admin = '$id_admin' AND status_trx = '$status_trx' AND tgl_transaksi = '$tanggal' ORDER BY id DESC LIMIT 1")->row()->id;
        $this->session->set_userdata('id_transaksi', $id_transaksi);
    }
    else{
      $id_transaksi         = $this->session->userdata('id_transaksi');
    }
    $id_produk            = $_POST['id_produk'];
    $jumlah               = $_POST['jumlah'];
    $harga                = $_POST['harga_grosir'];
    
    $detail			          = array(
                          'id_produk' => $id_produk,
                          'jumlah' => $jumlah,
                          'harga' => $harga,
                          'tanggal' => $tanggal,
                          'id_user' => $id_user,
                          'id_transaksi' => $id_transaksi,
                          'status_trx' => $status_trx
    );
    $this->m_crud->tambah_data($detail,'tbl_transaksi_detail');
    redirect(base_url('admin/penjualan/grosir'));
  }

  public function edit($a,$b)
  {
    switch ($a) {
      case 'grosir':
        $id           = $_POST['id'];
        $jumlah       = $_POST['qty'];

        $data         = array(
                      'jumlah' => $jumlah
        );
        $where				= array('id' => $id);
        $this->m_crud->update_data('tbl_transaksi_detail',$data,$where);
        redirect(base_url('admin/penjualan/grosir'));
        break;
      
      default:
        # code...
        break;
    }
  }

  public function auth($a)
  {
    $this->session->unset_userdata('id_anggota');
    $this->session->unset_userdata('id_pembayaran');
    $this->session->unset_userdata('no_anggota');
    $this->session->unset_userdata('nama_anggota');
    $this->session->unset_userdata('id_transaksi');
    $data['transaksi']      = $this->m_transaksi->edit_data3($a)->result();
    $data['detail']         = $this->m_transaksi->tampil_detail($a)->result();
		$this->load->view('admin/cetak-penjualan-grosir',$data);
  }
  
  public function hapus($a,$b){
    switch ($a) {
      case 'grosir':
        $tabel				= "tbl_transaksi_detail";
        $where 				= array('id' => $b);
        $this->m_crud->hapus($tabel,$where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data berhasil dihapus.</div>');
        echo"<Script>window.location=history.go(-1)</script>";
        break;
      
      default:
        # code...
        break;
    }
  }
}