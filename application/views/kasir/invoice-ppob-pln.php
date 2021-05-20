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
                            <h4><strong>Saldo PPOB : <?= rupiah($saldo) ?></strong></h4>
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
                        <h2 class="box-title"><b><i class="fa fa-mobile-phone"></i> Invoice Pembelian PLN - Token Listrik</b></h2>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="pad margin no-print">
                                <div class="callout callout-warning" style="margin-bottom: 0!important;">
                                    <h4><i class="fa fa-info"></i> Note:</h4>
                                    Halaman ini adalah detail transaksi yang sudah dilakukan, silahkan cetak data transaksi ini sebagai <b>bukti transaksi</b> kepada konsumen.
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
                                                <th>Nama Produk</th>
                                                <th>ID Pelanggan</th>
                                                <th>Deskripsi</th>
                                                <th>Harga</th>
                                                <th>Serial Number (SN)</th>
                                                <th>Kode Token</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($transaksi as $c) : ?>
                                            <tr>
                                                <td><?= $this->db->query("SELECT * FROM tbl_produk_agratek WHERE code_produk = '$c->denom' LIMIT 1")->row()->penyedia.' - '.$c->denom; ?></td>
                                                <td><?= $c->id_pel; ?></td>
                                                <td>Pembelian token listrik <?= $this->db->query("SELECT * FROM tbl_produk_agratek WHERE code_produk = '$c->denom' LIMIT 1")->row()->penyedia.' - '.$c->denom; ?> </td>
                                                <td><?= rupiah($c->harga_jual) ?></td>
                                                <td><?= $c->serial_number ?></td>
                                                <td><b><?= substr($c->serial_number,0,24) ?></b></td>
                                                <td>
                                                    <?php if($c->status == 'SUCCESS'){
                                                        echo '<span class="label label-success">Sukses</span>';
                                                    }else if($c->status == 'PENDING'){
                                                        echo '<span class="label label-warning">Dalam Proses</span>';
                                                    }else{
                                                        echo '<span class="label label-danger">Transaksi Gagal</span>';
                                                    } ?>
                                                </td>
                                                <td>
                                                    <?php if($c->status != 'SUCCESS'){
                                                        echo '<a href="kasir/ppob/cek/token/'.$c->invoice_no.'" class="btn btn-danger btn-block"><i class="fa fa-refresh"></i> Update Status</a>';
                                                    } ?>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                            <tr>
                                                <td colspan="7"></td>
                                                <td>
                                                    <a href="kasir/ppob/cetak/token/<?= $id ?>" class="btn btn-success btn-block pull-right" target="_blank"><i class="fa fa-print"></i> Cetak Transaki</a>
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
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 style="margin-bottom: 10px;">
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