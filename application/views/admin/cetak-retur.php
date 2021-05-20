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
                font-size : 14px;
                font-weight : 400;
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
                    <img src="img/logo.png" width="40"> KUD Tunjungan
                    <small class="pull-right"><br> <?= tanggal_indo(date('Y-m-d')) ?></small>
                </h2>
                <center><h4><b>RETUR PRODUK KUD Tunjungan</b></h4></center>
            </div>
        </div>
        <?php foreach($retur as $a) : ?>
        <div class="row">
            <div class="col-lg-12">
                <table width="100%">
                    <tr style="line-height:20px;">
                        <th>
                            <label>No. Faktur</label><br>
                            <label>Nama Operator</label>
                        </th>
                        <th>
                            : <?= $a->kode_faktur ?><br>
                            : <?= $a->nama_admin ?>
                        </th>
                        <th>
                            <label>Tgl. Retur</label><br>
                            <label>Nama Stokis</label>
                        </th>
                        <th>
                            : <?= tanggal_indo(substr($a->tgl_transaksi,0,10)) ?><br>
                            : <?= $a->nama_supplier ?>
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
                            <th>Qty</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($detail as $b) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $b->barcode ?></td>
                                <td><?= $b->nama ?></td>
                                <td><?= $b->qty ?></td>
                            </tr> 
                        <?php endforeach ?>
                    </tbody>
                </table>

                <p class="pull-right">Mengetahui, <br>  Blora, <?= tanggal_indo(date('Y-m-d')) ?><br><br><br><br>(Manager)</p>
            </div>
        </div>
    </body>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="template/jquery-ui.js"></script>
        <script src="template/select2/dist/js/select2.full.min.js"></script>
        <script src="template/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
</html>