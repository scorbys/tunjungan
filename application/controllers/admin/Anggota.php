<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_akun');
		$this->load->model('m_crud');
		$this->load->model('m_anggota');
		$this->load->model('m_poin');

		if($this->is_not_login()){
			redirect(base_url('login'));
		}

        if($this->is_not_admin()){
			show_404();
		}
    }

	public function index()
	{
		$data["title"]		= "Anggota";
		$data['anggota']	= $this->m_anggota->tampil_data()->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/anggota',$data);
		$this->load->view('admin/footer',$data);
	}

	public function poin($a)
	{
		$data["title"]		= "Tukar Poin";
		$data['poin']		= $this->m_poin->tampil_data_anggota($a)->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/tukar-poin',$data);
		$this->load->view('admin/footer',$data);
	}
	
	public function tambah()
	{
		$data["title"]		= "Anggota";
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/tambah-anggota',$data);
		$this->load->view('admin/footer',$data);
	}

	public function aksi_tambah()
	{
		$input				= $this->input->post();
		$no_anggota			= $_POST['no_anggota'];
		$nama				= $_POST['nama'];
		$jenis_kelamin		= $_POST['jenis_kelamin'];
		$ktp				= $_POST['ktp'];
		$password			= base64_encode(base64_encode(base64_encode($_POST['no_anggota'])));
		$no_hp				= $_POST['no_hp'];
		$pekerjaan			= $_POST['pekerjaan'];
		$email 				= $_POST['email'];
		$id_kelurahan		= $_POST['id_kelurahan'];
		$rt 				= $_POST['rt'];
		$rw 				= $_POST['rw'];
		$level				= 3;
		$status				= 'Y';
		$poin				= 0;
		$tgl_registrasi		= $_POST['tanggal'].' '.date('H:i:s');

		$data				= array(
							'no_anggota' => $no_anggota,
							'nama' => $nama,
							'jenis_kelamin' => $jenis_kelamin,
							'ktp' => $ktp,
							'password' => $password,
							'no_hp' => $no_hp,
							'pekerjaan' => $pekerjaan,
							'id_kelurahan' => $id_kelurahan,
							'email' => $email,
							'rt' => $rt,
							'rw' => $rw,
							'status' => $status,
							'poin' => $poin,
							'level' => $level,
							'tgl_registrasi' => $tgl_registrasi
		);
		$this->m_crud->tambah_data($data,'tbl_user');
		$id_user			= $this->db->query("SELECT id_user FROM tbl_user WHERE no_anggota = '$no_anggota' AND ktp = '$ktp' LIMIT 1")->row()->id_user;
		$pokok              = array(
							'nominal' => 150000,
							'id_user' => $id_user,
							'tanggal' => date('Y-m-d H:i:s'),
							'id_admin' => $this->session->userdata('tunjungan@id_user')
		);
		$this->m_crud->tambah_data($pokok,'tbl_sim_pokok');

		$riwayat	        = array(
							'judul' => 'Pembayaran',
							'deskripsi' => 'Simpanan Pokok Rp. 150.000,00',
							'nominal' => 150000,
							'tanggal' => date('Y-m-d H:i:s'),
							'id_user'  => $id_user,
							'id_admin' =>  $this->session->userdata('tunjungan@id_user'),
							'keterangan' => 'tunai'
		);
		$this->m_crud->tambah_data($riwayat,'tbl_riwayat');

		$notifikasi	        = array(
							'id_user' => $id_user,
							'keterangan' => 'Simpanan Pokok Rp. 150.000,00',
							'judul' => 'Pembayaran',
							'status' => 'Y',
							'tanggal' => date('Y-m-d')
		);
		$this->m_crud->tambah_data($notifikasi,'tbl_notif');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data anggota berhasil disimpan.</div>');
		redirect(base_url('admin/anggota'));
	}

	public function edit($a)
	{
		$data["title"]		= "Anggota";
		$data['edit']		= $this->m_anggota->edit_data($a)->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/edit-anggota',$data);
		$this->load->view('admin/footer',$data);
	}

	public function aksi_edit()
	{
		$tahun				= date('Y') - 1;
		$tgl_pokok			= $tahun.'-'.date('m-d h:i:s');
		$input				= $this->input->post();
		$id_user			= $_POST['id_user'];
		$no_anggota			= $_POST['no_anggota'];
		$nama				= $_POST['nama'];
		$jenis_kelamin		= $_POST['jenis_kelamin'];
		$email 				= $_POST['email'];
		$ktp				= $_POST['ktp'];
		$password			= base64_encode(base64_encode(base64_encode($_POST['no_anggota'])));
		$no_hp				= $_POST['no_hp'];
		$pekerjaan			= $_POST['pekerjaan'];
		$id_kelurahan		= $_POST['id_kelurahan'];
		$rt 				= $_POST['rt'];
		$rw 				= $_POST['rw'];
		$level				= 3;
		$statu              = $_POST['status'];
		$poin				= 0;
		$tgl_registrasi		= $_POST['tanggal'].' '.date('H:i:s');

		$data				= array(
							'no_anggota' => $no_anggota,
							'nama' => $nama,
							'jenis_kelamin' => $jenis_kelamin,
							'ktp' => $ktp,
							'password' => $password,
							'no_hp' => $no_hp,
							'pekerjaan' => $pekerjaan,
							'email' => $email,
							'id_kelurahan' => $id_kelurahan,
							'rt' => $rt,
							'rw' => $rw,
							'status' => $status,
							'poin' => $poin,
							'level' => $level,
							'tgl_registrasi' => $tgl_registrasi
		);
		
		$where				= array('id_user' => $input['id_user']);
		$this->m_crud->update_data('tbl_user',$data,$where);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data anggota berhasil disimpan.</div>');
		redirect(base_url('admin/anggota'));

	}	

    public function kabupaten()
    {
        $id   = $this->input->post('id');
        $data = $this->m_anggota->kabupaten($id)->result();
        echo json_encode($data);
    }

	public function kecamatan()
    {
        $id   = $this->input->post('id');
        $data = $this->m_anggota->kecamatan($id)->result();
        echo json_encode($data);
    }

	public function kelurahan()
    {
        $id   = $this->input->post('id');
        $data = $this->m_anggota->kelurahan($id)->result();
        echo json_encode($data);
    }

	public function hapus($a)
	{
		$data			= array(
						'status' => 'N'
		);

		$where			= array('id_user' => $a);
		$this->m_crud->update_data('tbl_user',$data,$where);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Berhasil !</strong> Data anggota berhasil dihapus.</div>');
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
}