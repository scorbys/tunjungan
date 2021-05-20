<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?= $title ?><small> KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-image"></i> <?= $title ?></a></li>
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
                        <h2 class="box-title"><b><i class="fa fa-image"></i> Data Produk</b></h2>
                    </div>
                    <div class="col-lg-12 pull-right">
                        <a href="admin/produk/tambah" class="btn btn-success"><i class="fa fa-plus-square"></i> Tambah Produk</a>
                        <a href="admin/produk/export" class="btn btn-warning" target="_blank"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
                    </div><hr>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="40">No</th>
                                    <th>Foto Produk</th>
                                    <th>Barcode</th>
                                    <th>Nama Produk</th>
                                    <th>Harga Beli Satuan</th>
                                    <th>Harga Jual Satuan</th>
                                    <th>Harga Jual Grosir</th>
                                    <th>Stok</th>
                                    <th>Diskon</th>
                                    <th>Poin</th>
                                    <th width="60">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($produk as $a) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><img src="img/<?php if(!empty($a->foto)){ echo $a->foto;}else{ echo 'no-image.png'; } ?>" alt="<?= $a->nama ?>" height="150"></td>
                                    <td><?= $a->barcode ?></td>
                                    <td><?= $a->nama ?></td>
                                    <td><?= rupiah($a->harga_beli) ?></td>
                                    <td><?= rupiah($a->harga) ?></td>
                                    <td><?= rupiah($a->harga_grosir) ?></td>
                                    <td><?= $a->stok ?></td>
                                    <td><?= $a->diskon ?></td>
                                    <td><?= $a->poin ?></td>
                                    <td>
                                        <a href="admin/produk/edit/<?= $a->id ?>" class="btn btn-success" title="Edit Produk"><i class="fa fa-edit"></i></a>
                                        <!--<a href="admin/produk/hapus/<?= $a->id ?>" class="btn btn-danger" title="Hapus Produk" onClick='return confirm("Apakah anda yakin akan menghapus data ini ?")'><i class="fa fa-trash"></i></a>-->
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