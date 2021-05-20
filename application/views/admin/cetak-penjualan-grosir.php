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
                font-family: sans-serif;
                font-size : 16px;
                font-weight : 200;
            }
            .row{
                line-height:20px;
            }
            h4{
                line-height:25px;
            }
            th{
                font-weight: 400;
            }
        </style>
    </head>
    <body onload="window.print();">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header" style="margin-top:0px;">
                    <img src="img/logo.png" width="40"> KUD Tunjungan
                    <small class="pull-right"><br> <?= tanggal_indo(date('Y-m-d')) ?></small>
                </h2>
                <center><h4><b>PENJUALAN GROSIR KUD Tunjungan</b></h4></center><hr>
            </div>
        </div>
        <?php foreach($transaksi as $a) : ?>
        <div class="row">
            <div class="col-lg-12">
                <table width="100%">
                    <tr style="line-height:20px;">
                        <th>
                            <label>Nama Operator</label><br>
                            <label>No. Anggota</label>
                        </th>
                        <th>
                            : <?= $a->nama_admin ?><br>
                            : <?= $a->no_anggota ?>
                        </th>
                        <th>
                            <label>Tgl. Retur</label><br>
                            <label>Nama Anggota</label>
                        </th>
                        <th>
                            : <?= tanggal_indo(substr($a->tgl_transaksi,0,10)) ?><br>
                            : <?= $a->nama_admin ?>
                        </th>
                    </tr>
                </table>
            </div>
        </div><br>
        <?php endforeach;?>
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                            <tr>
                                <th>#</th>
                                <th>Barcode</th>
                                <th>Nama Item</th>
                                <th>Harga Jual</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach($detail as $a) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $a->barcode ?></td>
                                <td><?= $a->nama_produk ?></td>
                                <td><?= rupiah($a->harga) ?></td>
                                <td><?= $a->jumlah ?></td>
                                <td><?= rupiah($a->harga*$a->jumlah) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                <p class="pull-right">Mengetahui, <br>  Blora, <?= tanggal_indo(date('Y-m-d')) ?><br><br><br><br>( Petugas )</p>
            </div>
        </div>
    </body>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="template/jquery-ui.js"></script>
        <script src="template/select2/dist/js/select2.full.min.js"></script>
        <script src="template/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
</html>