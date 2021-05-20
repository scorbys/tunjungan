<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends MY_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->model('m_pembelian'); 
      $this->load->model('m_login');
      $this->load->model('m_akun');
      $this->load->model('m_crud'); 
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
		$data["title"]		  = "Pembelian Produk";
		$data['pembelian']	= $this->m_pembelian->tampil_data()->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/pembelian',$data);
		$this->load->view('admin/footer',$data);
	}

    function tambah()
    {
      $data["title"]		    = "Pembelian Produk";
      $data['id_admin']     = $this->session->userdata('tunjungan@id_user');

      if(isset($_POST['tambah_pembelian'])){
        $tgl_beli           = $_POST['tgl_beli'];
        $nopurchase         = $_POST['nopurchase'];
        $id_supplier        = $_POST['id_supplier'];
        $this->session->set_userdata('tgl_beli', $tgl_beli);
        $this->session->set_userdata('nopurchase', $nopurchase);
        $this->session->set_userdata('id_supplier', $id_supplier);

        $cart 			        = array(
                            'id' => $_POST['id_produk'],
                            'qty' => $_POST['jumlah'],
                            'price' => str_replace(".", "", $_POST['harga_beli']),
                            'name' => $_POST['nama_produk'],
                            'harga_jual' => str_replace(".", "", $_POST['harga']),
                            'barcode' => $_POST['barcode']
        );
        $this->cart->insert($cart);
      }

      foreach($this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result() as $a)
      {
        $data['nama_admin'] = $a->nama;
      }

      if(!empty($this->session->userdata('id_supplier'))){
        $data['tgl_beli']   = $this->session->userdata('tgl_beli');
        $data['nopurchase'] = $this->session->userdata('nopurchase');
        $data['id_supplier']= $this->session->userdata('id_supplier');
      }else{
        $data['tgl_beli']   = date('Y-m-d');
        $id_outlet          = $this->session->userdata('tunjungan@id_outlet');
        $data['nopurchase'] = 'KOP-'.date('ymd').$id_outlet.$this->m_pembelian->tampil_data()->num_rows();;
        $data['id_supplier']= '';
      }
      $data['supplier']	    = $this->m_supplier->tampil_data()->result();
      $this->load->view('admin/head',$data);
      $this->load->view('admin/menu',$data);
      $this->load->view('admin/tambah-pembelian',$data);
      $this->load->view('admin/footer',$data);
    }

	public function update($a){
		switch ($a) {
			case 'cart':
				$data 	= array(
						'rowid' => $_POST['rowid'],
						'qty'   => $_POST['qty']
				);
				$this->cart->update($data);
				redirect(base_url('admin/pembelian'));
				break;
			
			default:
				show_404();
				break;
		}
  }

  public function remove($a){
		$data 	= array(
				'rowid' => $a,
				'qty'   => 0
		);
		$this->cart->update($data);
		redirect(base_url('admin/pembelian'));
	}
 
    /* public function savedata()
    {
      if($this->input->post('type')==1)
      {
        $hargabeli=$this->input->post('hargabeli'); 
        $this->m_pembelian->saverecords($hargabeli);	
        echo json_encode(array(
          "statusCode"=>200
        ));
      } 
    } 

    function data_barang(){
      $data=$this->m_pembelian->barang_list();
      echo json_encode($data);
  } */

  public function auth()
  {
    $nopurchase   = $this->session->userdata('nopurchase');
    $id_admin     = $this->session->userdata('tunjungan@id_user');
    $id_supplier  = $this->session->userdata('id_supplier');
    $tgl_beli     = date('Y-m-d');
    $harga_total  = $this->cart->total();

    $data         = array(
                  'kode_pembelian' => $nopurchase,
                  'id_admin' => $id_admin,
                  'harga_total' => $harga_total,
                  'status_trx' => 'diproses',
                  'tgl_transaksi' => date('Y-m-d H:i:s'),
                  'id_supplier' => $id_supplier
    );

    $this->m_crud->tambah_data($data,'tbl_pembelian');

    $id_pembelian = $this->db->query("SELECT id FROM tbl_pembelian WHERE kode_pembelian = '$nopurchase' AND substr(tgl_transaksi,1,10) = date(now()) AND id_supplier = '$id_supplier' LIMIT 1")->row()->id;

    foreach($this->cart->contents() as $a) :
      $id_produk  = $a['id'];
      $jumlah     = $a['qty'];
      $harga      = $a['price'];
      $total      = $a['price']*$a['qty'];
      $detail     = array(
                  'id_produk' => $id_produk,
                  'id_pembelian' => $id_pembelian,
                  'status' => 'Belum Dibayar',
                  'harga' => $harga,
                  'qty' => $jumlah,
                  'total' => $total,
                  'tgl_beli' => $tgl_beli
      );
      $this->m_crud->tambah_data($detail,'tbl_pembelian_detail');
    endforeach;
    $this->cart->destroy();
    $this->session->unset_userdata('tgl_beli');
    $this->session->unset_userdata('nopurchase');
    $this->session->unset_userdata('id_supplier');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <small><strong>Berhasil !!!<br></strong> Pembelian produk kepada Supplier berhasil disimpan.</small></div>');
    redirect(base_url('admin/pembelian'));
  }

  public function detail($a)
  {
    $data["title"]		  = "Pembelian Produk";
    $data['supplier']	  = $this->m_supplier->tampil_data()->result();
		$data['edit']	      = $this->m_pembelian->edit_data($a)->result();
		$data['detail']     = $this->m_pembelian->detail_pembelian($a)->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/edit-pembelian',$data);
		$this->load->view('admin/footer',$data);
  }
  
  public function hapus($a){
    $tabel				= "tbl_pembelian";
    $where 				= array('id' => $a);
    $this->m_crud->hapus($tabel,$where);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data pembelian ke stokis berhasil dihapus.</div>');
    echo"<Script>window.location=history.go(-1)</script>";
  }
}

?>
