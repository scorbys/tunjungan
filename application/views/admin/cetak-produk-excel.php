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
                    <th>ID Produk</th>
                    <th>Barcode</th>
                    <th>Nama Produk</th>
                    <th>Harga Beli Satuan</th>
                    <th>Harga Jual Satuan</th>
                    <th>Harga Jual Grosir</th>
                    <th>Stok</th>
                    <th>Poin</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($cetak as $a) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $a->id ?></td>
                    <td><?= $a->barcode ?></td>
                    <td><?= $a->nama ?></td>
                    <td><?= $a->harga_beli ?></td>
                    <td><?= $a->harga ?></td>
                    <td><?= $a->harga_grosir ?></td>
                    <td><?= $a->stok ?></td>
                    <td><?= $a->poin ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </body>
</html>