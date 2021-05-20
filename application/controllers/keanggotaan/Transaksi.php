<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_crud');
		$this->load->model('m_akun');
		$this->load->model('m_anggota');
		$this->load->model('m_simpanan');
		$this->load->model('m_riwayat');
		$this->load->model('m_transaksi');

		if($this->is_not_login()){
			redirect(base_url('login'));
		}

        if($this->is_not_keanggotaan()){
			show_404();
		}
    }

	public function index()
	{
		$data["title"]			= "Data Transaksi";
		if(isset($_POST['filter'])){
			$simpanan			= $_POST['simpanan'];
			$id_propinsi		= $_POST['id_propinsi'];
			$id_kabupaten		= $_POST['id_kabupaten'];
			$id_kecamatan		= $_POST['id_kecamatan'];
			$id_kelurahan		= $_POST['id_kelurahan'];
			$data['pokok']		= $this->m_simpanan->tampil_data('pokok')->result();
			$data['wajib']		= $this->m_simpanan->tampil_data('wajib')->result();
			$data['sukarela']	= $this->m_simpanan->tampil_data('sukarela')->result();
		}
		else{
			
			$simpanan			= '';
			$id_propinsi		= '';
			$id_kabupaten		= '';
			$id_kecamatan		= '';
			$id_kelurahan		= '';
			$data['pokok']		= $this->m_simpanan->tampil_data('pokok')->result();
			$data['wajib']		= $this->m_simpanan->tampil_data('wajib')->result();
			$data['sukarela']	= $this->m_simpanan->tampil_data('sukarela')->result();
		}

		$data['simpanan']		= $simpanan;
		$data['id_propinsi']	= $id_propinsi;
		$data['id_kabupaten']	= $id_kabupaten;
		$data['id_kecamatan']	= $id_kecamatan;
		$data['id_kelurahan']	= $id_kelurahan;

		$this->load->view('keanggotaan/head',$data);
		$this->load->view('keanggotaan/menu',$data);
		$this->load->view('keanggotaan/simpanan',$data);
		$this->load->view('keanggotaan/footer',$data);
	}

	public function baru()
	{
		$data["title"]		= "Data Transaksi";
		$data['pokok']		= $this->m_simpanan->tampil_data('pokok')->result();
		$data['wajib']		= $this->m_simpanan->tampil_data('wajib')->result();
		$data['sukarela']	= $this->m_simpanan->tampil_data('sukarela')->result();
		$this->load->view('keanggotaan/head',$data);
		$this->load->view('keanggotaan/menu',$data);
		$this->load->view('keanggotaan/transaksi-baru',$data);
		$this->load->view('keanggotaan/footer',$data);
	}

	public function aksi_baru(){
	    
        
		$id_user			= $_POST['id_user'];
		$id_firebase    	= $_POST['id_firebase'];
		$tanggal			= $_POST['tanggal'].' '.date('H:i:s');
		$nominal			= str_replace(".", "", $_POST['nominal']);
		$id_admin			= $this->session->userdata('tunjungan@id_user');
		$simpanan			= $_POST['simpanan'];
		 
        include_once dirname(__FILE__) . '/../firebase/firebase.php' ;
        include_once dirname(__FILE__) . '/../firebase/push.php' ; 

        $firebase = new Firebase();
        $push = new Push(); 
        $payload = array();
        $payload['team'] = 'Indonesia';
        $payload['score'] = '5.6';
         $a ='';
         if($simpanan =='1'){
         $a ="Sukarela";
         }elseif($simpanan =='2'){
         $a ="Wajib";
         }
        $title      = "Top Up Simpanan $a"; 
        $message    = "Selamat Anda telah berhasil topup Rp. $nominal";
          
        $push->setTitle($title);
        $push->setMessage($message); 
        $push->setImage('');
        $push->setIsBackground(FALSE);
        $push->setPayload($payload);
 
 
        $json = '';
        $response = '';
         
            $json = $push->getPush(); 
            $response = $firebase->send($id_firebase, $json);
         
		switch ($simpanan) {
			case '1':
				$sukarela	= array(
							'id_user' => $id_user,
							'tanggal' => $tanggal,
							'nominal' => $nominal,
							'id_admin' => $id_admin,
							'periode' => date('Y')
				);

				$this->m_crud->tambah_data($sukarela,'tbl_sim_sukarela');
		        $id_trx		= $this->db->query("SELECT id_simpanan FROM tbl_sim_sukarela WHERE id_user = '$id_user' AND tanggal = '$tanggal' LIMIT 1")->row()->id_simpanan;

				$riwayat	= array(
							'judul' => 'Pembayaran',
							'deskripsi' => 'Simpanan Sukarela',
							'nominal' => $nominal,
							'tanggal' => $tanggal,
							'id_user'  => $id_user,
							'id_admin' =>  $id_admin,
							'keterangan' => 'Top Up',
							'status' => 'SUCCESS',
							'id_trx' => $id_trx,
							'metode' => 3,
							'img' => 'icon_riwayat_topup.png'
				);
				$this->m_crud->tambah_data($riwayat,'tbl_riwayat');

				$notifikasi	= array(
							'id_user' => $id_user,
							'keterangan' => 'Simpanan Sukarela Rp. '.$nominal,
							'judul' => 'Pembayaran',
							'status' => 'Y',
							'tanggal' => $_POST['tanggal']
				);
				$this->m_crud->tambah_data($notifikasi,'tbl_notif');
				$id_simpanan	= $this->db->query("SELECT id_simpanan FROM tbl_sim_sukarela WHERE id_user = '$id_user' AND tanggal = '$tanggal' ORDER BY id_simpanan DESC LIMIT 1")->row()->id_simpanan;
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Transaksi tidak dikenal.</div>');
				redirect(base_url('keanggotaan/transaksi/cetak/sukarela/'.$id_simpanan));

				break;
			
			case '2':
				$wajib		= array(
							'id_user' => $id_user,
							'tanggal' => $tanggal,
							'nominal' => $nominal,
							'id_admin' => $id_admin,
							'periode' => date('Y')
				);

				$this->m_crud->tambah_data($wajib,'tbl_sim_wajib');
		        $id_trx		= $this->db->query("SELECT id_simpanan FROM tbl_sim_wajib WHERE id_user = '$id_user' AND tanggal = '$tanggal' LIMIT 1")->row()->id_simpanan;

				$riwayat	= array(
							'judul' => 'Pembayaran',
							'deskripsi' => 'Simpanan Wajib',
							'nominal' => $nominal,
							'tanggal' => $tanggal,
							'id_user'  => $id_user,
							'id_admin' =>  $id_admin, 
							'keterangan' => 'Top Up',
							'status' => 'SUCCESS',
							'id_trx' => $id_trx,
							'metode' => 3,
							'img' => 'icon_riwayat_topup.png'
				);
				$this->m_crud->tambah_data($riwayat,'tbl_riwayat');

				$notifikasi	= array(
							'id_user' => $id_user,
							'keterangan' => 'Simpanan Wajib Rp. '.$nominal,
							'judul' => 'Pembayaran',
							'status' => 'Y',
							'tanggal' => $_POST['tanggal']
				);
				$this->m_crud->tambah_data($notifikasi,'tbl_notif');
				$id_simpanan	= $this->db->query("SELECT id_simpanan FROM tbl_sim_wajib WHERE id_user = '$id_user' AND tanggal = '$tanggal' ORDER BY id_simpanan DESC LIMIT 1")->row()->id_simpanan;
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Transaksi tidak dikenal.</div>');
				redirect(base_url('keanggotaan/transaksi/cetak/wajib/'.$id_simpanan));
				break;
			
			default:
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Gagal !</strong> Transaksi tidak dikenal.</div>');
				redirect(base_url('keanggotaan/transaksi/baru'));
				break;
		}		
	}

	public function cari_anggota()
	{
		if (isset($_GET['term'])) {
			$a				= $_GET['term'];
		  	$b 				= $this->m_anggota->cari_anggota($a);
		   	if (count($b) > 0) {
		    foreach ($b as $c)
		     	$data[]	 	= array(
							'id_user' => $c->id_user,
							'label' => $c->no_anggota,
							'nama' => $c->nama,
							'kelurahan' => $c->kelurahan,
							'kecamatan' => $c->kecamatan,
							'rt' => $c->rt,
							'rw' => $c->rw,
							'id_firebase' => $c->id_firebase
				);
		     	echo json_encode($data);
		   	}
		}
	}

	public function riwayat(){
		$data["title"]		= "Data Transaksi";
		$data['sukarela']	= $this->m_riwayat->tampil_data('sukarela')->result();
		$data['pokok']		= $this->m_riwayat->tampil_data('pokok')->result();
		$data['wajib']		= $this->m_riwayat->tampil_data('wajib')->result();
		$this->load->view('keanggotaan/head',$data);
		$this->load->view('keanggotaan/menu',$data);
		$this->load->view('keanggotaan/riwayat-simpanan',$data);
		$this->load->view('keanggotaan/footer',$data);		
	}

	public function verifikasi(){
		$data["title"]		= "Verifiikasi Transaksi";
		$data['verifikasi']	= $this->m_transaksi->tampil_pembayaran()->result();
		$this->load->view('keanggotaan/head',$data);
		$this->load->view('keanggotaan/menu',$data);
		$this->load->view('keanggotaan/verifikasi-transaksi',$data);
		$this->load->view('keanggotaan/footer',$data);	
	}

	public function aksi_verifikasi($a){
		$id_admin			= $this->session->userdata('tunjungan@id_user');
		$periode			= date('Y-m-d');
		foreach($this->m_transaksi->edit_pembayaran($a)->result() as $b){
			$simpanan		= $b->simpanan;
			$nominal		= $b->nominal;
			$id_user		= $b->id_user;
			$tanggal		= $b->tgl;
		}

		$edit				= array(
							'verif' => 'Y',
							'id_admin' => $id_admin,
							'tgl_verif' => date('Y-m-d H:i:s')
		);

		$where 				= array(
							'id' => $a
		); 
		
		$this->m_crud->update_data('tbl_bayar_apk',$edit,$where);  
	    	  
		if($simpanan == 'Simpanan Wajib'){
			$data			= array(
							'id_user' => $id_user,
							'id_admin' => $id_admin,
							'nominal' => $nominal,
							'tanggal' => $tanggal,
							'periode' => $periode,
							'verif' => 'Y'
			);

			$this->m_crud->tambah_data($data,'tbl_sim_wajib'); 
				$notifikasi	= array(
							'id_user' => $id_user,
							'keterangan' => 'Simpanan Wajib Rp. '.$nominal,
							'judul' => 'Pembayaran',
							'status' => 'Y',
							'tanggal' => date('Y-m-d')
				);
				$this->m_crud->tambah_data($notifikasi,'tbl_notif'); 

           foreach($this->db->query("SELECT tbl_sim_wajib.id_simpanan,tbl_user.id_firebase
                                    FROM tbl_sim_wajib INNER JOIN tbl_user ON tbl_sim_wajib.id_user = tbl_user.id_user WHERE tanggal = '$tanggal'")->result() as $apk){
		    
		     	$id_simpanan1		    = $apk->id_simpanan;
		     	$id_firebase		    = $apk->id_firebase;
        		
	    	}
                $whereriwayat   	= array(
        							'tanggal' => $tanggal
        		); 
        		$editriwayat	    = array(
        							'status'   => 'SUCCESS',
        							'img'      => 'icon_riwayat_simpanan.png',
        							'id_admin' => $id_admin,
        							'id_trx'   => $id_simpanan1
        		);
        		
		        $this->m_crud->update_data('tbl_riwayat',$editriwayat,$whereriwayat);
		        
				$notifikasi	= array(
							'id_user' => $id_user,
							'keterangan' => 'Simpanan Sukarela Rp. '.$nominal,
							'judul' => 'Pembayaran',
							'status' => 'Y',
							'tanggal' => date('Y-m-d')
				);
				$this->m_crud->tambah_data($notifikasi,'tbl_notif');
	    	
				
				include_once dirname(__FILE__) . '/../firebase/firebase.php' ;
                include_once dirname(__FILE__) . '/../firebase/push.php' ; 
        
                $firebase = new Firebase();
                $push = new Push(); 
                $payload = array();
                $payload['team'] = 'Indonesia';
                $payload['score'] = '5.6'; 
                $title      = "Top Up Simpanan Wajib"; 
                $message    = "Selamat Anda telah berhasil topup Rp. $nominal";
                  
                $push->setTitle($title);
                $push->setMessage($message); 
                $push->setImage('');
                $push->setIsBackground(FALSE);
                $push->setPayload($payload);
         
         
                $json = '';
                $response = '';
         
                $json = $push->getPush(); 
                $response = $firebase->send($id_firebase, $json);
				
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Transaksi terverifikasi.</div>');
			redirect(base_url('keanggotaan/transaksi/verifikasi'));
		}
		elseif($simpanan == 'Simpanan Sukarela'){
			$data			= array(
							'id_user' => $id_user,
							'id_admin' => $id_admin,
							'nominal' => $nominal,
							'tanggal' => $tanggal,
							'periode' => $periode
			);

			$this->m_crud->tambah_data($data,'tbl_sim_sukarela');
			 foreach($this->db->query("SELECT tbl_user.id_firebase,tbl_sim_sukarela.id_simpanan
            FROM tbl_user INNER JOIN tbl_sim_sukarela ON tbl_sim_sukarela.id_user = tbl_user.id_user  WHERE tanggal = '$tanggal'")->result() as $apk){
		    
		     	$id_simpanan1		    = $apk->id_simpanan;
		     	$id_firebase		    = $apk->id_firebase;
        		
	    	}
                $whereriwayat   	= array(
        							'tanggal' => $tanggal
        		); 
        		$editriwayat	    = array(
        							'status'   => 'SUCCESS',
        							'img'      => 'icon_riwayat_simpanan.png',
        							'id_admin' => $id_admin,
        							'id_trx'   => $id_simpanan1
        		);
        		
		        $this->m_crud->update_data('tbl_riwayat',$editriwayat,$whereriwayat);
				$notifikasi	= array(
							'id_user' => $id_user,
							'keterangan' => 'Simpanan Sukarela Rp. '.$nominal,
							'judul' => 'Pembayaran',
							'status' => 'Y',
							'tanggal' => date('Y-m-d')
				);
				$this->m_crud->tambah_data($notifikasi,'tbl_notif');
				
				include_once dirname(__FILE__) . '/../firebase/firebase.php' ;
                include_once dirname(__FILE__) . '/../firebase/push.php' ; 
        
                $firebase = new Firebase();
                $push = new Push(); 
                $payload = array();
                $payload['team'] = 'Indonesia';
                $payload['score'] = '5.6'; 
                $title      = "Top Up Simpanan Sukarela"; 
                $message    = "Selamat Anda telah berhasil topup Rp. $nominal";
                  
                $push->setTitle($title);
                $push->setMessage($message); 
                $push->setImage('');
                $push->setIsBackground(FALSE);
                $push->setPayload($payload);
         
         
                $json = '';
                $response = '';
         
                $json = $push->getPush(); 
                $response = $firebase->send($id_firebase, $json);
				
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Transaksi terverifikasi.</div>');
			redirect(base_url('keanggotaan/transaksi/verifikasi'));
		}
		else{
			show_404();
		}
		  
	}
	
	public function tolak($a){
	    
		$id_admin			= $this->session->userdata('tunjungan@id_user');
		$edit				= array(
							'verif' => 'F',
							'id_admin' => $id_admin,
							'tgl_verif' => date('Y-m-d H:i:s')
		);

		$where 				= array(
							'id' => $a
		); 
		
		$this->m_crud->update_data('tbl_bayar_apk',$edit,$where); 
		
		foreach($this->db->query("SELECT * FROM tbl_bayar_apk WHERE id = '$a'")->result() as $b)
		{
		    $id_user        = $b->id_user;
		    $tanggal        = $b->tgl;
		    $simpanan       = $b->simpanan;
		}
		
		$editriwayat	    = array(
							'status'   => 'FAILED',
							'img'      => 'icon_riwayat_simpanan.png',
							'id_admin' => $id_admin
		);
		
		$whereriwayat   	= array(
							'tanggal' => $tanggal
		); 
		
        $this->m_crud->update_data('tbl_riwayat',$editriwayat,$whereriwayat);
        
        $id_firebase    = $this->db->query("SELECT id_firebase FROM tbl_user WHERE id_user = '$id_user'")->row()->id_firebase;
        
        include_once dirname(__FILE__) . '/../firebase/firebase.php' ;
        include_once dirname(__FILE__) . '/../firebase/push.php' ; 

        $firebase = new Firebase();
        $push = new Push(); 
        $payload = array();
        $payload['team'] = 'Indonesia';
        $payload['score'] = '5.6'; 
        $title      = "Top Up ".$simpanan." Ditolak"; 
        $message    = "Simpanan Anda ditolak.";
          
        $push->setTitle($title);
        $push->setMessage($message); 
        $push->setImage('');
        $push->setIsBackground(FALSE);
        $push->setPayload($payload);
 
 
        $json = '';
        $response = '';
 
        $json = $push->getPush(); 
        $response = $firebase->send($id_firebase, $json);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Transaksi ditolak.</div>');
		redirect(base_url('keanggotaan/transaksi/verifikasi')); 
	}

	public function cetak($a,$b=NULL){
		$data["title"]		= "Data Transaksi";
		/* $this->load->view('keanggotaan/head',$data);
		$this->load->view('keanggotaan/menu',$data);
		$this->load->view('keanggotaan/404',$data);
		$this->load->view('keanggotaan/footer',$data); */
		switch ($a) {
			case 'sukarela':
				if(!empty($b)){
					$data['cetak']	= $this->m_simpanan->edit_data($a,$b)->result();
					$this->load->view('keanggotaan/cetak-sukarela',$data);
				}else{
					$data['cetak']	= $this->m_simpanan->tampil_data($a)->result();
					$this->load->view('keanggotaan/cetak-simpanan-sukarela',$data);
				}
				break;
			
			case 'wajib':
				$data['cetak']	= $this->m_simpanan->edit_data($a,$b)->result();
				$this->load->view('keanggotaan/cetak-wajib',$data);
				break;
			
			case 'pokok':
				$data['cetak']	= $this->m_simpanan->edit_data($a,$b)->result();
				$this->load->view('keanggotaan/cetak-pokok',$data);
				break;
			
			default:
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Transaksi tidak dikenal.</div>');
				redirect(base_url('keanggotaan/transaksi/baru'));
				break;
		}
	}

	public function export($a=NULL,$b=NULL){
		$data["title"]		= "Data Transaksi";
		/* $this->load->view('keanggotaan/head',$data);
		$this->load->view('keanggotaan/menu',$data);
		$this->load->view('keanggotaan/404',$data);
		$this->load->view('keanggotaan/footer',$data); */
		switch ($a) {
			case 'sukarela':
				if(!empty($b)){
					$data['cetak']	= $this->m_simpanan->edit_data($a,$b)->result();
					$this->load->view('keanggotaan/cetak-sukarela',$data);
				}else{
					$data['cetak']	= $this->m_simpanan->tampil_data($a)->result();
					$this->load->view('keanggotaan/cetak-simpanan-sukarela-excel',$data);
				}
				break;
			
			case 'wajib':
			    if(!empty($b)){
					$data['cetak']	= $this->m_simpanan->edit_data($a,$b)->result();
				}else{
					$data['cetak']	= $this->m_simpanan->tampil_data($a)->result();
				}
				$this->load->view('keanggotaan/cetak-wajib-excel',$data);
				break;
			
			case 'pokok':
			    if(!empty($b)){
					$data['cetak']	= $this->m_simpanan->edit_data($a,$b)->result();
				}else{
					$data['cetak']	= $this->m_simpanan->tampil_data($a)->result();
				}
				$this->load->view('keanggotaan/cetak-pokok-excel',$data);
				break;
			
			default:
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Transaksi tidak dikenal.</div>');
				redirect(base_url('keanggotaan/transaksi'));
				break;
		}
	}
	
	public function hapus($a,$b){
	    switch ($a) {
			case 'sukarela':
				$tabel				= "tbl_sim_sukarela";
				$where 				= array('id_simpanan' => $b);
				$this->m_crud->hapus($tabel,$where);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data transaksi simpanan sukarela berhasil dihapus.</div>');
				echo"<Script>window.location=history.go(-1)</script>";
				break;
			
			case 'wajib':
				$tabel				= "tbl_sim_wajib";
				$where 				= array('id_simpanan' => $b);
				$this->m_crud->hapus($tabel,$where);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data transaksi simpanan wajib berhasil dihapus.</div>');
				echo"<Script>window.location=history.go(-1)</script>";
				break;
			default:
				show_404();
				break;
		}
	}
}