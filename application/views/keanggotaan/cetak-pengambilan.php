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
    
    function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = penyebut($nilai - 10). " belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
        }     
        return $temp;
    }
    
    function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }     		
        return $hasil;
    }    

    function rupiah($angka){    
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
        <style>
            body{
                font-family: sans-serif;
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
                text-align: left;
                padding: 2px;
                line-height:20px;
                font-weight: 100;
            }
            
            tr:nth-child(even) {
                background-color: #ffffff;
            }
            h2{
                font-size: 23px;
                font-weight: 900;
            }
        </style>
    </head>
    <body onload="window.print();">
        <?php $no = 1; foreach($cetak as $a) : ?>
            <div>
                <h2>
                    <!-- <img src="<?= base_url('img/logo.png') ?>" width="40">  --><b><small>KUD Tunjungan</small></b>
                </h2>
                <table>
                    <tbody>
                        <tr><th width="150"><i>No.</i></th><th>: <?= $a->no_anggota ?></th></tr>
                        <tr><th width="150"><i>Sudah terima dari</i></th><th>: KUD Tunjungan</th></tr>
                        <tr><th width="150"><i>Uang sebanyak</i></th><th>: <?= ucwords(terbilang($a->nominal))." Rupiah"; ?></th></tr>
                        <tr><th width="150"><i>Untuk pembayaran</i></th><th>: Pengambilan Simpanan Sukarela <?= $a->nama.' / '.$a->kelurahan ?></th></tr><br>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td rowspan="2" style="vertical-align:bottom;"><h3><b><?= rupiah($a->nominal) ?></b></h3></td>
                            <td style="text-align:right;">Blora, <?= tanggal_indo(date('Y-m-d')) ?></td>
                        </tr>
                        <tr>
                            <td style="text-align:right;"><br><br><br><br> <?= $a->nama ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php endforeach ?>
    </body>
</html>