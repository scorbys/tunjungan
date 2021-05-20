<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengambilan extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_crud');
		$this->load->model('m_login');
		$this->load->model('m_akun');
		$this->load->model('m_simpanan');

		if($this->is_not_login()){
			redirect(base_url('login'));
		}

        if($this->is_not_keanggotaan()){
			show_404();
		}
    }

	public function index()
	{
		$data["title"]		= "Data Pengambilan";
		$this->load->view('keanggotaan/head',$data);
		$this->load->view('keanggotaan/menu',$data);
		$this->load->view('keanggotaan/pengambilan-sukarela',$data);
		$this->load->view('keanggotaan/footer',$data);
    }

    public function aksi_pengambilan()
    {  
	    include_once dirname(__FILE__) . '/../firebase/firebase.php' ;
	    include_once dirname(__FILE__) . '/../firebase/push.php' ; 
		$datanya            = 'ABCDEFGHIJKLMNOPQRSTU1234567890';
		$string             = "";
		for($i = 0; $i < 9; $i++) {
			$pos            = rand(0, strlen($datanya)-1);
			$string         .= $datanya{$pos};
		}
		$status				= 'N';
		$kode_unik			= $string;
		$nominal			= str_replace(".", "", $_POST['nominal']);
		$tgl				= $_POST['tgl_transaksi'].' '.date('H:i:s');
		$id_firebase    	= $_POST['id_firebase'];
		
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
		$title      = "Pengambilan Simpanan"; 
		$message    = "Berhasil Pengambilan Simpanan Rp. $nominal ";
		
		$push->setTitle($title);
		$push->setMessage($message); 
		$push->setImage('');
		$push->setIsBackground(FALSE);
		$push->setPayload($payload);


		$json = '';
		$response = '';
		 
		$json = $push->getPush(); 
		$response = $firebase->send($id_firebase, $json);
		$data				= array(
							'id_user' => $_POST['id_user'],
							'kode_unik' => $kode_unik,
							'id_admin' => $this->session->userdata('tunjungan@id_user'),
							'nominal' => $nominal,
							'tanggal' => $tgl,
							'status' =>  $status
		);
		$id_user			= $_POST['id_user'];
		//echo $this->db->query("SELECT total_sukarela FROM v_total_sukarela WHERE id_user = '$id_user' LIMIT 1")->row()->total_sukarela;
		if($this->db->query("SELECT total_sukarela FROM v_total_sukarela WHERE id_user = '$id_user' LIMIT 1")->row()->total_sukarela >= $nominal)
		{
			$this->m_crud->tambah_data($data,'tbl_pengambilan_sukarela');
						
			$riwayat	= array(
						'judul' => 'Pengambilan',
						'deskripsi' => 'Simpanan Sukarela Rp. '.$nominal,
						'nominal' => $nominal,
						'tanggal' => $tgl,
						'id_user'  => $id_user,
						'id_admin' =>  $this->session->userdata('tunjungan@id_user'),
						'keterangan' => 'tunai'
			);
			$this->m_crud->tambah_data($riwayat,'tbl_riwayat');

			$notifikasi	= array(
						'id_user' => $id_user,
						'keterangan' => 'Simpanan Sukarela Rp. '.$nominal,
						'judul' => 'Pengambilan',
						'status' => 'Y',
						'tanggal' => $_POST['tgl_transaksi']
			);
			$this->m_crud->tambah_data($notifikasi,'tbl_notif');
			
			$id_pengambilan	= $this->db->query("SELECT id_pengambilan FROM tbl_pengambilan_sukarela WHERE id_user = '$id_user' AND kode_unik = '$kode_unik' AND tanggal = '$tgl' ORDER BY id_pengambilan DESC LIMIT 1")->row()->id_pengambilan;
			
			if($id_pengambilan > 0){
			    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data simpanan sukarela anggota berhasil diambil.</div>');
			    redirect(base_url('keanggotaan/pengambilan/cetak/'.$id_pengambilan));
			}
			else{
			    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data simpanan sukarela anggota berhasil diambil.</div>');
			    redirect(base_url('keanggotaan/pengambilan'));
			}
		}
		else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Gagal !</strong> Data simpanan sukarela anggota tidak mencukupi.</div>');
			redirect(base_url('keanggotaan/pengambilan'));
		}
	}
	
	public function cetak($a){
		$data['cetak']	= $this->m_simpanan->edit_pengambilan($a)->result();
		$this->load->view('keanggotaan/cetak-pengambilan',$data);
	}

	public function riwayat()
	{
		$data["title"]			= "Data Pengambilan";
		$data['pengambilan']	= $this->m_simpanan->tampil_pengambilan()->result();
		$this->load->view('keanggotaan/head',$data);
		$this->load->view('keanggotaan/menu',$data);
		$this->load->view('keanggotaan/riwayat-pengambilan',$data);
		$this->load->view('keanggotaan/footer',$data);
    }
}