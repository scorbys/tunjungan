<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Pelaporan extends MY_Controller {
	function __construct(){
        parent::__construct();
        $this->load->library('Fpdf/fpdf');
		$this->load->model('m_login');
		$this->load->model('m_crud');
		$this->load->model('m_akun');
		$this->load->model('m_pelaporan');
		$this->load->helper('rupiah_helper'); 

		if($this->is_not_login()){
			redirect(base_url('login'));
		}

        if($this->is_not_admin()){
			show_404();
		}
    } 
	public function pindah_halaman()
	{
		$data["value"]			= $this->input->post('tunjungan') ;    
		$data["title"]		    = "Laporan PerKoperasi"; 
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/laporanperkoperasi',$data);
		$this->load->view('admin/footer',$data);
	}
	public function laporan_laba_rugi()
	{
		$data["title"]		= "Laba Rugi"; 
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/laporan_laba_rugi',$data);
		$this->load->view('admin/footer',$data);
	}
	public function laporan_penjualan()
	{
		$data["title"]		= "Penjualan"; 
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/laporan_penjualan',$data);
		$this->load->view('admin/footer',$data);
	}
	public function laporan_barang()
	{
		$data["title"]		= "Barang"; 
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/laporan_barang',$data);
		$this->load->view('admin/footer',$data);
	}
 
	public function tampil()
	{
		$data["title"]		= "Laba Rugi";
		$data['about']		= $this->m_pelaporan->tampil_data()->result();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/about',$data);
		$this->load->view('admin/footer',$data);
	}
	 
	public function report_laba_rugi()
	{
		$tgl1					= $this->input->post('tgl1')." 00:00:00";   
		$tgl2					= $this->input->post('tgl2')." 23:59:59";   
		$tgl11					= $this->input->post('tgl1') ;   
		$tgl22					= $this->input->post('tgl2') ;  
		
		$db							= $this->input->post('value') ;   
		$pdf = new FPDF('L','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
		$pdf->SetFont('Times','B',18);

		$otherdb = $this->load->database($db, TRUE);
		$profil = $otherdb->get('tbl_setting')->row_array();;
		$pdf->Image('./img/logo.png',30,5,24,24);
		$pdf->Cell(25);
		$pdf->SetFont('Times','B',20);
		$pdf->Cell(0,5,$profil['nama'],0,1,'C');
		$pdf->Cell(25);
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,5,'E-Mail : '.$profil['email_support'],0,1,'C');
		$pdf->Cell(25);
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,5,$profil['alamat'],0,1,'C');
	//	$pdf->Cell(0,5, 'Telp. / Fax : '.$profil['kontak'],0,1,'C');

		$pdf->SetLineWidth(1);
		$pdf->Line(10,36,285,36);
		$pdf->SetLineWidth(0);
		$pdf->Line(10,37,197,37);
		$pdf->Cell(30,15,'',0,1);
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(280,7,'Laporan Laba-Rugi',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(280,5,'Periode:'.$tgl11.' s/d '.$tgl22,0,1,'C');
		// Memberikan space kebawah agar tidak terlalu rapat 
		
		$pdf->Cell(30,10,'',0,1,'C');
		$pdf->SetFont('Times','B',9);
		$pdf->Cell(10,6,'NO',1,0, 'C');
		$pdf->Cell(30,6,'TANGGAL',1,0, 'C');
		$pdf->Cell(30,6,'KASIR',1,0, 'C');
		$pdf->Cell(80,6,'NAMA BARANG',1,0, 'C');
		$pdf->Cell(24,6,'HRG BELI',1,0, 'C');
		$pdf->Cell(24,6,'HRG JUAL',1,0, 'C');
		$pdf->Cell(12,6,'QTY',1,0, 'C');
		$pdf->Cell(17,6,'DISKON',1,0, 'C');
		$pdf->Cell(32,6,'SUBTOTAL',1,1, 'C');

		$this->db->select('tbl_admin.nama AS nama,SUBSTRING(tbl_transaksi.tgl_transaksi , 1, 10) AS tgl_transaksi,tbl_produk.nama AS nama_brg,
		tbl_transaksi_detail.hrg_beli_pritem AS harga_beli,tbl_transaksi_detail.harga AS harga_jual,
		tbl_transaksi_detail.jumlah AS jumlah,tbl_transaksi_detail.diskon AS diskon');    
		$this->db->from('tbl_transaksi');
		$this->db->join('tbl_admin', 'tbl_transaksi.id_admin = tbl_admin.id'); 
		$this->db->join('tbl_transaksi_detail', 'tbl_transaksi.id = tbl_transaksi_detail.id_transaksi'); 
		$this->db->join('tbl_produk', 'tbl_transaksi_detail.id_produk = tbl_produk.id'); 
		$this->db->where('tgl_transaksi >=', $tgl1);
		$this->db->where('tgl_transaksi <=', $tgl2); 
		$this->db->group_by('tbl_transaksi_detail.id'); 
		$this->db->ORDER_BY('tbl_transaksi_detail.id');  
		$mahasiswa = $this->db->get() ->result(); 
		$i = 1;
        foreach ($mahasiswa as $row){    
			$pdf->SetFont('Times','',9);
			$pdf->Cell(10,6,$i++,1,0);
			$pdf->Cell(30,6,$row->tgl_transaksi,1,0);
			$pdf->Cell(30,6,$row->nama,1,0);
			$pdf->Cell(80,6,$row->nama_brg,1,0);
			$pdf->Cell(24,6,rupiah1( $row->harga_beli),1,0);
			$pdf->Cell(24,6,rupiah1( $row->harga_jual),1,0);
			$pdf->Cell(12,6,$row->jumlah,1,0);
			$pdf->Cell(17,6,$row->diskon,1,0);
			$pdf->Cell(32,6,rupiah1($row->harga_jual * $row->jumlah),1,1);
		}
		
		$sql = "SELECT
		Sum(tbl_transaksi_detail.harga) AS harga_jual,
		Sum(tbl_transaksi_detail.hrg_beli_pritem) AS harga_beli
		FROM tbl_transaksi_detail
		INNER JOIN tbl_transaksi ON tbl_transaksi_detail.id_transaksi = tbl_transaksi.id 
		WHERE tgl_transaksi >='$tgl1' AND tgl_transaksi <='$tgl2'";
		$total = $this->m_pelaporan->General($sql)->row_array();
		$pdf->Cell(136,2,'',0,1, 'R');
		$pdf->Cell(199,6,'',0,0, 'R');
		$pdf->SetFont('Times','B',10);
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(28,6,'TOTAL',1,0, 'L');
		$pdf->Cell(32,6,'Rp. '.number_format($total['harga_jual'],'0','.','.').',-',1,1, 'L');
		$pdf->Cell(199,6,'',0,0, 'R');
		$pdf->Cell(28,6,'HPP',1,0, 'L');
		$pdf->Cell(32,6,'Rp. '.number_format($total['harga_beli'],'0','.','.').',-',1,1, 'L');
		$pdf->Cell(199,6,'',0,0, 'R');
		$pdf->Cell(28,6,'LABA',1,0, 'L');
		$pdf->Cell(32,6,'Rp. '.number_format($total['harga_jual'] - $total['harga_beli'],'0','.','.').',-',1,1, 'L');
		
		$pdf->SetFont('Times','',10);
        $pdf->Output();
	}
	public function report_penjualan()
	{   
		$tgl11						= $this->input->post('tgl1')." 00:00:00" ;   
		$tgl22						= $this->input->post('tgl2')." 23:59:00" ;  
		$tgl1						= $this->input->post('tgl1') ;   
		$tgl2						= $this->input->post('tgl2') ;   
		$db							= $this->input->post('value') ;   
		$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
		// setting jenis font yang akan digunakan
		$pdf->SetFont('Times','B',18); 
		$otherdb = $this->load->database($db, TRUE);
		$profil = $otherdb->get('tbl_setting')->row_array();;

		$pdf->Image('./img/logo.png',30,5,24,24);
		$pdf->Cell(25);
		$pdf->SetFont('Times','B',20);
		$pdf->Cell(0,5,$profil['nama'],0,1,'C');
		$pdf->Cell(25);
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,5,'E-Mail : '.$profil['email_support'],0,1,'C');
		$pdf->Cell(25);
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,5,$profil['alamat'],0,1,'C');
	//$pdf->Cell(0,5, 'Telp. / Fax : '.$profil['kontak'],0,1,'C');

		$pdf->SetLineWidth(1);
		$pdf->Line(10,36,197,36);
		$pdf->SetLineWidth(0);
		$pdf->Line(10,37,197,37);
		$pdf->Cell(30,15,'',0,1);

        $pdf->SetFont('Arial','B',12);
        // mencetak string 
        $pdf->Cell(190,5,'Laporan Penjualan',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(190,5,'Periode:'.$tgl1.' s/d '.$tgl2,0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat 
		$pdf->Cell(30,5,'',0,1);
		$pdf->SetFont('Times','B',9,'C');
		$pdf->Cell(7,6,'NO',1,0, 'C');
		$pdf->Cell(30,6,'ADMIN',1,0, 'C');   
		$pdf->Cell(30,6,'TANGGAL',1,0, 'C');
		$pdf->Cell(40,6,'UANG MASUK',1,0, 'C');
		$pdf->Cell(40,6,'UANG KEMBALI',1,0, 'C');
		$pdf->Cell(40,6,'TOTAL',1,1, 'C'); 
		$this->otherdb = $this->load->database($db, TRUE);
		$this->otherdb->select('*');    
		$this->otherdb->from('tbl_transaksi');
		$this->otherdb->join('tbl_admin', 'tbl_transaksi.id_admin = tbl_admin.id');
		$this->otherdb->where('tgl_transaksi >=', $tgl11);
		$this->otherdb->where('tgl_transaksi <=', $tgl22); 
		$this->otherdb->ORDER_BY('tgl_transaksi', 'asc');  
		$mahasiswa = $this->otherdb->get()->result(); 
		$i = 1;
        foreach ($mahasiswa as $row){  
			$pdf->SetFont('Times','',9,'C');
			$pdf->Cell(7,6,$i++,1,0);
			$pdf->Cell(30,6,$row->nama,1,0);  
			$pdf->Cell(30,6,$row->tgl_transaksi,1,0);
			$pdf->Cell(40,6,rupiah1($row->uang_masuk),1,0);
			$pdf->Cell(40,6,rupiah1($row->uang_kembali),1,0);
			$pdf->Cell(40,6,rupiah1($row->harga_total),1,1); 
		}
		 
        $pdf->Output();
	}
	public function report_barang()
	{
		$db							= $this->input->post('value') ;   
		$date = date('Y-m-d');
		$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
		// setting jenis font yang akan digunakan
		$pdf->SetFont('Times','B',18);

		$otherdb = $this->load->database($db, TRUE);
		$profil = $otherdb->get('tbl_setting')->row_array();;
		$pdf->Image('./img/logo.png',30,5,24,24);
		$pdf->Cell(25);
		$pdf->SetFont('Times','B',20);
		$pdf->Cell(0,5,$profil['nama'],0,1,'C');
		$pdf->Cell(25);
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,5,'E-Mail : '.$profil['email_support'],0,1,'C');
		$pdf->Cell(25);
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,5,$profil['alamat'],0,1,'C');
//		$pdf->Cell(0,5, 'Telp. / Fax : '.$profil['kontak'],0,1,'C');

		$pdf->SetLineWidth(1);
		$pdf->Line(10,36,197,36);
		$pdf->SetLineWidth(0);
		$pdf->Line(10,37,197,37);
		$pdf->Cell(30,15,'',0,1);

        $pdf->SetFont('Arial','B',12);
        // mencetak string 
        $pdf->Cell(190,5,'Laporan Data Barang',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(190,5,'Periode:'.$date ,0,1,'C');
		// Memberikan space kebawah agar tidak terlalu rapat  
		$pdf->Cell(30,5,'',0,1); 
		$pdf->SetFont('Times','B',9);
		$pdf->Cell(10,6,'NO',1,0, 'C');
		$pdf->Cell(27,6,'BARCODE',1,0, 'C');
		$pdf->Cell(50,6,'NAMA ITEM',1,0, 'C');
		$pdf->Cell(20,6,'DISKON',1,0, 'C');
		$pdf->Cell(20,6,'POIN',1,0, 'C');
		$pdf->Cell(25,6,'HARGA BELI',1,0, 'C');
		$pdf->Cell(25,6,'HARGA JUAL',1,0, 'C');
		$pdf->Cell(15,6,'STOK',1,1, 'C');
		
		$this->db->select('*');    
		$this->db->from('tbl_produk'); 
		$this->db->ORDER_BY("stok", "desc");  
		$mahasiswa = $this->db->get() ->result(); 
		$i = 1;
        foreach ($mahasiswa as $row){   
			
            $pdf->SetFont('Times','',9);
            $pdf->Cell(10,6,$i++,1,0);
            $pdf->Cell(27,6,$row->barcode,1,0);
            $pdf->Cell(50,6,$row->nama,1,0);
            $pdf->Cell(20,6,$row->diskon,1,0);
            $pdf->Cell(20,6,$row->poin,1,0);
            $pdf->Cell(25,6,rupiah1($row->harga_beli),1,0);
            $pdf->Cell(25,6,rupiah1($row->harga),1,0);
            $pdf->Cell(15,6,$row->stok,1,1);
		}
		 
        $pdf->Output();
	} 
}