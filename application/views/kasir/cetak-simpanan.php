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
    <title>Cetak Invoice</title>
    <style>
        body{
            font-family: sans-serif;
            font-size : 16px;
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

<body onload="window.print(); setTimeout(window.close, 0);">

    <center>
        <p>
            <strong>KUD Tunjungan</strong> <br>
            <small>Jl. jendral sudirman Kav 4 Bangkle Blora<br>Email : admin@tunjungan.com Telp : 081809434513</small>
        </p>
        ===================================================================================

    </center>
    
    <p style="float:right;"><small><?= tanggal_indo(date('Y-m-d')).' '.date('H:i:s') ?></small></p>
    <p><small>Nama Kasir : <?= $this->db->query("SELECT * FROM tbl_admin WHERE id = '$kasir' LIMIT 1")->row()->nama; ?></p>
    <table id="data" class="table" width="100%">
        <thead>
            <tr>
                <th>No. Anggota</th>
                <th>Nama Anggota</th>
                <th>Keterangan</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach($cetak as $a) : ?>
            <tr>
                <td><?= $a->no_anggota ?></td>
                <td><?= $a->nama_anggota ?></td>
                <td><?= $keterangan ?></td>
                <td><?= rupiah($a->nominal) ?></td>
            </tr>
            <?php endforeach ?>
            <tr>
                <td colspan="3" style="text-align:right;">Total</td>
                <td><?= rupiah($a->nominal) ?></td>
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