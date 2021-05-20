<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_crud');
		$this->load->model('m_akun');
		$this->load->model('m_produk');
		$this->load->model('m_promo');
		$this->load->model('m_transaksi');

		if($this->is_not_login()){
			redirect(base_url('kasir/login'));
		}

        if($this->is_not_kasir()){
			show_404();
		}
    }

	public function index()
	{
		$data["title"]		= "Data Penjualan";
		$data['id_kasir']	= $this->session->userdata('tunjungan@id_user');
		$this->load->view('kasir/head',$data);
		$this->load->view('kasir/menu',$data);
		$this->load->view('kasir/beranda',$data);
		$this->load->view('kasir/footer',$data);
    }

	public function cari_produk()
	{
		if (isset($_GET['term'])) {
			$a				= $_GET['term'];
		  	$b 				= $this->m_produk->cari_produk($a);
		   	if (count($b) > 0) {
		    foreach ($b as $c)
    		    if(!empty($c->foto)){
    		        $foto       = $c->foto;
    		    }else{
    		        $foto       = 'no-image.png';
    		    }
		        $foto       = $c->foto;
		     	$data[]	 	= array(
							'label' => $c->barcode,
							'nama_produk' => $c->nama,
							'id_produk' => $c->id,
							'foto' => $foto,
							'harga' => $c->harga-$c->harga*$c->diskon/100,
							'diskon' => $c->diskon,
							'poin' => $c->poin,
							'stok' => $c->stok,
							'deskripsi' => $c->deskripsi
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
		        if(!empty($c->foto)){
    		        $foto       = $c->foto;
    		    }else{
    		        $foto       = 'no-image.png';
    		    }
		     	$data[]	 	= array(
							'barcode' => $c->barcode,
							'label' => $c->nama,
							'id_produk' => $c->id,
							'foto' => $foto,
							'harga' => $c->harga-$c->harga*$c->diskon/100,
							'diskon' => $c->diskon,
							'poin' => $c->poin,
							'stok' => $c->stok,
							'deskripsi' => $c->deskripsi
				);
		     	echo json_encode($data);
		   	}
		}
	}
/* 
	public function cari_promo()
	{
		if (isset($_GET['term'])) {
			$a				= $_GET['term'];
		  	$b 				= $this->m_promo->cari_promo($a);
		   	if (count($b) > 0) {
		    foreach ($b as $c)
		        if(!empty($c->foto)){
    		        $foto       = $c->foto;
    		    }else{
    		        $foto       = 'no-image.png';
    		    }
		     	$data[]	 	= array(
							'barcode' => $c->barcode,
							'label' => $c->nama,
							'id_produk' => $c->id,
							'foto' => $foto,
							'harga' => $c->harga-$c->harga*$c->diskon/100,
							'diskon' => $c->diskon,
							'poin' => $c->poin,
							'stok' => $c->stok,
							'deskripsi' => $c->deskripsi
				);
		     	echo json_encode($data);
		   	}
		}
	} */

	public function cart(){
		if(!empty($_POST['barcode'])){
			if($this->m_promo->kode_promo($_POST['barcode'])->num_rows() > 0){
				if($this->m_promo->tampil_detail_kd($_POST['barcode'])->num_rows() > 0)
				{
					foreach($this->m_promo->tampil_detail_kd($_POST['barcode'])->result() as $a){
						//echo $a->nama;
						if(!empty($a->foto)){
							$foto       = $a->foto;
						}else{
							$foto       = 'no-image.png';
						}
						$data 		= array(
									'id' => $a->id_produk,
									'qty' => 1,
									'price' => $a->harga_promo,
									'name' => $a->nama,
									'image' => $foto,
									'diskon' => 0,
									'barcode' => $a->barcode,
									'poin' => $a->poin,
									'deskripsi' => $a->deskripsi
						);
						
						$this->cart->insert($data);
					}
					redirect(base_url('kasir/home'));
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Gagal !</strong> Data produk tidak ditemukan.</div>');
					redirect(base_url('kasir/home'));
				}
			}else{
				if(isset($_POST['masukkeranjang'])){ 
	        
					$barcode            = $_POST['barcode'];
					if($this->m_produk->lihat_produk($barcode)->num_rows() > 0){
						if(!empty($_POST['nama_produk'])){
							/* if(!empty($_POST['foto'])){
								$foto       = $_POST['foto'];
							}else{
								$foto       = 'no-image.png';
							}
							$data 		= array(
										'id' => $_POST['id_produk'],
										'qty' => 1,
										'price' => $_POST['harga'],
										'name' => $_POST['nama_produk'],
										'image' => $foto,
										'diskon' => $_POST['diskon'],
										'barcode' => $_POST['barcode'],
										'poin' => $_POST['poin'],
										'deskripsi' => $_POST['deskripsi']
							);
							
							$this->cart->insert($data); */
							redirect(base_url('kasir/home'));
							//print_r($data);
						}else{
							$a          = $_POST['barcode'];
							$b 		    = $this->m_produk->cari_produk($a);
							foreach ($b as $c){
								if(!empty($c->foto)){
									$foto       = $c->foto;
								}else{
									$foto       = 'no-image.png';
								}
								 $data 	= array(
										'id' => $c->id,
										'qty' => 1,
										'price' => $c->harga-$c->harga*$c->diskon/100,
										'name' => $c->nama,
										'image' => $foto,
										'diskon' => $c->diskon,
										'barcode' => $c->barcode,
										'poin' => $c->poin,
										'deskripsi' => $c->deskripsi
								);
								$this->cart->insert($data);
								//print_r($data);
								redirect(base_url('kasir/home'));
							   }
						}
					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Gagal !</strong> Data produk tidak ditemukan.</div>');
						redirect(base_url('kasir/home'));
					}
				}
				else{
					$a                  = $_POST['barcode'];
					$b 					= $this->m_produk->cari_produk($a);
					foreach ($b as $c){
						if(!empty($c->foto)){
							$foto       = $c->foto;
						}else{
							$foto       = 'no-image.png';
						}
							$data 		= array(
									'id' => $c->id,
									'qty' => 1,
									'price' => $c->harga-$c->harga*$c->diskon/100,
									'name' => $c->nama,
									'image' => $foto,
									'diskon' => $c->diskon,
									'barcode' => $c->barcode,
									'poin' => $c->poin,
									'deskripsi' => $c->deskripsi
						);
						//print_r($data);
						$this->cart->insert($data);
						redirect(base_url('kasir/home'));
					}
					//echo $_POST['barcode'];
					/* $a                  = $_POST['barcode'];
					if($this->m_produk->lihat_produk($a)){
						$b 				= $this->m_produk->cari_produk($a);
						foreach ($b as $c){
							if(!empty($c->foto)){
								$foto       = $c->foto;
							}else{
								$foto       = 'no-image.png';
							}
							 $data 		= array(
										'id' => $c->id,
										'qty' => 1,
										'price' => $c->harga-$c->harga*$c->diskon/100,
										'name' => $c->nama,
										'image' => $foto,
										'diskon' => $c->diskon,
										'barcode' => $c->barcode,
										'poin' => $c->poin,
										'deskripsi' => $c->deskripsi
							);
							//print_r($data);
							$this->cart->insert($data);
							redirect(base_url('kasir/home'));
						   }
					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Gagal !</strong> Data produk tidak ditemukan.</div>');
						redirect(base_url('kasir/home'));
					} */
				}
			}
		}
	    /* else{
			if(isset($_POST['masukkeranjang'])){ 
	        
				$barcode            = $_POST['barcode'];
				//echo $barcode;
				if($this->m_produk->lihat_produk($barcode)->num_rows() > 0){
					if(!empty($_POST['nama_produk'])){
						if(!empty($_POST['foto'])){
							$foto       = $_POST['foto'];
						}else{
							$foto       = 'no-image.png';
						}
						$data 		= array(
									'id' => $_POST['id_produk'],
									'qty' => 1,
									'price' => $_POST['harga'],
									'name' => $_POST['nama_produk'],
									'image' => $foto,
									'diskon' => $_POST['diskon'],
									'barcode' => $_POST['barcode'],
									'poin' => $_POST['poin'],
									'deskripsi' => $_POST['deskripsi']
						);
						
						$this->cart->insert($data);
						redirect(base_url('kasir/home'));
						//print_r($data);
					}else{
						$a          = $_POST['barcode'];
						$b 		    = $this->m_produk->cari_produk($a);
						foreach ($b as $c){
							if(!empty($c->foto)){
								$foto       = $c->foto;
							}else{
								$foto       = 'no-image.png';
							}
							 $data 	= array(
									'id' => $c->id,
									'qty' => 1,
									'price' => $c->harga-$c->harga*$c->diskon/100,
									'name' => $c->nama,
									'image' => $foto,
									'diskon' => $c->diskon,
									'barcode' => $c->barcode,
									'poin' => $c->poin,
									'deskripsi' => $c->deskripsi
							);
							$this->cart->insert($data);
							//print_r($data);
							redirect(base_url('kasir/home'));
						   }
					}
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Gagal !</strong> Data produk tidak ditemukan.</div>');
					redirect(base_url('kasir/home'));
				}
			}
			else{
				//echo $_POST['barcode'];
				$a                  = $_POST['barcode'];
				if($this->m_produk->lihat_produk($a)){
					$b 				= $this->m_produk->cari_produk($a);
					foreach ($b as $c){
						if(!empty($c->foto)){
							$foto       = $c->foto;
						}else{
							$foto       = 'no-image.png';
						}
						 $data 		= array(
									'id' => $c->id,
									'qty' => 1,
									'price' => $c->harga-$c->harga*$c->diskon/100,
									'name' => $c->nama,
									'image' => $foto,
									'diskon' => $c->diskon,
									'barcode' => $c->barcode,
									'poin' => $c->poin,
									'deskripsi' => $c->deskripsi
						);
						//print_r($data);
						$this->cart->insert($data);
						redirect(base_url('kasir/home'));
					   }
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Gagal !</strong> Data produk tidak ditemukan.</div>');
					redirect(base_url('kasir/home'));
				}
			}
		} */
	}

	public function update($a){
		switch ($a) {
			case 'cart':
				$data 	= array(
						'rowid' => $_POST['rowid'],
						'qty'   => $_POST['qty']
				);
				$this->cart->update($data);
				redirect(base_url('kasir/home'));
				break;
			
			default:
				show_404();
				break;
		}
	}

	public function transaksi(){
		$cart               = $this->cart->contents();
		$grand_total		= $this->cart->total();
		$tanggal			= date('Y-m-d H:i:s');
		$status_trx			= 'selesai';
		$poin_total			= 0;
		$id_admin			= $this->session->userdata('tunjungan@id_user');

		foreach($cart as $a){
			$poin			= $a['qty']*$a['poin'];
			$poin_total		= $poin_total+$poin;
		}

		$data				= array(
							'id_admin' => $id_admin,
							'id_user' => NULL,
							'harga_total' => $grand_total,
							'status_trx' => $status_trx,
							'poin_total' => $poin_total,
							'tgl_transaksi' => $tanggal,
							'id_pembayaran' => 3,
							'kodeunik' => NULL
		);
		
		$this->m_crud->tambah_data($data,'tbl_transaksi');
		$id_transaksi		= $this->db->query("SELECT id FROM tbl_transaksi WHERE id_admin = '$id_admin' AND poin_total = '$poin_total' AND harga_total = '$grand_total' AND status_trx = '$status_trx' AND tgl_transaksi = '$tanggal' ORDER BY id DESC LIMIT 1")->row()->id;
		
		redirect(base_url('kasir/home/invoice/'.$id_transaksi));
	}

	public function remove($a){
		$data 	= array(
				'rowid' => $a,
				'qty'   => 0
		);
		$this->cart->update($data);
		redirect(base_url('kasir/home'));
	}

	public function invoice($a){
		if(count($this->cart->contents()) == 0){
			redirect(base_url('kasir/home'));
		}
		$data["title"]			= "Invoice Pembayaran";
		$data['id_transaksi']	= $a;
		$this->load->view('kasir/head',$data);
		$this->load->view('kasir/menu',$data);
		$this->load->view('kasir/invoice',$data);
		$this->load->view('kasir/footer',$data);
	}

	public function nota(){
		if(count($this->cart->contents()) == 0){
			redirect(base_url('kasir/home'));
		}
		$id_transaksi			= $_POST['id_transaksi'];
		$uang_masuk				= $_POST['nominal'];
		$kembali				= $_POST['kembali'];
		$cart               	= $this->cart->contents();
		$tanggal				= date('Y-m-d H:i:s');

		$data					= array(
								'uang_masuk' => $uang_masuk,
								'uang_kembali' => $kembali,
								'status_trx' => 'selesai'
		);

		foreach($cart as $item){
            $id_produk		= $item['id'];
            $jumlah        	= $item['qty'];
			$harga			= $item['price'];
			$diskon         = $item['diskon'];

			$detail			= array(
							'id_produk' => $id_produk,
							'jumlah' => $jumlah,
							'harga' => $harga,
							'tanggal' => $tanggal,
							'id_user' => NULL,
							'id_transaksi' => $id_transaksi,
							'diskon'  => $diskon,
							'status_trx' => 'selesai'
			);
			$this->m_crud->tambah_data($detail,'tbl_transaksi_detail');
		}

		$where					= array('id' => $id_transaksi);
		$this->m_crud->update_data('tbl_transaksi',$data,$where);
		$this->cart->destroy();
		$data['kasir']			= $this->session->userdata('tunjungan@id_user');
		foreach($this->m_transaksi->edit_data3($id_transaksi)->result() as $a){
			$data['total']		= $a->harga_total;
			$data['kembalian']	= $a->uang_kembali;
			$data['masuk']		= $a->uang_masuk;
			$data['tanggal']	= $a->tgl_transaksi;
		}
		$data['detail']			= $this->m_transaksi->tampil_detail($id_transaksi)->result();
		$this->load->view('kasir/cetak-nota',$data);
	}
	
	public function batal()
	{
	    $this->cart->destroy();
	    redirect(base_url('kasir/home'));
	}
}