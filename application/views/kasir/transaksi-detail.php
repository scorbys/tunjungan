<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Konfirmasi Pembayaran<small> KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-money"></i> Konfirmasi Pembayaran</a></li>
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
            <div class="col-md-12">                
                <div class="box">
                    <div class="box-header with-border">
                    </div>
                    <div class="box-body">
                        <form action="kasir/transaksi/baru" method="post">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Kode Pembayaran</label>
                                        <input type="text" name="kode" class="form-control" placeholder="Kode Pembayaran" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <button class="btn btn-success" name="tombolkode"><i class="fa fa-search"></i> Kode Pembayaran Ini Benar !</button>
                                        <a href="kasir/transaksi" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">              
                <div class="box">
                    <div class="box-header with-border">
                        <h2 class="page-header">
                            <i class="fa fa-globe"></i> KUD Tunjungan
                            <small class="pull-right">Tanggal Transaksi : <?= tanggal_indo(date('Y-m-d')) ?></small>
                        </h2>
                    </div>
                    <div class="box-body">
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>Admin.</strong><br>
                                    KUD Tunjungan<br>
                                    Jl. jendral sudirman Kav 4 Bangkle Blora<br>
                                    <i class="fa fa-phone"></i> : 081809434513<br>
                                    <i class="fa fa-envelope-o"></i> : admin@tunjungan.com
                                </address>
                            </div>
                            
                            <div class="col-sm-4 invoice-col">
                                To
                                <?php foreach($transaksi as $a) : ?>
                                <address>
                                    <strong><?= $a->nama ?></strong><br>
                                    <?= $a->kecamatan.' '.$a->kelurahan.' '.$a->rt.'/'.$a->rw ?><br>
                                    Blora, Jawa Tengah. ID<br>
                                </address>
                                <?php endforeach ?>
                            </div>
                            
                            <div class="col-sm-4 invoice-col">
                                <h3 class=" pull-right"><b>Kode Transaksi:</b> <?= $kodeunik ?></h3><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Diskon</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach($detail as $b) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $b->nama_produk ?></td>
                                            <td><?= $b->jumlah ?></td>
                                            <td><?= rupiah($b->harga_produk) ?></td>
                                            <td><?= rupiah(($b->diskon/ 100) * $b->harga_produk)?></td>
                                            <td><?= rupiah($b->harga) ?></td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5" style="text-align:right;">Total</th>
                                            <th><?= rupiah($total) ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row no-print">
                            <div class="col-xs-12">
                                <?php if($status == 'aktif'){ ?>
                                <a href="kasir/transaksi/konfirmasi/<?= $id ?>" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Konfirmasi Pembayaran</a>
                                <?php }elseif($status == 'selesai'){ ?>
                                <a href="kasir/transaksi/cetak/belanja/<?= $id ?>" class="btn btn-warning pull-right"><i class="fa fa-print"></i> Cetak Transaksi</a>
                                <?php }else{ ?>
                                <a href="kasir/transaksi/" class="btn btn-danger pull-right"><i class="fa fa-sign-out"></i> Kembali</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>