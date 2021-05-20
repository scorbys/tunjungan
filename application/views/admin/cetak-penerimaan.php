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
    <body onload="window.print();">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header" style="margin-top:0px;">
                    <img src="img/logo.png" width="30"> KUD Tunjungan
                    <small class="pull-right"> <?= tanggal_indo(date('Y-m-d')) ?></small>
                </h2>
                <center><h4><b>PENERIMAAN PRODUK DARI SUPPLIER</b></h4></center>
            </div>
        </div>
        
        <p style="float:right;"><?= tanggal_indo(date('Y-m-d')).' '.date('H:i:s') ?></p>
        <p>Nama Kasir : <?= $this->db->query("SELECT * FROM tbl_admin WHERE id = '$kasir' LIMIT 1")->row()->nama; ?></p>
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="40">No</th>
                            <th>No. Faktur</th>
                            <th>Nama Petugas</th>
                            <th>Tgl. Transaksi</th>
                            <th>Nama Produk</th>
                            <th>Qty</th>
                            <th>Harga Beli</th>
                            <th>Nominal Pembelian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($penerimaan as $b) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $kode_pembelian ?></td>
                            <td><?= $b->nama_admin ?></td>
                            <td><?= tanggal_indo(substr($b->tgl,0,10)) ?></td>
                            <td><?= $b->nama_produk ?></td>
                            <td><?= $b->qty ?></td>
                            <td><?= rupiah($b->harga_beli) ?></td>
                            <td><?= rupiah($b->harga_beli*$b->qty) ?></td>
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