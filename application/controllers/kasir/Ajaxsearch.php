<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxsearch extends CI_Controller {

	function index()
	{
		$this->load->view('ajaxsearch');
    }
    
    function rupiah($angka){    
        $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
        return $hasil_rupiah; 
    }

	function fetch()
	{
		$output = '';
		$query = '';
		$this->load->model('ajaxsearch_model');
		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
        }
        $count  = strlen($query);
        if($count > 3){
            $nomor      = substr($query,0,4);
            if($this->db->query("SELECT pulsa FROM tbl_ppob_nohp WHERE nomor = '$nomor' LIMIT 1")->num_rows() > 0)
            {
                $penyedia   = $this->db->query("SELECT pulsa FROM tbl_ppob_nohp WHERE nomor = '$nomor' LIMIT 1")->row()->pulsa;
                $data       = $this->ajaxsearch_model->fetch_data($penyedia);


		
                foreach($data->result() as $row){
                    if($row->harga_jual > 900000){
                        $nama   = $row->nama.'000000';
                    }else{
                        $nama   = $row->nama.'000';
                    }
                    $nama   = 
                    $output .= '
                            <div class="col-lg-3 col-md-4 col-sm-6 nominal">
                                <a href="#" id="'.$row->id.'" onclick="scrollDown()">
                                    <div class="col-md-12 btn-ppob" id="ganti-class">
                                        <div class="box-body">
                                            <center><p>'.$nama.'</p></center>
                                            <center><p>'.$this->rupiah($row->harga_jual).'</p></center>
                                        </div>
                                    </div>            
                                </a>
                            </div>
                            
                            <script> 
                                var id_pulsa = document.getElementById("'.$row->id.'");
                                id_pulsa.addEventListener("click", pulsa_click, false);

                                function pulsa_click()
                                {
                                    document.getElementById("id_produk").value = "'.$row->id.'";
                                    document.getElementById("keterangan").value = "'.$row->deskripsi.'";
                                    document.getElementById("harga_jual").value = "'.$this->rupiah($row->harga_jual).'";
                                }
                            </script>
                          
                            ';
                }
                
                echo $output;
            }
        }		
	}

	function data()
	{
		$output = '';
		$query = '';
		$this->load->model('ajaxsearch_model');
		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
        }
        $count  = strlen($query);
        if($count > 3){
            $nomor      = substr($query,0,4);
            if($this->db->query("SELECT pulsa FROM tbl_ppob_nohp WHERE nomor = '$nomor' LIMIT 1")->num_rows() > 0)
            {
                $penyedia   = $this->db->query("SELECT pulsa FROM tbl_ppob_nohp WHERE nomor = '$nomor' LIMIT 1")->row()->pulsa;
                $data       = $this->ajaxsearch_model->fetch_data_paket($penyedia);


		
                foreach($data->result() as $row){
                    $output .= '
                            <div class="col-lg-4 col-sm-6 nominal">
                                <a href="#" id="'.$row->id.'" onclick="scrollDown()">
                                    <div class="col-md-12 btn-ppob" id="ganti-class">
                                        <div class="box-body">
                                            <center><p>'.$row->nama.'</p></center>
                                            <br>
                                            <b><center><p>'.$this->rupiah($row->harga_jual).'</p></center></b>
                                        </div>
                                    </div>            
                                </a>
                            </div>
                            
                            <script> 
                                var id_pulsa = document.getElementById("'.$row->id.'");
                                id_pulsa.addEventListener("click", pulsa_click, false);

                                function pulsa_click()
                                {
                                    document.getElementById("id_produk").value = "'.$row->id.'";
                                    document.getElementById("keterangan").value = "'.$row->deskripsi.'";
                                    document.getElementById("harga_jual").value = "'.$row->harga_jual.'";
                                }
                            </script>
                          
                            ';
                }
                
                echo $output;
            }
        }		
	}

	function plntoken()
	{
		$output = '';
		$query = '';
		$this->load->model('ajaxsearch_model');
		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
        }
        $count  = strlen($query);
        if($count > 10){
            $data       = $this->ajaxsearch_model->fetch_plntoken('pln');
            foreach($data->result() as $row){
                $output .= '
                        <div class="col-lg-3 col-sm-6 nominal">
                            <a href="#" id="'.$row->id.'" onclick="scrollDown()">
                                <div class="col-md-12 btn-ppob" id="ganti-class">
                                    <div class="box-body">
                                        <center><p>'.$row->nama.'</p></center>
                                        <br>
                                        <b><center><p>'.$this->rupiah($row->harga_jual).'</p></center></b>
                                    </div>
                                </div>            
                            </a>
                        </div>
                        
                        <script> 
                            var id_pulsa = document.getElementById("'.$row->id.'");
                            id_pulsa.addEventListener("click", pulsa_click, false);

                            function pulsa_click()
                            {
                                document.getElementById("id_produk").value = "'.$row->id.'";
                                document.getElementById("harga").value = "'.$this->rupiah($row->harga_jual).'";
                            }
                        </script>
                      
                        ';
            }
            
            echo $output;
        }
	}
	
}
