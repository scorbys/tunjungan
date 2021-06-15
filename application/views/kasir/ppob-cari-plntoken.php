<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <?= $title ?>
        <small>KUD Tunjungan</small>
      </h1>
      <ol class="breadcrumb">
            <li><p><i class="fa fa-money"></i> <?= $title ?></p></li>
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
                        <h4>
                                <strong>Saldo PPOB : <?= rupiah($saldo) ?></strong>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1"></div>
            <center>
            <?php foreach($ppob_limit as $a) : ?>
            <a href="<?= base_url() ?>kasir/ppob/menu/<?= $a->kode ?>">
                <div class="col-md-1 col-sm-4 col-xs-6 menu-ppob">
                    <div class="box box-solid" style="box-shadow: none;">
                        <div class="box-body">
                            <center><img src="<?= base_url() ?>img/icon/<?= $a->foto ?>" alt="" width="40"></center><br>
                            <center><p><?= $a->nama ?></p></center>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>            
            </a>
            <?php endforeach ?>
            <a href="#" data-toggle="modal" data-target="#modal-default">
                <div class="col-md-1 col-sm-4 col-xs-6 menu-ppob">
                    <div class="box box-solid" style="box-shadow: none;">
                        <div class="box-body">
                            <center><img src="<?= base_url() ?>img/icon/icon_lain.png" alt="" width="40"></center><br>
                            <center><p>Lainnya</p></center>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>            
            </a>
            </center>
        </div>
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <center><p><?php  echo $this->session->flashdata('message'); ?></p></center>
                        <h2 class="box-title"><b><i class="fa fa-mobile-phone"></i> Invoice Pembelian Paket Data</b></h2>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="pad margin no-print">
                                <div class="callout callout-danger" style="margin-bottom: 0!important;">
                                    <h4><i class="fa fa-info"></i> Note:</h4>
                                    Halaman ini adalah detail transaksi yang akan dilakukan sebelum pembayaran, silahkan <b>informasikan data yang tertera kepada pelanggan</b>, apakah data tersebut sudah benar.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <section class="invoice">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h2 class="page-header">
                                            <i class="fa fa-globe"></i> <b>KUD Tunjungan</b>
                                            <small class="pull-right">Tanggal : <?= tanggal_indo(date('Y-m-d')); ?></small>
                                        </h2>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-xs-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No. Meteran</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Tegangan</th>
                                                <th>Kode Produk</th>
                                                <th>Pokok</th>
                                                <th>Admin</th>
                                                <th>Denda</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?= $id_pel ?></td>
                                                <td><?= $nama ?></td>
                                                <td><?= $power ?></td>
                                                <td><?= $denom ?></td>
                                                <td><?= rupiah($pokok) ?></td>
                                                <td><?= rupiah($admin) ?></td>
                                                <td><?= rupiah($denda) ?></td>
                                                <td><?= rupiah($total) ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="7"></td>
                                                <td>
                                                    <a href="<?= base_url() ?>kasir/ppob/pln/token/<?= $id_pel.'/'.$denom.'/'.$id_agen ?>" class="btn btn-warning btn-block pull-right"><i class="fa fa-arrow-circle-right"></i> Lanjutkan Transaki</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"><center><b>Layanan Lainnya</b></center></h3>
            </div>
            <div class="modal-body">                
                <div class="row">
                    <div class="col-lg-12">
                        <center>
                            <?php foreach($ppob as $b) : ?>
                            <a href="<?= base_url() ?>kasir/ppob/menu/<?= $a->kode ?>">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="margin-bottom: 10px;">
                                    <center><img src="<?= base_url() ?>img/icon/<?= $b->foto ?>" alt="" width="50"></center><br>
                                    <center><p><?= $b->nama ?></p></center><hr>
                                </div>            
                            </a>
                            <?php endforeach ?>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>