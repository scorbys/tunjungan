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
    <body onload="window.print();  setTimeout(window.close, 0);">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header" style="margin-top:0px;">
                    <img src="img/logo-koperasi.png" width="30"> KUD Tunjungan
                    <small class="pull-right"> <?= tanggal_indo(date('Y-m-d')) ?></small>
                </h2>
                <center><h4><b><?= $title ?></b></h4></center>
            </div>
        </div>
        
        <p>Periode &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= tanggal_indo($awal).' - '.tanggal_indo($akhir) ?></p>
        <p>Nama Agen : <?= $nama ?></p>
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="40">No</th>
                            <th>Waktu Transaksi</th>
                            <th>Nominal Transaksi</th>
                            <th>Bonus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $total = 0;
                        $total_untung = 0;
                        
                        if($cetak->num_rows()>0){
                            foreach($cetak->result() as $a) :
                            $total += $a->total;
                            $total_untung += 1000;
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $a->tgl_sukses ?></td>
                            <td><?= rupiah($a->total) ?></td>
                            <td><?= rupiah(1000) ?></td>
                        </tr>
                        <?php endforeach;
                        }else{
                            echo '<tr><td colspan="4"><center>Data transaksi tidak ditemukan.</center></td></tr>';
                        }?>
                        <tr>
                            <td colspan="2"><b>TOTAL</b></td>
                            <td><b><?= $total ?></b></td>
                            <td><b><?= $total_untung ?></b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>