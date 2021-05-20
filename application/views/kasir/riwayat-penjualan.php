<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?= $title ?><small> KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-history"></i> Data Riwayat Transaksi Kasir</a></li>
        </ol>
    </section>
    <section class="content">    
        <div class="row">
            <div class='col-md-12'>
                <div class='panel panel-white' id="header">
                    <div class='panel-heading clearfix'>
                        <div class='col-md-10'>
                            <h4 id="warna">Selamat datang di <b>KUD Tunjungan</b></h4>
                        </div>
                        <div id="tgl-login">
                            <h4><strong><?= tanggal_indo(date('Y-m-d')) ?></strong></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <center><p><?php  echo $this->session->flashdata('message'); ?></p></center>
            </div>
            <div class="col-md-12">                
                <div class="box">
                    <div class="box-header with-border">
                        <h2 class="box-title"><b><i class="fa fa-history"></i> Data Riwayat Transaksi Kasir</b></h2>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="40">No</th>
                                    <th>No. Anggota</th>
                                    <th>Total Transaksi</th>
                                    <th>Uang Pembayaran</th>
                                    <th>Uang Kembali</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Tgl. Transaksi</th>
                                    <th>Status Transaksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($riwayat as $a) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $a->no_anggota ?></td>
                                    <td><?= rupiah($a->harga_total) ?></td>
                                    <td><?= rupiah($a->uang_masuk) ?></td>
                                    <td><?= rupiah($a->uang_kembali) ?></td>
                                    <td><?= $a->nama_pembayaran ?></td>
                                    <td><?= $a->tgl_transaksi ?></td>
                                    <td><?= $a->status_trx ?></td>
                                    <td>
                                        <a href="kasir/penjualan/cetak/<?= $a->id ?>" target="_blank" class="btn btn-danger" rel="noopener noreferrer"><i class="fa fa-print"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>  
</div>