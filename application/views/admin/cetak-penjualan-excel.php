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
    
    header("Content-type: application/octet-stream");

    header("Content-Disposition: attachment; filename=$title.xls");
    
    header("Pragma: no-cache");
    
    header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="en">

    <head>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                     <th width="40">No</th>
                     <th>Nama Produk</th>
                     <th width="40">Qty</th>
                     <th>Bulan</th> 
                </tr>
            </thead>
            <tbody>
                                <?php $no = 1; foreach($cetak as $a) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $a->produk ?></td> 
                                    <td><?= $a->qty ?></td> 
                                    <td><?= $a->tanggal ?></td> 
                                </tr>
                                <?php endforeach ?>
            </tbody>
        </table>
    </body>
</html>