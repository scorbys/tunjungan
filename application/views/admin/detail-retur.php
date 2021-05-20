<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?= $title ?><small> KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-truck"></i> <?= $title ?></a></li>
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
                        <h2 class="box-title"><b><i class="fa fa-truck"></i> Retur Produk</b></h2>
                    </div>
                    <div class="box-body">
                        <?php foreach($retur as $b) : ?>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Tanggal Faktur</label>
                                    <input type="text" class="form-control" name="tgl_retur" value="<?= tanggal_indo(substr($b->tgl_transaksi,0,10)) ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Faktur</label>
                                    <input type="text" class="form-control" value="<?= $b->kode_faktur ?>" name="kode_faktur" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Operator</label>
                                    <input type="text" class="form-control" name="operator" id="operator" readonly value="<?= $b->nama_admin ?>">
                                </div>
                                <div class="form-group">
                                    <label>Supplier</label>
                                    <input type="text" class="form-control" value="<?= $b->nama_supplier ?>" readonly>
                                </div>
                            </div>
                        </div><hr>
                        <?php endforeach ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="admin/retur/cetak/<?= $b->id ?>" class="btn btn-success pull-right" target="_blank"><i class="fa fa-print"></i> Cetak Data Retur</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">                
                <div class="box">
                    <div class="box-header with-border">
                        <h2 class="box-title"><b><i class="fa fa-truck"></i> Data Retur Produk</b></h2>
                    </div>
                    <div class="box-body">
                        <table id="example1" width="100%" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Barcode</th>
                                    <th>Nama Item</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($detail as $a) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $a->barcode ?></td>
                                        <td><?= $a->nama ?></td>
                                        <td><?= $a->qty ?></td>
                                        <!-- <td>
                                            <a href="admin/retur/remove/<?= $a->id ?>" class="btn btn-danger" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                        </td> -->
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