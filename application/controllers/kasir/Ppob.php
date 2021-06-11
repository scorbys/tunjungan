<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppob extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_crud');
		$this->load->model('m_akun');
		$this->load->model('m_ppob');

		if($this->is_not_login()){
			redirect(base_url('login'));
		}

        if($this->is_not_kasir()){
			show_404();
		}
    }

	public function index()
	{
	    $curl               = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://payment.vikoshaperdana.co.id/login/saldo/ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $response           = curl_exec($curl);  
        $rest               = json_decode($response,FALSE);
        $data['saldo']      = $rest->saldo;
	    
		$data["title"]		= "PPOB";
		$data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
		$data['ppob_limit']	= $this->m_ppob->tampil_data_limit()->result();
        $data['ppob']	    = $this->m_ppob->tampil_data()->result();
        $data['nominal']    = $this->m_ppob->tampil_nominal_pulsa('telkomsel','pulsa')->result();
        $data['id_pulsa']   = NULL;
		$this->load->view('kasir/head-ppob',$data);
		$this->load->view('kasir/menu-ppob',$data);
		$this->load->view('kasir/ppob',$data);
		$this->load->view('kasir/footer-ppob',$data);
    }

    public function menu($a,$b=NULL)
    {
	    $curl               = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://payment.vikoshaperdana.co.id/login/saldo/ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $response           = curl_exec($curl);  
        $rest               = json_decode($response,FALSE);
        $data['saldo']      = $rest->saldo;
        
        switch ($a) {
            case 'pulsa':
                $data["title"]		= "PPOB";
                $data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
                $data['ppob_limit']	= $this->m_ppob->tampil_data_limit()->result();
                $data['ppob']	    = $this->m_ppob->tampil_data()->result();
                $data['nominal']    = $this->m_ppob->tampil_nominal_pulsa('telkomsel','pulsa')->result();
                $data['id_pulsa']   = $b;
                $this->load->view('kasir/head-ppob',$data);
                $this->load->view('kasir/menu-ppob',$data);
                $this->load->view('kasir/ppob',$data);
                $this->load->view('kasir/footer-ppob',$data);
                break;
            
            case 'data':
                $data["title"]		= "PPOB";
                $data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
                $data['ppob_limit']	= $this->m_ppob->tampil_data_limit()->result();
                $data['ppob']	    = $this->m_ppob->tampil_data()->result();
                $this->load->view('kasir/head-ppob',$data);
                $this->load->view('kasir/menu-ppob',$data);
                $this->load->view('kasir/ppob-data',$data);
                $this->load->view('kasir/footer-ppob',$data);
                break;
            
            case 'pascabayar':
                $data["title"]		= "PPOB";
                $data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
                $data['ppob_limit']	= $this->m_ppob->tampil_data_limit()->result();
                $data['ppob']	    = $this->m_ppob->tampil_data()->result();
                $this->load->view('kasir/head',$data);
                $this->load->view('kasir/menu',$data);
                $this->load->view('kasir/ppob-pascabayar',$data);
                $this->load->view('kasir/footer',$data);
                break;
            
            case 'pln':
                $data["title"]		= "PPOB";
                $data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
                $data['ppob_limit']	= $this->m_ppob->tampil_data_limit()->result();
                $data['ppob']	    = $this->m_ppob->tampil_data()->result();
                $data['agen']	    = $this->m_ppob->tampil_agen()->result();
                $this->load->view('kasir/head-ppob',$data);
                $this->load->view('kasir/menu-ppob',$data);
                $this->load->view('kasir/ppob-pln',$data);
                $this->load->view('kasir/footer-ppob',$data);
                break;
            
            case 'kereta':
                $data["title"]		= "PPOB";
                $data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
                $data['ppob_limit']	= $this->m_ppob->tampil_data_limit()->result();
                $data['ppob']	    = $this->m_ppob->tampil_data()->result();
                $this->load->view('kasir/head',$data);
                $this->load->view('kasir/menu',$data);
                $this->load->view('kasir/ppob-kereta',$data);
                $this->load->view('kasir/footer',$data);
                break;
            
            case 'telkom':
                $data["title"]		= "PPOB";
                $data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
                $data['ppob_limit']	= $this->m_ppob->tampil_data_limit()->result();
                $data['ppob']	    = $this->m_ppob->tampil_data()->result();
                $this->load->view('kasir/head',$data);
                $this->load->view('kasir/menu',$data);
                $this->load->view('kasir/ppob-telkom',$data);
                $this->load->view('kasir/footer',$data);
                break;
        
            case 'internet':
                $data["title"]		= "PPOB";
                $data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
                $data['ppob_limit']	= $this->m_ppob->tampil_data_limit()->result();
                $data['ppob']	    = $this->m_ppob->tampil_data()->result();
                $this->load->view('kasir/head',$data);
                $this->load->view('kasir/menu',$data);
                $this->load->view('kasir/ppob-internet',$data);
                $this->load->view('kasir/footer',$data);
                break;
        
            case 'bus':
                $data["title"]		= "PPOB";
                $data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
                $data['ppob_limit']	= $this->m_ppob->tampil_data_limit()->result();
                $data['ppob']	    = $this->m_ppob->tampil_data()->result();
                $this->load->view('kasir/head',$data);
                $this->load->view('kasir/menu',$data);
                $this->load->view('kasir/ppob-bus',$data);
                $this->load->view('kasir/footer',$data);
                break;
        
            case 'bpjs':
                $data["title"]		= "PPOB";
                $data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
                $data['ppob_limit']	= $this->m_ppob->tampil_data_limit()->result();
                $data['ppob']	    = $this->m_ppob->tampil_data()->result();
                $this->load->view('kasir/head',$data);
                $this->load->view('kasir/menu',$data);
                $this->load->view('kasir/ppob-bpjs',$data);
                $this->load->view('kasir/footer',$data);
                break;
                
            default:
                # code...
                break;
        }
    }

    public function aksi($a){
        $curl               = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://payment.vikoshaperdana.co.id/login/saldo/ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $response           = curl_exec($curl);  
        $rest               = json_decode($response,FALSE);
        $saldo              = $rest->saldo;
        
        
        if($saldo < '100000'){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Peringatan !</strong> Data transaksi gagal saldo PPOB KUD TUNJUNGAN tidak cukup.</div>');
        
            redirect(base_url('kasir/ppob/menu/pulsa'));
        }
        
        
        switch ($a) {
            case 'kereta':
        	    $curl               = curl_init();
                curl_setopt($curl, CURLOPT_URL, 'https://payment.vikoshaperdana.co.id/login/saldo/ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                $response           = curl_exec($curl);  
                $rest               = json_decode($response,FALSE);
                $data['saldo']      = $rest->saldo;
                
                $data["title"]		= "PPOB";
                $data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
                $data['ppob_limit']	= $this->m_ppob->tampil_data_limit()->result();
                $data['ppob']	    = $this->m_ppob->tampil_data()->result();
                $this->load->view('kasir/head',$data);
                $this->load->view('kasir/menu',$data);
                $this->load->view('kasir/ppob-cari-kereta',$data);
                $this->load->view('kasir/footer',$data);

                break;

            case 'bus':
        	    $curl               = curl_init();
                curl_setopt($curl, CURLOPT_URL, 'https://payment.vikoshaperdana.co.id/login/saldo/ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                $response           = curl_exec($curl);  
                $rest               = json_decode($response,FALSE);
                $data['saldo']      = $rest->saldo;
                
                $data["title"]		= "PPOB";
                $data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
                $data['ppob_limit']	= $this->m_ppob->tampil_data_limit()->result();
                $data['ppob']	    = $this->m_ppob->tampil_data()->result();
                $this->load->view('kasir/head',$data);
                $this->load->view('kasir/menu',$data);
                $this->load->view('kasir/ppob-cari-bus',$data);
                $this->load->view('kasir/footer',$data);
                break;
            
            case 'pulsa':
                /*$username    = "0895383908833";
                //$apiKey      = "2245fe8b45bd2770";
                $apiKey      = "5985ff816b5bff60598";
                $ref_id      = uniqid('');*/
                $id_pulsa    = $_POST['id_produk'];
                $hp          = str_replace([' ','-','.','+'],'',$_POST['phone']);
                foreach($this->db->query("SELECT *, tbl_produk_agratek.harga+tbl_produk_agratek.fee_vikosha AS harga_jual FROM tbl_produk_agratek WHERE id = '$id_pulsa' LIMIT 1")->result() as $b)
                {
                    $code    = $b->code_produk;
                    $h_beli  = $b->harga;
                    $h_jual  = $b->harga_jual;
                }
                /*$signature   = md5($username.$apiKey.$ref_id);
                             
                $json           = '{
                                  "commands"    : "topup",
                                  "username"    : "'.$username.'",
                                  "ref_id"      : "'.$ref_id.'",
                                  "hp"          : "'.$hp.'",
                                  "pulsa_code"  : "'.$code.'",
                                  "sign"        : "'.md5($username.$apiKey.$ref_id).'"
                                }'; */

                date_default_timezone_set('UTC');
                $userid         = 'vikosha';
                //$apikey         = 'xERJWKDrMu6fogUHfXl2kNY4Vs7PpcGSuYjVFyGz9LiKdChQmwXqEdazs5anQeDI';
                $apikey         = 'wl65IoeCZPae7ToRgNAjZHitADwQPbXHcBbfL4rlzjtKrFnqNGauUXkpDmuQRhYm';
                $inttime        = strval(time()-strtotime('1970-01-01 00:00:00'));
                $signature      = hash_hmac('sha256', "$userid&$inttime", $apikey, true); 
                $signature64    = base64_encode($signature);
                if($this->db->query("SELECT invoice_no+1  FROM tbl_trx_ppob_agratek WHERE SUBSTR(tgl_sukses,1,10) = date(now()) ORDER BY id_trx DESC LIMIT 1")->num_rows() > 0){
                    $invoice_no = $this->db->query("SELECT invoice_no+1 AS invoice_no  FROM tbl_trx_ppob_agratek WHERE SUBSTR(tgl_sukses,1,10) = date(now()) ORDER BY id_trx DESC LIMIT 1")->row()->invoice_no;
                }else{
                    $invoice_no = date('Ymd').'1';
                }
                $json           = '{
                                    "jsonrpc": "2.0",
                                     "id": 1,
                                     "method": "purchase",
                                     "params": {
                                        "data": [{
                                            "invoice_no": "'.$invoice_no.'",
                                            "produk": [{
                                                "denom": "'.$code.'",
                                                "id_pel": "'.$hp.'"
                                            }]
                                        }]
                                    }
                                }';  
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, 'https://live.agratek.id/api/merchant');
                //curl_setopt($curl, CURLOPT_URL, 'https://devel.agratek.id/api/merchant');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                	'Accept:application/json',
                	'userid:'.$userid,
                	'signature:'.$signature64,
                	'key:'.$inttime
                ));
                $response = curl_exec($curl);  
                $data = json_decode($response,FALSE); 
                //print_r($data);
                //echo $response; 
                
                //echo $data->result[0]->produk[0]->message;
                date_default_timezone_set("Asia/jakarta");
                $harga_jual             = $this->db->query("SELECT harga+fee_vikosha+ifnull(biaya_admin,0) AS harga_jual FROM tbl_produk_agratek WHERE code_produk = '$code' LIMIT 1")->row()->harga_jual;
                if($data->result[0]->produk[0]->status != 'FAILED'){
                    $hasil              = array(
                                        'id_admin' => $this->session->userdata('tunjungan@id_user'),
                                        'invoice_no' => $invoice_no,
                                        'message' => $data->result[0]->produk[0]->message,
                                        'id_pel' => $data->result[0]->produk[0]->id_pel,
                                        'code' => $data->result[0]->produk[0]->code,
                                        'total' => $data->result[0]->produk[0]->total,
                                        'subtotal' => $data->result[0]->produk[0]->subtotal,
                                        'status' => $data->result[0]->produk[0]->status,
                                        'discount' => $data->result[0]->produk[0]->discount,
                                        'denom' => $data->result[0]->produk[0]->denom,
                                        'harga_jual' => $harga_jual,
                                        'metode' => 3,
                                        'id' => $data->id,
                                        'tgl_sukses' => date('Y-m-d H:i:s')
                    );
                    $id_pel             = $data->result[0]->produk[0]->id_pel;
                    $this->m_crud->tambah_data($hasil,'tbl_trx_ppob_agratek');
                    $id_trx     		= $this->db->query("SELECT id_trx FROM tbl_trx_ppob_agratek WHERE invoice_no = '$invoice_no' AND id_pel = '$id_pel' AND denom = '$code' LIMIT 1")->row()->id_trx;
                    
                    $riwayat            = array(
                                        'id_user' => NULL,
                                        'id_trx' => $id_trx,
                                        'id_admin' => $this->session->userdata('tunjungan@id_user'),
                                        'judul' => 'Pulsa',
                                        'deskripsi' => $hp.' '.$code,
                                        'nominal' => $harga_jual,
                                        'tanggal' => date('Y-m-d H:i:s'),
                                        'keterangan' => 'PPOB',
                                        'ref_id' => $invoice_no,
                                        'status' => $data->result[0]->produk[0]->status,
                                        'penyedia' => 'AGRATEK',
                                        'metode' => 3,
                                        'img' => 'icon_riwayat_pulsa.png'
                    );
                    $this->m_crud->tambah_data($riwayat,'tbl_riwayat');
                    redirect(base_url('kasir/ppob/invoice/pulsa/'.$id_trx));
                }else{
                    if($data->ERROR[0]->error[0]->message == 'internal error'){
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Peringatan !</strong> Data transaksi gagal dengan pesan <b>'.$data->ERROR[0]->error[0]->message.'</b></div>');
                        redirect(base_url('kasir/ppob/menu/pulsa'));
                    }else{
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Peringatan !</strong> Data transaksi gagal dengan pesan <b>'.$data->data->message.'</b></div>');
                        redirect(base_url('kasir/ppob/menu/pulsa/'));
                    }
                }
                
                /*if($data->data->status < 2){
                    $hasil              = array(
                                        'ref_id' => $data->data->ref_id,
                                        'status' => $data->data->status,
                                        'price' => $data->data->price,
                                        'message' => $data->data->message,
                                        'balance' => $data->data->balance,
                                        'tr_id' => $data->data->tr_id,
                                        'id_produk' => $data->data->code,
                                        'tujuan' => $data->data->hp,
                                        'rc' => $data->data->rc,
                                        'id_user' => NULL,
                                        'tgl' => date('Y-m-d H:i:s'),
                                        'id_pembayaran' => 3,
                                        'harga_beli' => $h_beli,
                                        'harga_jual' => $h_jual
                    ); 
                    $this->m_crud->tambah_data($hasil,'tbl_trx_ppob_mobile_pulsa');
                    $ref_idnya          = $data->data->ref_id;
                    $id_trx             = $this->db->query("SELECT id FROM tbl_trx_ppob_mobile_pulsa WHERE ref_id = '$ref_idnya' AND tujuan = '$hp' LIMIT 1")->row->id;
                    $riwayat            = array(
                                        'id_user' => NULL,
                                        'id_trx' => $id_trx,
                                        'id_admin' => $this->session->userdata('tunjungan@id_user'),
                                        'judul' => 'Pulsa',
                                        'deskripsi' => $data->data->hp.' '.$data->data->code,
                                        'nominal' => $h_jual,
                                        'tanggal' => date('Y-m-d H:i:s'),
                                        'keterangan' => 'PPOB',
                                        'ref_id' => $data->data->ref_id,
                                        'status' => $data->data->status,
                                        'img' => 'icon_riwayat_topup.png'
                    );
                    $this->m_crud->tambah_data($riwayat,'tbl_riwayat');
                    $id_transaksi		= $this->db->query("SELECT id FROM tbl_trx_ppob_mobile_pulsa WHERE ref_id = '$ref_id' AND tujuan = '$hp' AND id_produk = '$code' LIMIT 1")->row()->id;
                    
                    redirect(base_url('kasir/ppob/invoice/pulsa/'.$id_transaksi));
                }
                else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Peringatan !</strong> Data transaksi gagal dengan pesan <b>'.$data->data->message.'</b></div>');
                    redirect(base_url('kasir/ppob/menu/pulsa/'));
                }*/                
                break;
                
            case 'data':
                $id_pulsa       = $_POST['id_produk'];
                $hp             = str_replace([' ','-','.','+'],'',$_POST['phone']);
                foreach($this->db->query("SELECT *, tbl_produk_agratek.harga+tbl_produk_agratek.fee_vikosha AS harga_jual FROM tbl_produk_agratek WHERE id = '$id_pulsa' LIMIT 1")->result() as $b)
                {
                    $code       = $b->code_produk;
                    $h_beli     = $b->harga;
                    $h_jual     = $b->harga_jual;
                }
                date_default_timezone_set('UTC');
                $userid         = 'vikosha';
                //$apikey         = 'xERJWKDrMu6fogUHfXl2kNY4Vs7PpcGSuYjVFyGz9LiKdChQmwXqEdazs5anQeDI';
                $apikey         = 'wl65IoeCZPae7ToRgNAjZHitADwQPbXHcBbfL4rlzjtKrFnqNGauUXkpDmuQRhYm';
                $inttime        = strval(time()-strtotime('1970-01-01 00:00:00'));
                $signature      = hash_hmac('sha256', "$userid&$inttime", $apikey, true); 
                $signature64    = base64_encode($signature);
                if($this->db->query("SELECT invoice_no+1  FROM tbl_trx_ppob_agratek WHERE SUBSTR(tgl_sukses,1,10) = date(now()) ORDER BY id_trx DESC LIMIT 1")->num_rows() > 0){
                    $invoice_no = $this->db->query("SELECT invoice_no+5 AS invoice_no  FROM tbl_trx_ppob_agratek WHERE SUBSTR(tgl_sukses,1,10) = date(now()) ORDER BY id_trx DESC LIMIT 1")->row()->invoice_no;
                }else{
                    $invoice_no = date('Ymd').'1';
                }
                $json           = '{
                                    "jsonrpc": "2.0",
                                     "id": 1,
                                     "method": "purchase",
                                     "params": {
                                        "data": [{
                                            "invoice_no": "'.$invoice_no.'",
                                            "produk": [{
                                                "denom": "'.$code.'",
                                                "id_pel": "'.$hp.'"
                                            }]
                                        }]
                                    }
                                }';  
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, 'https://live.agratek.id/api/merchant');
                //curl_setopt($curl, CURLOPT_URL, 'https://devel.agratek.id/api/merchant');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                	'Accept:application/json',
                	'userid:'.$userid,
                	'signature:'.$signature64,
                	'key:'.$inttime
                ));
                $response = curl_exec($curl);  
                $data = json_decode($response,FALSE); 
                
                date_default_timezone_set("Asia/jakarta");
                $harga_jual             = $this->db->query("SELECT harga+fee_vikosha+ifnull(biaya_admin,0) AS harga_jual FROM tbl_produk_agratek WHERE code_produk = '$code' LIMIT 1")->row()->harga_jual;
                if($data->result[0]->produk[0]->status != 'FAILED'){
                    $hasil              = array(
                                        'id_admin' => $this->session->userdata('tunjungan@id_user'),
                                        'invoice_no' => $invoice_no,
                                        'message' => $data->result[0]->produk[0]->message,
                                        'id_pel' => $data->result[0]->produk[0]->id_pel,
                                        'code' => $data->result[0]->produk[0]->code,
                                        'total' => $data->result[0]->produk[0]->total,
                                        'subtotal' => $data->result[0]->produk[0]->subtotal,
                                        'status' => $data->result[0]->produk[0]->status,
                                        'discount' => $data->result[0]->produk[0]->discount,
                                        'denom' => $data->result[0]->produk[0]->denom,
                                        'harga_jual' => $harga_jual,
                                        'id' => $data->id,
                                        'metode' => 3,
                                        'tgl_sukses' => date('Y-m-d H:i:s')
                    );
                    $id_pel             = $data->result[0]->produk[0]->id_pel;
                    $this->m_crud->tambah_data($hasil,'tbl_trx_ppob_agratek');
                    $id_trx     		= $this->db->query("SELECT id_trx FROM tbl_trx_ppob_agratek WHERE invoice_no = '$invoice_no' AND id_pel = '$id_pel' AND denom = '$code' LIMIT 1")->row()->id_trx;
                    
                    $riwayat            = array(
                                        'id_user' => NULL,
                                        'id_trx' => $id_trx,
                                        'id_admin' => $this->session->userdata('tunjungan@id_user'),
                                        'judul' => 'Pulsa',
                                        'deskripsi' => $hp.' '.$code,
                                        'nominal' => $harga_jual,
                                        'tanggal' => date('Y-m-d H:i:s'),
                                        'keterangan' => 'PPOB',
                                        'ref_id' => $invoice_no,
                                        'status' => $data->result[0]->produk[0]->status,
                                        'penyedia' => 'AGRATEK',
                                        'metode' => 3,
                                        'img' => 'icon_riwayat_pulsa.png'
                    );
                    $this->m_crud->tambah_data($riwayat,'tbl_riwayat');
                    redirect(base_url('kasir/ppob/invoice/data/'.$id_trx));
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Peringatan !</strong> Data transaksi gagal dengan pesan <b>'.$data->data->message.'</b></div>');
                    redirect(base_url('kasir/ppob/menu/data'));
                }

                break;

            case 'plntoken':
                $id_produk          = htmlspecialchars(addslashes(trim($_POST['id_produk'])));
                $id_agen            = htmlspecialchars(addslashes(trim($_POST['id_agen'])));
                $token              = str_replace([' ','-','.','+'],'',$_POST['token']);
                
                if(empty($id_produk)){
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Peringatan !</strong> Silahkan transaksi kembali, data produk GAGAL diproses.</b></div>');
                    redirect(base_url('kasir/ppob/menu/pln'));
                }
                
                foreach($this->db->query("SELECT *, tbl_produk_agratek.harga+tbl_produk_agratek.fee_vikosha AS harga_jual FROM tbl_produk_agratek WHERE id = '$id_produk' AND status = 'ACTIVE' LIMIT 1")->result() as $b)
                {
                    $code       = $b->code_produk;
                    $h_beli     = $b->harga;
                    $h_jual     = $b->harga_jual;
                }
                date_default_timezone_set('UTC');
                $userid         = 'vikosha';
                //$apikey         = 'xERJWKDrMu6fogUHfXl2kNY4Vs7PpcGSuYjVFyGz9LiKdChQmwXqEdazs5anQeDI';
                $apikey         = 'wl65IoeCZPae7ToRgNAjZHitADwQPbXHcBbfL4rlzjtKrFnqNGauUXkpDmuQRhYm';
                $inttime        = strval(time()-strtotime('1970-01-01 00:00:00'));
                $signature      = hash_hmac('sha256', "$userid&$inttime", $apikey, true); 
                $signature64    = base64_encode($signature);
                if($this->db->query("SELECT invoice_no+1  FROM tbl_trx_ppob_agratek WHERE SUBSTR(tgl_sukses,1,10) = date(now()) ORDER BY id_trx DESC LIMIT 1")->num_rows() > 0){
                    $invoice_no = $this->db->query("SELECT invoice_no+5 AS invoice_no  FROM tbl_trx_ppob_agratek WHERE SUBSTR(tgl_sukses,1,10) = date(now()) ORDER BY id_trx DESC LIMIT 1")->row()->invoice_no;
                }else{
                    $invoice_no = date('Ymd').'1';
                }
                $json           = '{
                                    "jsonrpc": "2.0",
                                     "id": 1,
                                     "method": "inquiry",
                                     "params": {
                                        "data": [{
                                            "denom": "'.$code.'",
                                            "id_pel": "'.$token.'"
                                        }]
                                     }

                                }';  
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, 'https://live.agratek.id/api/merchant');
                //curl_setopt($curl, CURLOPT_URL, 'https://devel.agratek.id/api/merchant');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                	'Accept:application/json',
                	'userid:'.$userid,
                	'signature:'.$signature64,
                	'key:'.$inttime
                ));
                $response               = curl_exec($curl);  
                $hasil                  = json_decode($response,FALSE);
                
                //print_r($hasil);
                
                if($hasil->result[0]->status != 'SUCCESS')
                {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Peringatan !</strong> Silahkan transaksi kembali, data produk GAGAL diproses mohon cek ulang ID PELANGGAN.</b></div>');
                    redirect(base_url('kasir/ppob/menu/pln'));
                }
                
                $data['status']         = $hasil->result[0]->status;
                $data['power']          = $hasil->result[0]->rincian->power;
                $data['tarif']          = $hasil->result[0]->rincian->tarif;
                $data['total']          = $hasil->result[0]->rincian->total;
                $data['pokok']          = $hasil->result[0]->rincian->pokok;
                $data['admin']          = $hasil->result[0]->rincian->admin;
                $data['denda']          = $hasil->result[0]->rincian->denda;
                $data['id_pel']         = $hasil->result[0]->id_pel;
                $data['id_agen']        = $id_agen;
                $data['nama']           = $hasil->result[0]->nama;
                $data['serial_number']  = $hasil->result[0]->serial_number;
                $data['denom']          = $hasil->result[0]->denom;
                
                $data["title"]		= "PPOB";
                $data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
                $data['ppob_limit']	= $this->m_ppob->tampil_data_limit()->result();
                $data['ppob']	    = $this->m_ppob->tampil_data()->result();
                $this->load->view('kasir/head-ppob',$data);
                $this->load->view('kasir/menu',$data);
                $this->load->view('kasir/ppob-cari-plntoken',$data);
                $this->load->view('kasir/footer-ppob',$data);
                break;
            case 'indihome':
                date_default_timezone_set('UTC');
                $userid         = 'vikosha';
                $apikey         = 'wl65IoeCZPae7ToRgNAjZHitADwQPbXHcBbfL4rlzjtKrFnqNGauUXkpDmuQRhYm';
                $inttime        = strval(time()-strtotime('1970-01-01 00:00:00'));
                $signature      = hash_hmac('sha256', "$userid&$inttime", $apikey, true); 
                $signature64    = base64_encode($signature);
                $code           = 'INDIHOME';
                $id_pel         = '141569107319';
                $json           = '{
                                    "jsonrpc": "2.0",
                                     "id": 1,
                                     "method": "inquiry",
                                     "params": {
                                        "data": [{
                                            "denom": "'.$code.'",
                                            "id_pel": "'.$id_pel.'"
                                        }]
                                     }

                                }';  
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, 'https://live.agratek.id/api/merchant');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                	'Accept:application/json',
                	'userid:'.$userid,
                	'signature:'.$signature64,
                	'key:'.$inttime
                ));
                $response               = curl_exec($curl);  
                $hasil                  = json_decode($response,FALSE);
                
                print_r($hasil) ;
                break;

            case 'plnpasca':
                $id_pel         = htmlspecialchars(addslashes(trim($_POST['id_pel'])));
                $id_agen        = htmlspecialchars(addslashes(trim($_POST['id_agen'])));
                date_default_timezone_set('UTC');
                $userid         = 'vikosha';
                $apikey         = 'wl65IoeCZPae7ToRgNAjZHitADwQPbXHcBbfL4rlzjtKrFnqNGauUXkpDmuQRhYm';
                $inttime        = strval(time()-strtotime('1970-01-01 00:00:00'));
                $signature      = hash_hmac('sha256', "$userid&$inttime", $apikey, true); 
                $signature64    = base64_encode($signature);
                
                if($this->db->query("SELECT invoice_no+1  FROM tbl_trx_ppob_agratek WHERE SUBSTR(tgl_sukses,1,10) = date(now()) ORDER BY id_trx DESC LIMIT 1")->num_rows() > 0){
                    $invoice_no = $this->db->query("SELECT invoice_no+5 AS invoice_no  FROM tbl_trx_ppob_agratek WHERE SUBSTR(tgl_sukses,1,10) = date(now()) ORDER BY id_trx DESC LIMIT 1")->row()->invoice_no;
                }else{
                    $invoice_no = date('Ymd').'1';
                }
                
                $curl = curl_init();
                
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://live.agratek.id/api/merchant',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS =>'{
                        "jsonrpc": "2.0",
                        "id": 1,
                        "method": "inquiry",
                        "params": {
                            "data": [{
                                "denom": "PLNPASCA",
                                "id_pel": "'.$id_pel.'"
                            }]
                        }
                    }',
                    CURLOPT_HTTPHEADER => array(
                            	'userid:'.$userid,
                            	'signature:'.$signature64,
                            	'key:'.$inttime,
                                'Content-Type: application/json'
                    ),
                ));
                 
                $response = curl_exec($curl);
                
                curl_close($curl);
                $hasil                  = json_decode($response,FALSE);
                
                echo $response;
                
                if($hasil->result[0]->status != 'SUCCESS')
                {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Peringatan !</strong> Silahkan transaksi kembali, data produk GAGAL diproses mohon cek ulang ID PELANGGAN.</b></div>');
                    redirect(base_url('kasir/ppob/menu/pln'));
                }
                
                $data['status']         = $hasil->result[0]->status;
                $data['power']          = $hasil->result[0]->rincian->power;
                $data['tarif']          = $hasil->result[0]->rincian->tarif;
                $data['total']          = $hasil->result[0]->rincian->total;
                $data['pokok']          = $hasil->result[0]->rincian->pokok;
                $data['admin']          = $hasil->result[0]->rincian->admin;
                $data['denda']          = $hasil->result[0]->rincian->denda;
                $data['id_pel']         = $hasil->result[0]->id_pel;
                $data['id_agen']        = $id_agen;
                $data['nama']           = $hasil->result[0]->nama;
                $data['serial_number']  = $hasil->result[0]->serial_number;
                $data['denom']          = $hasil->result[0]->denom;
                
                
                $data["title"]		= "PPOB";
                $data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
                $data['ppob_limit']	= $this->m_ppob->tampil_data_limit()->result();
                $data['ppob']	    = $this->m_ppob->tampil_data()->result();
                $this->load->view('kasir/head-ppob',$data);
                $this->load->view('kasir/menu',$data);
                $this->load->view('kasir/ppob-cari-plnpasca',$data);
                $this->load->view('kasir/footer-ppob',$data);
                break;
            default:
                # code...
                break;
        }
    }
    
    public function pln($a,$b,$c,$d=NULL){
        switch ($a){
            case 'pasca':
                date_default_timezone_set('UTC');
                $userid         = 'vikosha';
                $apikey         = 'xERJWKDrMu6fogUHfXl2kNY4Vs7PpcGSuYjVFyGz9LiKdChQmwXqEdazs5anQeDI';
                //$apikey         = 'wl65IoeCZPae7ToRgNAjZHitADwQPbXHcBbfL4rlzjtKrFnqNGauUXkpDmuQRhYm';
                $inttime        = strval(time()-strtotime('1970-01-01 00:00:00'));
                $signature      = hash_hmac('sha256', "$userid&$inttime", $apikey, true); 
                $signature64    = base64_encode($signature);
                if($this->db->query("SELECT invoice_no+1  FROM tbl_trx_ppob_agratek WHERE SUBSTR(tgl_sukses,1,10) = date(now()) ORDER BY id_trx DESC LIMIT 1")->num_rows() > 0){
                    $invoice_no = $this->db->query("SELECT invoice_no+7 AS invoice_no  FROM tbl_trx_ppob_agratek WHERE SUBSTR(tgl_sukses,1,10) = date(now()) ORDER BY id_trx DESC LIMIT 1")->row()->invoice_no;
                }else{
                    $invoice_no = date('Ymd').'1';
                }
                $json           = '{
                                    "jsonrpc": "2.0",
                                     "id": 1,
                                     "method": "purchase",
                                     "params": {
                                        "data": [{
                                            "invoice_no": "'.$invoice_no.'",
                                            "produk": [{
                                                "denom": "'.$c.'",
                                                "id_pel": "'.$b.'"
                                            }]
                                        }]
                                    }
                                }';  
                $curl = curl_init();
                
                //curl_setopt($curl, CURLOPT_URL, 'https://live.agratek.id/api/merchant');
                curl_setopt($curl, CURLOPT_URL, 'https://devel.agratek.id/api/merchant');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                	'Accept:application/json',
                	'userid:'.$userid,
                	'signature:'.$signature64,
                	'key:'.$inttime
                ));
                $response = curl_exec($curl);  
                $data = json_decode($response,FALSE);
                
                date_default_timezone_set("Asia/jakarta");
                $harga_jual             = $this->db->query("SELECT harga+fee_vikosha+ifnull(biaya_admin,0) AS harga_jual FROM tbl_produk_agratek WHERE code_produk = '$c' LIMIT 1")->row()->harga_jual;
                if($data->result[0]->produk[0]->status != 'FAILED'){
                    $hasil              = array(
                                        'id_admin' => $this->session->userdata('tunjungan@id_user'),
                                        'invoice_no' => $invoice_no,
                                        'message' => $data->result[0]->produk[0]->message,
                                        'id_pel' => $data->result[0]->produk[0]->id_pel,
                                        'code' => $data->result[0]->produk[0]->code,
                                        'total' => $data->result[0]->produk[0]->total,
                                        'subtotal' => $data->result[0]->produk[0]->subtotal,
                                        'status' => $data->result[0]->produk[0]->status,
                                        'discount' => $data->result[0]->produk[0]->discount,
                                        'denom' => $data->result[0]->produk[0]->denom,
                                        'harga_jual' => $harga_jual,
                                        'id' => $data->id,
                                        'metode' => 3,
                                        'tgl_sukses' => date('Y-m-d H:i:s'),
                                        'id_agen' => $d
                    );
                    $id_pel             = $data->result[0]->produk[0]->id_pel;
                    $this->m_crud->tambah_data($hasil,'tbl_trx_ppob_agratek');
                    $id_trx     		= $this->db->query("SELECT id_trx FROM tbl_trx_ppob_agratek WHERE invoice_no = '$invoice_no' AND id_pel = '$id_pel' AND denom = '$c' LIMIT 1")->row()->id_trx;
                    
                    $riwayat            = array(
                                        'id_user' => NULL,
                                        'id_trx' => $id_trx,
                                        'id_admin' => $this->session->userdata('tunjungan@id_user'),
                                        'judul' => 'PLN',
                                        'deskripsi' => $hp.' '.$code,
                                        'nominal' => $harga_jual,
                                        'tanggal' => date('Y-m-d H:i:s'),
                                        'keterangan' => 'PPOB',
                                        'ref_id' => $invoice_no,
                                        'status' => $data->result[0]->produk[0]->status,
                                        'penyedia' => 'AGRATEK',
                                        'metode' => 3,
                                        'img' => 'icon_riwayat_pln.png'
                    );
                    $this->m_crud->tambah_data($riwayat,'tbl_riwayat');
                    redirect(base_url('kasir/ppob/invoice/pasca/'.$id_trx));
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Peringatan !</strong> Data transaksi gagal dengan pesan <b>'.$data->data->message.'</b></div>');
                    redirect(base_url('kasir/ppob/menu/pln'));
                }
                break;
            default :
                date_default_timezone_set('UTC');
                $userid         = 'vikosha';
                $apikey         = 'xERJWKDrMu6fogUHfXl2kNY4Vs7PpcGSuYjVFyGz9LiKdChQmwXqEdazs5anQeDI';
                //$apikey         = 'wl65IoeCZPae7ToRgNAjZHitADwQPbXHcBbfL4rlzjtKrFnqNGauUXkpDmuQRhYm';
                $inttime        = strval(time()-strtotime('1970-01-01 00:00:00'));
                $signature      = hash_hmac('sha256', "$userid&$inttime", $apikey, true); 
                $signature64    = base64_encode($signature);
                if($this->db->query("SELECT invoice_no+1  FROM tbl_trx_ppob_agratek WHERE SUBSTR(tgl_sukses,1,10) = date(now()) ORDER BY id_trx DESC LIMIT 1")->num_rows() > 0){
                    $invoice_no = $this->db->query("SELECT invoice_no+7 AS invoice_no  FROM tbl_trx_ppob_agratek WHERE SUBSTR(tgl_sukses,1,10) = date(now()) ORDER BY id_trx DESC LIMIT 1")->row()->invoice_no;
                }else{
                    $invoice_no = date('Ymd').'1';
                }
                $json           = '{
                                    "jsonrpc": "2.0",
                                     "id": 1,
                                     "method": "purchase",
                                     "params": {
                                        "data": [{
                                            "invoice_no": "'.$invoice_no.'",
                                            "produk": [{
                                                "denom": "'.$c.'",
                                                "id_pel": "'.$b.'"
                                            }]
                                        }]
                                    }
                                }';  
                $curl = curl_init();
                
                //curl_setopt($curl, CURLOPT_URL, 'https://live.agratek.id/api/merchant');
                curl_setopt($curl, CURLOPT_URL, 'https://devel.agratek.id/api/merchant');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                	'Accept:application/json',
                	'userid:'.$userid,
                	'signature:'.$signature64,
                	'key:'.$inttime
                ));
                $response = curl_exec($curl);  
                $data = json_decode($response,FALSE);
                
                date_default_timezone_set("Asia/jakarta");
                $harga_jual             = $this->db->query("SELECT harga+fee_vikosha+ifnull(biaya_admin,0) AS harga_jual FROM tbl_produk_agratek WHERE code_produk = '$c' LIMIT 1")->row()->harga_jual;
                if($data->result[0]->produk[0]->status != 'FAILED'){
                    $hasil              = array(
                                        'id_admin' => $this->session->userdata('tunjungan@id_user'),
                                        'invoice_no' => $invoice_no,
                                        'message' => $data->result[0]->produk[0]->message,
                                        'id_pel' => $data->result[0]->produk[0]->id_pel,
                                        'code' => $data->result[0]->produk[0]->code,
                                        'total' => $data->result[0]->produk[0]->total,
                                        'subtotal' => $data->result[0]->produk[0]->subtotal,
                                        'status' => $data->result[0]->produk[0]->status,
                                        'discount' => $data->result[0]->produk[0]->discount,
                                        'denom' => $data->result[0]->produk[0]->denom,
                                        'harga_jual' => $harga_jual,
                                        'id' => $data->id,
                                        'metode' => 3,
                                        'tgl_sukses' => date('Y-m-d H:i:s'),
                                        'id_agen' => $d
                    );
                    $id_pel             = $data->result[0]->produk[0]->id_pel;
                    $this->m_crud->tambah_data($hasil,'tbl_trx_ppob_agratek');
                    $id_trx     		= $this->db->query("SELECT id_trx FROM tbl_trx_ppob_agratek WHERE invoice_no = '$invoice_no' AND id_pel = '$id_pel' AND denom = '$c' LIMIT 1")->row()->id_trx;
                    
                    $riwayat            = array(
                                        'id_user' => NULL,
                                        'id_trx' => $id_trx,
                                        'id_admin' => $this->session->userdata('tunjungan@id_user'),
                                        'judul' => 'PLN',
                                        'deskripsi' => $hp.' '.$code,
                                        'nominal' => $harga_jual,
                                        'tanggal' => date('Y-m-d H:i:s'),
                                        'keterangan' => 'PPOB',
                                        'ref_id' => $invoice_no,
                                        'status' => $data->result[0]->produk[0]->status,
                                        'penyedia' => 'AGRATEK',
                                        'metode' => 3,
                                        'img' => 'icon_riwayat_pln.png'
                    );
                    $this->m_crud->tambah_data($riwayat,'tbl_riwayat');
                    redirect(base_url('kasir/ppob/invoice/pln/'.$id_trx));
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Peringatan !</strong> Data transaksi gagal dengan pesan <b>'.$data->data->message.'</b></div>');
                    redirect(base_url('kasir/ppob/menu/pln'));
                }
                break;
        }
    }

    public function invoice($a,$b=NULL){
	    $curl               = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://payment.vikoshaperdana.co.id/login/saldo/ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $response           = curl_exec($curl);  
        $rest               = json_decode($response,FALSE);
        $data['saldo']      = $rest->saldo;
        
        switch ($a) {
            case 'pulsa':
                $data["title"]		= "PPOB";
                $data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
                $data['ppob_limit']	= $this->m_ppob->tampil_data_limit()->result();
                $data['ppob']	    = $this->m_ppob->tampil_data()->result();
                $data['id']         = $b;
                $data['transaksi']  = $this->m_ppob->tampil_data_transaksi($b)->result();
                $this->load->view('kasir/head',$data);
                $this->load->view('kasir/menu',$data);
                $this->load->view('kasir/invoice-ppob-pulsa',$data);
                $this->load->view('kasir/footer',$data);
                break;
            case 'data':
                $data["title"]		= "PPOB";
                $data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
                $data['ppob_limit']	= $this->m_ppob->tampil_data_limit()->result();
                $data['ppob']	    = $this->m_ppob->tampil_data()->result();
                $data['id']         = $b;
                $data['transaksi']  = $this->m_ppob->tampil_data_transaksi($b)->result();
                $this->load->view('kasir/head',$data);
                $this->load->view('kasir/menu',$data);
                $this->load->view('kasir/invoice-ppob-data',$data);
                $this->load->view('kasir/footer',$data);
                break;
            case 'pln':
                $data["title"]		= "PPOB";
                $data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
                $data['ppob_limit']	= $this->m_ppob->tampil_data_limit()->result();
                $data['ppob']	    = $this->m_ppob->tampil_data()->result();
                $data['id']         = $b;
                $data['transaksi']  = $this->m_ppob->tampil_data_transaksi($b)->result();
                $this->load->view('kasir/head',$data);
                $this->load->view('kasir/menu',$data);
                $this->load->view('kasir/invoice-ppob-pln',$data);
                $this->load->view('kasir/footer',$data);
                break;
            case 'pasca':
                $data["title"]		= "PPOB";
                $data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
                $data['ppob_limit']	= $this->m_ppob->tampil_data_limit()->result();
                $data['ppob']	    = $this->m_ppob->tampil_data()->result();
                $data['id']         = $b;
                $data['transaksi']  = $this->m_ppob->tampil_data_transaksi($b)->result();
                $this->load->view('kasir/head',$data);
                $this->load->view('kasir/menu',$data);
                $this->load->view('kasir/invoice-ppob-pasca',$data);
                $this->load->view('kasir/footer',$data);
                break;
            case 'kereta':
                $data["title"]		= "PPOB";
                $data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
                $data['ppob_limit']	= $this->m_ppob->tampil_data_limit()->result();
                $data['ppob']	    = $this->m_ppob->tampil_data()->result();
                $data['id']         = $b;
                $data['transaksi']  = $this->m_ppob->tampil_data_transaksi($b)->result();
                $this->load->view('kasir/head',$data);
                $this->load->view('kasir/menu',$data);
                $this->load->view('kasir/invoice-ppob-kereta',$data);
                $this->load->view('kasir/footer',$data);
                break;
            case 'telkom':
                $data["title"]		= "PPOB";
                $data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
                $data['ppob_limit']	= $this->m_ppob->tampil_data_limit()->result();
                $data['ppob']	    = $this->m_ppob->tampil_data()->result();
                $data['id']         = $b;
                $data['transaksi']  = $this->m_ppob->tampil_data_transaksi($b)->result();
                $this->load->view('kasir/head',$data);
                $this->load->view('kasir/menu',$data);
                $this->load->view('kasir/invoice-ppob-telkom',$data);
                $this->load->view('kasir/footer',$data);
                break;
            case 'internet':
                $data["title"]		= "PPOB";
                $data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
                $data['ppob_limit']	= $this->m_ppob->tampil_data_limit()->result();
                $data['ppob']	    = $this->m_ppob->tampil_data()->result();
                $data['id']         = $b;
                $data['transaksi']  = $this->m_ppob->tampil_data_transaksi($b)->result();
                $this->load->view('kasir/head',$data);
                $this->load->view('kasir/menu',$data);
                $this->load->view('kasir/invoice-ppob-internet',$data);
                $this->load->view('kasir/footer',$data);
                break;
            case 'bus':
                $data["title"]		= "PPOB";
                $data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
                $data['ppob_limit']	= $this->m_ppob->tampil_data_limit()->result();
                $data['ppob']	    = $this->m_ppob->tampil_data()->result();
                $data['id']         = $b;
                $data['transaksi']  = $this->m_ppob->tampil_data_transaksi($b)->result();
                $this->load->view('kasir/head',$data);
                $this->load->view('kasir/menu',$data);
                $this->load->view('kasir/invoice-ppob-bus',$data);
                $this->load->view('kasir/footer',$data);
                break;
            case 'bpjs':
                $data["title"]		= "PPOB";
                $data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
                $data['ppob_limit']	= $this->m_ppob->tampil_data_limit()->result();
                $data['ppob']	    = $this->m_ppob->tampil_data()->result();
                $data['id']         = $b;
                $data['transaksi']  = $this->m_ppob->tampil_data_transaksi($b)->result();
                $this->load->view('kasir/head',$data);
                $this->load->view('kasir/menu',$data);
                $this->load->view('kasir/invoice-ppob-bpjs',$data);
                $this->load->view('kasir/footer',$data);
                break;
            
            default:
                # code...
                break;
        }
    }

    public function riwayat(){
	    $curl               = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://payment.vikoshaperdana.co.id/login/saldo/ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $response           = curl_exec($curl);  
        $rest               = json_decode($response,FALSE);
        $data['saldo']      = $rest->saldo;
        
        $data["title"]		= "PPOB";
        $data['akun']		= $this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result();
        $data['riwayat']    = $this->m_ppob->tampil_riwayat()->result();
        $this->load->view('kasir/head',$data);
        $this->load->view('kasir/menu',$data);
        $this->load->view('kasir/riwayat-ppob-pulsa',$data);
        $this->load->view('kasir/footer',$data);
    }

    public function cek($a,$b=NULL,$c=NULL){
        $curl               = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://payment.vikoshaperdana.co.id/login/saldo/ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $response           = curl_exec($curl);  
        $rest               = json_decode($response,FALSE);
        $saldo              = $rest->saldo;
        
        switch ($a) {
            case 'pulsa':
                if($saldo < '100000'){
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Peringatan !</strong> Data transaksi gagal saldo PPOB KUD TUNJUNGAN tidak cukup.</div>');
                
                    redirect(base_url('kasir/ppob/menu/pulsa'));
                }
                date_default_timezone_set('UTC');
                $userid         = 'vikosha';
                $apikey         = 'wl65IoeCZPae7ToRgNAjZHitADwQPbXHcBbfL4rlzjtKrFnqNGauUXkpDmuQRhYm';
                $inttime        = strval(time()-strtotime('1970-01-01 00:00:00'));
                $signature      = hash_hmac('sha256', "$userid&$inttime", $apikey, true); 
                $signature64    = base64_encode($signature);
                $json       = '{
                                "jsonrpc": "2.0",
                                "id": 1,
                                "method": "advice",
                                "params": {
                                        "data": [{
                                                "invoice_no": "'.$b.'"
                                            }]
                                        }
                                }
                            ';
                $curl  = curl_init();
                
                curl_setopt($curl, CURLOPT_URL, 'https://live.agratek.id/api/merchant');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
                curl_setopt($curl, CURLOPT_HTTPHEADER, [
                    'Accept:application/json',
                	'userid:'.$userid,
                	'signature:'.$signature64,
                	'key:'.$inttime
                ]);
                $response = curl_exec($curl);  
                $data = json_decode($response,FALSE);
                //echo $response;
                $id_pel             = $data->result[0]->produk[0]->id_pel;
                $code               = $data->result[0]->produk[0]->denom;
                date_default_timezone_set("Asia/jakarta");
                $id_trx     		= $this->db->query("SELECT id_trx FROM tbl_trx_ppob_agratek WHERE invoice_no = '$b' AND id_pel = '$id_pel' AND denom = '$code' LIMIT 1")->row()->id_trx;
                if($data->result[0]->produk[0]->status == 'SUCCESS'){
                    $hasil              = array(
                                        'invoice_no' => $b,
                                        'status' => $data->result[0]->produk[0]->status,
                                        'message' => 'Transaksi ke'.$data->result[0]->produk[0]->id_pel.' berhasil',
                                        'serial_number' => $data->result[0]->produk[0]->serial_number,
                                        'tgl_sukses' => date('Y-m-d H:i:s')
                    );
                    //print_r($hasil);
                    $where				= array('invoice_no' => $b);
                    $this->m_crud->update_data('tbl_trx_ppob_agratek',$hasil,$where);
                    $riwayat            = array(
                                        'tanggal' => date('Y-m-d H:i:s'),
                                        'status' => 'SUCCESS'
                    );
                    $where_riwayat		= array('id_trx' => $id_trx);
                    $this->m_crud->update_data('tbl_riwayat',$riwayat,$where_riwayat);
                    
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Sukses !</strong> Data transaksi sukses.</b></div>');
                }
                else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Peringatan !</strong> Data transaksi gagal dengan pesan <b>'.$data->result[0]->produk[0]->message.'</b></div>');
                }
                
                redirect(base_url('kasir/ppob/invoice/pulsa/'.$id_trx));
                break;

            case 'data':
                date_default_timezone_set('UTC');
                $userid         = 'vikosha';
                $apikey         = 'wl65IoeCZPae7ToRgNAjZHitADwQPbXHcBbfL4rlzjtKrFnqNGauUXkpDmuQRhYm';
                $inttime        = strval(time()-strtotime('1970-01-01 00:00:00'));
                $signature      = hash_hmac('sha256', "$userid&$inttime", $apikey, true); 
                $signature64    = base64_encode($signature);
                $json       = '{
                                "jsonrpc": "2.0",
                                "id": 1,
                                "method": "advice",
                                "params": {
                                        "data": [{
                                                "invoice_no": "'.$b.'"
                                            }]
                                        }
                                }
                            ';
                $curl  = curl_init();
                
                curl_setopt($curl, CURLOPT_URL, 'https://live.agratek.id/api/merchant');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
                curl_setopt($curl, CURLOPT_HTTPHEADER, [
                    'Accept:application/json',
                	'userid:'.$userid,
                	'signature:'.$signature64,
                	'key:'.$inttime
                ]);
                $response = curl_exec($curl);  
                $data = json_decode($response,FALSE);
                $id_pel             = $data->result[0]->produk[0]->id_pel;
                $code               = $data->result[0]->produk[0]->denom;
                date_default_timezone_set("Asia/jakarta");
                $id_trx     		= $this->db->query("SELECT id_trx FROM tbl_trx_ppob_agratek WHERE invoice_no = '$b' AND id_pel = '$id_pel' AND denom = '$code' LIMIT 1")->row()->id_trx;
                if($data->result[0]->produk[0]->status == 'SUCCESS'){
                    $hasil              = array(
                                        'invoice_no' => $b,
                                        'status' => $data->result[0]->produk[0]->status,
                                        'message' => 'Transaksi paket data ke'.$data->result[0]->produk[0]->id_pel.' berhasil',
                                        'serial_number' => $data->result[0]->produk[0]->serial_number,
                                        'tgl_sukses' => date('Y-m-d H:i:s')
                    );
                    $where				= array('invoice_no' => $b);
                    $this->m_crud->update_data('tbl_trx_ppob_agratek',$hasil,$where);
                    $riwayat            = array(
                                        'tanggal' => date('Y-m-d H:i:s'),
                                        'status' => 'SUCCESS'
                    );
                    $where_riwayat		= array('id_trx' => $id_trx);
                    $this->m_crud->update_data('tbl_riwayat',$riwayat,$where_riwayat);
                    
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Sukses !</strong> Data transaksi sukses.</b></div>');
                }
                else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Peringatan !</strong> Data transaksi gagal dengan pesan <b>'.$data->result[0]->produk[0]->message.'</b></div>');
                }
                
                redirect(base_url('kasir/ppob/invoice/data/'.$id_trx));
                break;
            
            case 'token':
                date_default_timezone_set('UTC');
                $userid         = 'vikosha';
                $apikey         = 'wl65IoeCZPae7ToRgNAjZHitADwQPbXHcBbfL4rlzjtKrFnqNGauUXkpDmuQRhYm';
                $inttime        = strval(time()-strtotime('1970-01-01 00:00:00'));
                $signature      = hash_hmac('sha256', "$userid&$inttime", $apikey, true); 
                $signature64    = base64_encode($signature);
                $json       = '{
                                "jsonrpc": "2.0",
                                "id": 1,
                                "method": "advice",
                                "params": {
                                        "data": [{
                                                "invoice_no": "'.$b.'"
                                            }]
                                        }
                                }
                            ';
                $curl  = curl_init();
                
                curl_setopt($curl, CURLOPT_URL, 'https://live.agratek.id/api/merchant');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
                curl_setopt($curl, CURLOPT_HTTPHEADER, [
                    'Accept:application/json',
                	'userid:'.$userid,
                	'signature:'.$signature64,
                	'key:'.$inttime
                ]);
                $response = curl_exec($curl);  
                $data = json_decode($response,FALSE);
                date_default_timezone_set("Asia/jakarta");
                if($data->result[0]->produk[0]->status == 'SUCCESS'){
                    $id_pel             = $data->result[0]->produk[0]->id_pel;
                    $code               = $data->result[0]->produk[0]->denom;
                    $id_trx     		= $this->db->query("SELECT id_trx FROM tbl_trx_ppob_agratek WHERE invoice_no = '$b' AND id_pel = '$id_pel' AND denom = '$code' LIMIT 1")->row()->id_trx;
                    $hasil              = array(
                                        'invoice_no' => $b,
                                        'status' => $data->result[0]->produk[0]->status,
                                        'message' => 'Transaksi token listrik ke'.$data->result[0]->produk[0]->id_pel.' berhasil',
                                        'serial_number' => $data->result[0]->produk[0]->serial_number,
                                        'tgl_sukses' => date('Y-m-d H:i:s')
                    );
                    $where				= array('invoice_no' => $b);
                    $this->m_crud->update_data('tbl_trx_ppob_agratek',$hasil,$where);
                    $riwayat            = array(
                                        'tanggal' => date('Y-m-d H:i:s'),
                                        'status' => 'SUCCESS'
                    );
                    $where_riwayat		= array('id_trx' => $id_trx);
                    $this->m_crud->update_data('tbl_riwayat',$riwayat,$where_riwayat);
                    
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Sukses !</strong> Data transaksi sukses.</b></div>');
                    redirect(base_url('kasir/ppob/invoice/pln/'.$id_trx));
                }
                else{
                    $id_trx     		= $this->db->query("SELECT id_trx FROM tbl_trx_ppob_agratek WHERE invoice_no = '$b' LIMIT 1")->row()->id_trx;
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Peringatan !</strong> Data transaksi gagal dengan pesan <b>'.$data->result[0]->produk[0]->message.'</b></div>');
                
                    redirect(base_url('kasir/ppob/invoice/pln/'.$id_trx));
                }
                
                break;
            
            case 'pasca':
                date_default_timezone_set('UTC');
                $userid         = 'vikosha';
                $apikey         = 'wl65IoeCZPae7ToRgNAjZHitADwQPbXHcBbfL4rlzjtKrFnqNGauUXkpDmuQRhYm';
                $inttime        = strval(time()-strtotime('1970-01-01 00:00:00'));
                $signature      = hash_hmac('sha256', "$userid&$inttime", $apikey, true); 
                $signature64    = base64_encode($signature);
                $json       = '{
                                "jsonrpc": "2.0",
                                "id": 1,
                                "method": "advice",
                                "params": {
                                        "data": [{
                                                "invoice_no": "'.$b.'"
                                            }]
                                        }
                                }
                            ';
                $curl  = curl_init();
                
                curl_setopt($curl, CURLOPT_URL, 'https://live.agratek.id/api/merchant');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
                curl_setopt($curl, CURLOPT_HTTPHEADER, [
                    'Accept:application/json',
                	'userid:'.$userid,
                	'signature:'.$signature64,
                	'key:'.$inttime
                ]);
                $response = curl_exec($curl);  
                $data = json_decode($response,FALSE);
                date_default_timezone_set("Asia/jakarta");
                if($data->result[0]->produk[0]->status == 'SUCCESS'){
                    $id_pel             = $data->result[0]->produk[0]->id_pel;
                    $code               = $data->result[0]->produk[0]->denom;
                    $id_trx     		= $this->db->query("SELECT id_trx FROM tbl_trx_ppob_agratek WHERE invoice_no = '$b' AND id_pel = '$id_pel' AND denom = '$code' LIMIT 1")->row()->id_trx;
                    $hasil              = array(
                                        'invoice_no' => $b,
                                        'status' => $data->result[0]->produk[0]->status,
                                        'message' => 'Transaksi listrik ke'.$data->result[0]->produk[0]->id_pel.' berhasil',
                                        'tgl_sukses' => date('Y-m-d H:i:s')
                    );
                    $where				= array('invoice_no' => $b);
                    $this->m_crud->update_data('tbl_trx_ppob_agratek',$hasil,$where);
                    $riwayat            = array(
                                        'tanggal' => date('Y-m-d H:i:s'),
                                        'status' => 'SUCCESS'
                    );
                    $where_riwayat		= array('id_trx' => $id_trx);
                    $this->m_crud->update_data('tbl_riwayat',$riwayat,$where_riwayat);
                    
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Sukses !</strong> Data transaksi sukses.</b></div>');
                    redirect(base_url('kasir/ppob/invoice/pasca/'.$id_trx));
                }
                else{
                    $id_trx     		= $this->db->query("SELECT id_trx FROM tbl_trx_ppob_agratek WHERE invoice_no = '$b' LIMIT 1")->row()->id_trx;
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Peringatan !</strong> Data transaksi gagal dengan pesan <b>'.$data->result[0]->produk[0]->message.'</b></div>');
                
                    redirect(base_url('kasir/ppob/invoice/pasca/'.$id_trx));
                }
                
                break;
            
            
            default:
                # code...
                break;
        }
    }

    public function cetak($a,$b=NULL){
        switch ($a) {
            case 'pulsa':
                $data['id']         = $b;
                $data['kasir']	    = $this->session->userdata('tunjungan@id_user');
                $data['transaksi']  = $this->m_ppob->tampil_data_transaksi($b)->result();
                $this->load->view('kasir/cetak-pulsa',$data);
                break;
            case 'data':
                $data['id']         = $b;
                $data['kasir']	    = $this->session->userdata('tunjungan@id_user');
                $data['transaksi']  = $this->m_ppob->tampil_data_transaksi($b)->result();
                $this->load->view('kasir/cetak-data',$data);
                break;
            
            case 'riwayat':
                $data['id']         = $b;
                $data['kasir']	    = $this->session->userdata('tunjungan@id_user');
                $data['transaksi']  = $this->m_ppob->tampil_data_transaksi($b)->result();
                $this->load->view('kasir/cetak-pulsa',$data);
                break;
            
            case 'token':
                $data['id']         = $b;
                $data['kasir']	    = $this->session->userdata('tunjungan@id_user');
                $data['transaksi']  = $this->m_ppob->tampil_data_transaksi($b)->result();
                $this->load->view('kasir/cetak-token',$data);
                break;
            
            case 'pasca':
                $data['id']         = $b;
                $data['kasir']	    = $this->session->userdata('tunjungan@id_user');
                $data['transaksi']  = $this->m_ppob->tampil_data_transaksi($b)->result();
                $this->load->view('kasir/cetak-pasca',$data);
                break;

            case 'kereta':
                $data['id']         = $b;
                $data['kasir']	    = $this->session->userdata('tunjungan@id_user');
                $data['transaksi']  = $this->m_ppob->tampil_data_transaksi($b)->result();
                $this->load->view('kasir/cetak-kereta',$data);
                break;
            
            case 'telkom':
                $data['id']         = $b;
                $data['kasir']	    = $this->session->userdata('tunjungan@id_user');
                $data['transaksi']  = $this->m_ppob->tampil_data_transaksi($b)->result();
                $this->load->view('kasir/cetak-telkom',$data);
                break;
            
            case 'internet':
                $data['id']         = $b;
                $data['kasir']	    = $this->session->userdata('tunjungan@id_user');
                $data['transaksi']  = $this->m_ppob->tampil_data_transaksi($b)->result();
                $this->load->view('kasir/cetak-internet',$data);
                break;

            case 'bus':
                $data['id']         = $b;
                $data['kasir']	    = $this->session->userdata('tunjungan@id_user');
                $data['transaksi']  = $this->m_ppob->tampil_data_transaksi($b)->result();
                $this->load->view('kasir/cetak-bus',$data);
                break;
            
            case 'bpjs':
                $data['id']         = $b;
                $data['kasir']	    = $this->session->userdata('tunjungan@id_user');
                $data['transaksi']  = $this->m_ppob->tampil_data_transaksi($b)->result();
                $this->load->view('kasir/cetak-bpjs',$data);
                break;
            
            default:
                # code...
                break;
        }
    }

    public function cari_provider()
	{
		if (isset($_GET['term'])) {
			$a				= $_GET['term'];
		  	$b 				= $this->m_ppob->cari_provider($a);
		    foreach ($b as $c){
		        $foto       = $c->foto;
		     	$data[]	 	= array(
							'provider' => $c->pulsa,
							'img_provider' => $c->foto,
				);
		     	echo json_encode($data);
            }    		    
		}
	}
}