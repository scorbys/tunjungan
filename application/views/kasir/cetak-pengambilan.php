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

    function rupiah2($angka){    
        $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
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
            font-family: 'PT Sans', sans-serif;
            font-size : 20px;
        }
        .container{
            padding: 5mm;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        td,
        th {
            border: 0px solid #949494;
            text-align: center;
            padding: 2px;
            font-weight: 100;
        }
        
        tr:nth-child(even) {
            background-color: #ffffff;
        }
    </style>
</head>

<body onload="window.print();">

    <center>
        <p>
                <strong>KUD Tunjungan</strong> <br>
                <small>Jl. jendral sudirman Kav 4 Bangkle Blora<br>Email : admin@tunjungan.com Telp : 081809434513</small>
        </p>
        ===================================================================================

    </center>
    
    <p style="float:right;"><small><?= tanggal_indo(date('Y-m-d')).' '.date('H:i:s') ?> <br><?php if($cetak->row()->status == 'Y'){ echo 'Belum Verifikasi'; }else{ echo 'Terverifikasi'; } ?></small></p>
    <p><small><?= $this->db->query("SELECT * FROM tbl_admin WHERE id = '$kasir' LIMIT 1")->row()->nama; ?> <br><?= $cetak->row()->kodeunik; ?> <br><?= $id_user.' a/n '.$nama ?></p>
    <table id="data" class="table" width="100%">
        <thead>
            <tr style="border-bottom: 1px solid black; line-height:20px">
                <th>Deskripsi</th>
                <th>Nominal</th>
                <th width="150">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach($cetak->result() as $a) : ?>
            <tr style="line-height:20px;">
                <td><?= $bayar ?></td>
                <td><?= rupiah($a->nominal) ?></td>
                <td style="text-align:left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= rupiah($a->nominal) ?></td>
            </tr>
            <?php endforeach ?>
            <tr style="line-height:20px;">
                <td colspan="2" style="text-align:right;">Total</td>
                <td style="text-align:left;"><?= rupiah2($a->nominal) ?></td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="2" style="text-align:right;"><b>Saldo Simp. Sukarela</b></td>
                <td style="text-align:left;"><?= rupiah2($this->db->query("SELECT nominal FROM v_total_sukarela WHERE id_user = '$id_user'")->row()->nominal); ?></td>
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