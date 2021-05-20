<?php
    function tanggal_indo($tanggal){
        $aulan  = array (1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
                );
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $aulan[ (int)$split[1] ] . ' ' . $split[0];
    }

    function rupiah($angka){    
        $hasil_rupiah = number_format($angka,0,',','.');
        return $hasil_rupiah; 
    }

    function rupiah2($angka){    
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah; 
    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cetak Data</title>
        <base href="<?= base_url() ?>"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="template/css/skins/skin-template.css">
        <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
        <style>
            body{
                font-family: 'PT Sans', sans-serif;
                font-size : 14px;
            }
            .container{
                padding: 5mm;
            }
            table {
                border-collapse: collapse;
                width: 100%;
            }
            
            td{
                border: 0px solid #949494;
                text-align: left;
                padding: 2px;
                font-weight: 100;
            }
            th {
                border: 0px solid #949494;
                text-align: center;
                padding: 2px;
                font-weight: 900;
            }
            
            tr:nth-child(even) {
                background-color: #ffffff;
            }
            h4{
                line-height:25px;
            }
        </style>
    </head>
    <body onload="window.print(); setTimeout(window.close, 0);">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <img src="img/logo.png" width="30"> KUD Tunjungan
                    <small class="pull-right"> <?= tanggal_indo(date('Y-m-d')) ?></small>
                </h2>
                <center><h4><b>LAPORAN RIWAYAT TRANSAKSI SIMPANAN SUKARELA ANGGOTA <br> PERIODE <?= tanggal_indo(date('Y-12-31')) ?></b></h4></center>
            </div>
        </div><br>
        
        <p style="float:right;"><?= tanggal_indo(date('Y-m-d')).' '.date('H:i:s') ?></p>
        <p>Nama Kasir : <?= $this->db->query("SELECT * FROM tbl_admin WHERE id = '$kasir' LIMIT 1")->row()->nama; ?></p>
        <hr>
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Anggota</th>
                            <th>Nama Anggota</th>
                            <th>Desa</th>
                            <th>RT / RW</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no_sukarela = 1; foreach($cetak as $a) : ?>
                        <tr>
                            <td><?= $no_sukarela++ ?></td>
                            <td><?= $a->no_anggota ?></td>
                            <td><?= $a->nama_anggota ?></td>
                            <td><?= $a->kelurahan ?></td>
                            <td><?= $a->rt.'/'.$a->rw ?></td>
                            <td><?= rupiah($a->nominal) ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="template/jquery-ui.js"></script>
        <script src="template/select2/dist/js/select2.full.min.js"></script>
        <script src="template/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
</html>