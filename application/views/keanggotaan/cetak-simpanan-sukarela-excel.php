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
    
    <body onload="window.print();">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <img src="img/logo.png" width="30"> KUD Tunjungan
                    <small class="pull-right"> <?= tanggal_indo(date('Y-m-d')) ?></small>
                </h2>
                <center><h4><b>LAPORAN SIMPANAN SUKARELA ANGGOTA <br> PERIODE <?= tanggal_indo(date('Y-m-d')) ?></b></h4></center>
            </div>
        </div><br>
        
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="40">No</th>
                            <th>No. Anggota</th>
                            <th>Nama Anggota</th>
                            <th>Desa</th>
                            <th>RT / RW</th>
                            <th>Simpanan Sukarela</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($cetak as $a) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $a->no_anggota ?></td>
                            <td><?= $a->nama ?></td>
                            <td><?= $a->kelurahan ?></td>
                            <td><?= $a->rt.' / '.$a->rw ?></td>
                            <td><?= rupiah($a->total_sukarela) ?></td>
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