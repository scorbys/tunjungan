<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_crud');
		$this->load->model('m_akun');
		$this->load->model('m_simpanan');
		$this->load->model('m_anggota');

		if($this->is_not_login()){
			redirect(base_url('login'));
		}

        if($this->is_not_admin()){
			show_404();
		}
    }

	public function sukarela()
	{
		$data["title"]		= "Simpanan Sukarela";
		$data['simpanan']	= $this->m_simpanan->tampil_data('sukarela')->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/simpanan-sukarela',$data);
		$this->load->view('admin/footer',$data);
	}

	public function wajib()
	{
		$data["title"]		= "Simpanan Wajib";
		$data['simpanan']	= $this->m_simpanan->tampil_data('wajib')->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/simpanan-wajib',$data);
		$this->load->view('admin/footer',$data);
	}

	public function pokok()
	{
		$data["title"]		= "Simpanan Pokok";
		$data['simpanan']	= $this->m_simpanan->tampil_data('pokok')->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/simpanan-pokok',$data);
		$this->load->view('admin/footer',$data);
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
							'nama_anggota' => $c->nama
				);
		     	echo json_encode($data);
		   	}
		}
	}

	public function tambah($a)
	{
		switch ($a) {
			case 'sukarela':
				$data["title"]		= "Simpanan Sukarela";
				$this->load->view('admin/head',$data);
				$this->load->view('admin/menu',$data);
				$this->load->view('admin/tambah-sukarela',$data);
				$this->load->view('admin/footer',$data);

				break;
			
			case 'wajib':

				$data["title"]		= "Simpanan Wajib";
				$this->load->view('admin/head',$data);
				$this->load->view('admin/menu',$data);
				$this->load->view('admin/tambah-wajib',$data);
				$this->load->view('admin/footer',$data);

				break;

			default:
				$data["title"]		= "Simpanan Pokok";
				$this->load->view('admin/head',$data);
				$this->load->view('admin/menu',$data);
				$this->load->view('admin/tambah-pokok',$data);
				$this->load->view('admin/footer',$data);

				break;
		}
	}

	public function aksi_tambah($a)
	{
		$input				= $this->input->post();
		$id_user			= $input['id_user'];
		$id_admin			= $this->session->userdata('tunjungan@id_user');
		$nominal			= $input['nominal'];
		$tgl				= $input['tgl'];
		switch ($a) {
			case 'pokok':
				$data		= array(
							'id_user' => $id_user,
							'id_admin' => $id_admin,
							'tanggal' => $tgl.' '.date('H:i:s'),
							'nominal' => $nominal,
							'metode' => NULL
				);

				$riwayat	= array(
							'judul' => 'Pembayaran',
							'deskripsi' => 'Simpanan Pokok Rp. '.$nominal,
							'nominal' => $nominal,
							'tanggal' => $tgl,
							'id_user'  => $id_user,
							'id_admin' =>  $id_admin,
							'keterangan' => 'tunai'
				);
				$this->m_crud->tambah_data($riwayat,'tbl_riwayat');

				$notifikasi	= array(
							'id_user' => $id_user,
							'keterangan' => 'Simpanan Pokok Rp. '.$nominal,
							'judul' => 'Pembayaran',
							'status' => 'Y'
				);
				$this->m_crud->tambah_data($notifikasi,'tbl_notif');

				$this->m_crud->tambah_data($data,'tbl_sim_pokok');
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data simpanan pokok anggota berhasil disimpan.</div>');
				redirect(base_url('admin/simpanan/pokok'));
				break;
			
			case 'wajib':
				//$periode	= $input['periode'];
				$data		= array(
							'id_user' => $id_user,
							'id_admin' => $id_admin,
							'tanggal' => $tgl.' '.date('H:i:s'),
							'nominal' => $nominal,
							'periode' => date('Y'),
							'metode' => NULL
				);

				$riwayat	= array(
							'judul' => 'Pembayaran',
							'deskripsi' => 'Simpanan Wajib Rp. '.$nominal,
							'nominal' => $nominal,
							'tanggal' => $tgl,
							'id_user'  => $id_user,
							'id_admin' =>  $id_admin,
							'keterangan' => 'tunai'
				);
				$this->m_crud->tambah_data($riwayat,'tbl_riwayat');

				$notifikasi	= array(
							'id_user' => $id_user,
							'keterangan' => 'Simpanan Wajib Rp. '.$nominal,
							'judul' => 'Pembayaran',
							'status' => 'Y'
				);
				$this->m_crud->tambah_data($notifikasi,'tbl_notif');

				$this->m_crud->tambah_data($data,'tbl_sim_wajib');

				/* $anggota	= array(
							'tgl_wajib' => $input['tgl'].' '.date('h:i:s')
				);

				$where		= array('id_user' => $input['id_user']);
				$this->m_crud->update_data('tbl_user',$anggota,$where); */
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data simpanan wajib anggota berhasil disimpan.</div>');
				redirect(base_url('admin/simpanan/wajib'));
				break;

			default:
				$data		= array(
							'id_user' => $id_user,
							'id_admin' => $id_admin,
							'tanggal' => $tgl.' '.date('H:i:s'),
							'nominal' => $nominal,
				);

				$riwayat	= array(
							'judul' => 'Pembayaran',
							'deskripsi' => 'Simpanan Sukarela Rp. '.$nominal,
							'nominal' => $nominal,
							'tanggal' => $tgl,
							'id_user'  => $id_user,
							'id_admin' =>  $id_admin,
							'keterangan' => 'tunai'
				);
				$this->m_crud->tambah_data($riwayat,'tbl_riwayat');

				$notifikasi	= array(
							'id_user' => $id_user,
							'keterangan' => 'Simpanan Sukarela Rp. '.$nominal,
							'judul' => 'Pembayaran',
							'status' => 'Y'
				);
				$this->m_crud->tambah_data($notifikasi,'tbl_notif');

				$this->m_crud->tambah_data($data,'tbl_sim_sukarela');
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data simpanan sukarela anggota berhasil disimpan.</div>');
				redirect(base_url('admin/simpanan/sukarela'));
				break;
		}
	}

	public function edit($a,$b)
	{
		switch ($a) {
			case 'sukarela':
				$data["title"]		= "Simpanan Sukarela";
				$data['edit']		= $this->m_simpanan->edit_data($a,$b)->result();
				$this->load->view('admin/head',$data);
				$this->load->view('admin/menu',$data);
				$this->load->view('admin/edit-sukarela',$data);
				$this->load->view('admin/footer',$data);

				break;
			
			case 'wajib':

				$data["title"]		= "Simpanan Wajib";
				$data['edit']		= $this->m_simpanan->edit_data($a,$b)->result();
				$this->load->view('admin/head',$data);
				$this->load->view('admin/menu',$data);
				$this->load->view('admin/edit-wajib',$data);
				$this->load->view('admin/footer',$data);

				break;

			default:
				$data["title"]		= "Simpanan Pokok";
				$data['edit']		= $this->m_simpanan->edit_data($a,$b)->result();
				$this->load->view('admin/head',$data);
				$this->load->view('admin/menu',$data);
				$this->load->view('admin/edit-pokok',$data);
				$this->load->view('admin/footer',$data);

				break;
		}
	}	

	public function aksi_edit($a)
	{
		$input				= $this->input->post();
		$id_user			= $input['id_user'];
		$id_admin			= $this->session->userdata('tunjungan@id_user');
		$nominal			= $input['nominal'];
		$tgl				= $input['tgl'];
		$id_simpanan		= $input['id_simpanan'];
		switch ($a) {
			case 'pokok':
				$data		= array(
							'id_user' => $id_user,
							'id_admin' => $id_admin,
							'tanggal' => $tgl,
							'nominal' => $nominal,
							'metode' => NULL
				);

				$riwayat	= array(
							'judul' => 'Pembayaran',
							'deskripsi' => 'Update Simpanan Pokok Rp. '.$nominal,
							'nominal' => $nominal,
							'tanggal' => $tgl,
							'id_user'  => $id_user,
							'id_admin' =>  $id_admin,
							'keterangan' => 'tunai'
				);
				$this->m_crud->tambah_data($riwayat,'tbl_riwayat');

				$notifikasi	= array(
							'id_user' => $id_user,
							'keterangan' => 'Update Simpanan Pokok Rp. '.$nominal,
							'judul' => 'Pembayaran',
							'status' => 'Y'
				);
				$this->m_crud->tambah_data($notifikasi,'tbl_notif');
				$where		= array('id_simpanan' => $input['id_simpanan']);
				$this->m_crud->update_data('tbl_sim_pokok',$data,$where);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data simpanan pokok anggota berhasil disimpan.</div>');
				redirect(base_url('admin/simpanan/pokok'));
				break;
			
			case 'wajib':
				//$periode	= $input['periode'];
				$data		= array(
							'id_user' => $id_user,
							'id_admin' => $id_admin,
							'tanggal' => $tgl,
							'nominal' => $nominal,
							'periode' => $tgl,
							'metode' => NULL
				);

				$riwayat	= array(
							'judul' => 'Pembayaran',
							'deskripsi' => 'Update Simpanan Wajib Rp. '.$nominal,
							'nominal' => $nominal,
							'tanggal' => $tgl,
							'id_user'  => $id_user,
							'id_admin' =>  $id_admin,
							'keterangan' => 'tunai'
				);
				$this->m_crud->tambah_data($riwayat,'tbl_riwayat');

				$notifikasi	= array(
							'id_user' => $id_user,
							'keterangan' => 'Update Simpanan Wajib Rp. '.$nominal,
							'judul' => 'Pembayaran',
							'status' => 'Y'
				);
				$this->m_crud->tambah_data($notifikasi,'tbl_notif');

				$where		= array('id_simpanan' => $input['id_simpanan']);
				$this->m_crud->update_data('tbl_sim_wajib',$data,$where);

				/* $anggota	= array(
							'tgl_wajib' => $input['tgl'].' '.date('h:i:s')
				);

				$wherenya	= array('id_user' => $input['id_user']); */
				//$this->m_crud->update_data('tbl_user',$anggota,$wherenya);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data simpanan wajib anggota berhasil disimpan.</div>');
				redirect(base_url('admin/simpanan/wajib'));
				break;

			default:
				$data		= array(
							'id_user' => $id_user,
							'id_admin' => $id_admin,
							'tanggal' => $tgl,
							'nominal' => $nominal,
				);

				$riwayat	= array(
							'judul' => 'Pembayaran',
							'deskripsi' => 'Update Simpanan Sukarela Rp. '.$nominal,
							'nominal' => $nominal,
							'tanggal' => $tgl,
							'id_user'  => $id_user,
							'id_admin' =>  $id_admin,
							'keterangan' => 'tunai'
				);
				$this->m_crud->tambah_data($riwayat,'tbl_riwayat');

				$notifikasi	= array(
							'id_user' => $id_user,
							'keterangan' => 'Update Simpanan Sukarela Rp. '.$nominal,
							'judul' => 'Pembayaran',
							'status' => 'Y'
				);
				$this->m_crud->tambah_data($notifikasi,'tbl_notif');

				$where		= array('id_simpanan' => $input['id_simpanan']);
				$this->m_crud->update_data('tbl_sim_sukarela',$data,$where);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data simpanan sukarela anggota berhasil disimpan.</div>');
				redirect(base_url('admin/simpanan/sukarela'));
				break;
		}
	}

	public function hapus($a,$b)
	{
		switch ($a) {
			case 'wajib':
				$tabel				= "tbl_sim_wajib";
				$where 				= array('id_simpanan' => $b);
				$this->m_crud->hapus($tabel,$where);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data pengisian simpanan wajib berhasil dihapus.</div>');
				echo"<Script>window.location=history.go(-1)</script>";
				break;
			
			default:
				$tabel				= "tbl_sim_sukarela";
				$where 				= array('id_simpanan' => $b);
				$this->m_crud->hapus($tabel,$where);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data pengisian simpanan sukarela berhasil dihapus.</div>');
				echo"<Script>window.location=history.go(-1)</script>";
				break;
		}
	}
}