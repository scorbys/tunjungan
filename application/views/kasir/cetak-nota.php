<?php
    function tanggal_indo($tanggal){
        $aulan  = array (1 =>   'Jan',
                'Feb',
                'Mar',
                'Apr',
                'Mei',
                'Jun',
                'Jul',
                'Agu',
                'Sep',
                'Okt',
                'Nov',
                'Des'
                );
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $aulan[ (int)$split[1] ] . ' ' . $split[0];
    }

    function rupiah($angka){    
        $hasil_rupiah = number_format($angka,0,',','.');
        return $hasil_rupiah; 
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Invoice</title>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: sans-serif;
            font-size : 14px;
        }
        .container{
            padding: 5mm;
        }
        table {
            font-size: 16px;
            border-collapse: collapse;
            width: 100%;
        }
        
        td,
        th {
            border: 0px solid #949494;
            text-align: justify;
            padding: 2px;
            font-weight: 100;
        }
        
        tr:nth-child(even) {
            background-color: #ffffff;
        }
    </style>
</head>

<body onload="window.print();  setTimeout(window.close, 0);">

    <center>
        <h3>
            <strong>KUD Tunjungan</strong>
        </h3>
        <p>
            <small>Jl. jendral sudirman Kav 4 Bangkle Blora<br>Email : admin@tunjungan.com Telp : 081809434513</small>
        </p>
        ===================================================================================

    </center>
    
    <p style="float:right;"><?= date('y-m-d H:i:s') ?></p>
    <p>Nama Kasir : <?= $this->db->query("SELECT * FROM tbl_admin WHERE id = '$kasir' LIMIT 1")->row()->nama; ?></p>
    
    <table id="data" class="table" width="100%">
        <!--<thead>
            <tr>
                <th>Item</th>
                <th width="30">Jml</th>
                <th width="100">Harga</th>
                <th width="100" style="text-align:right;">Subtotal</th>
            </tr>
        </thead>-->
        <tbody>
            <?php $no = 1; foreach($detail as $c) : ?>
                <tr>
                    <td><?= $c->nama_produk ?><?php if($c->diskon > 0){ echo ' -'.$c->diskon.'%'; } ?></td>
                    <td><?= $c->jumlah ?></td>
                    <td><?= rupiah($c->harga) ?></td>
                    <td style="text-align:right;"><?= rupiah($c->harga*$c->jumlah) ?></td>
                </tr>
            <?php endforeach ?>
            <!--<tr style="border-top:1px solid black;">
                <td colspan="3" style="text-align:right;">PPN (1%) :</td>
                <td style="text-align:right;"><?= rupiah($total*0.01); ?></td>
            </tr>-->
            <tr>
                <td colspan="3" style="text-align:right;">Total :</td>
                <td style="text-align:right;"><?= rupiah($total); ?></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align:right;">Tunai :</td>
                <td style="text-align:right;"><?= rupiah($masuk); ?></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align:right;">Kembalian :</td>
                <td style="text-align:right;"><?= rupiah($kembalian); ?></td>
            </tr>
        </tbody>
    </table>
    
    <center>
        <p>
            <small>Terima kasih atas kepercayaan Anda kepada KUD Tunjungan <br> www.tunjungan.com</small>
        </p>
    </center>
</body>

</html>