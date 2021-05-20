<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?= $title ?><small> KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> <?= $title ?></a></li>
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
                        <h2 class="box-title"><b><i class="fa fa-shopping-cart"></i> <?= $title ?></b></h2>
                    </div>
                    <div class="col-lg-12">
                        <a href="admin/penerimaan/tambah/<?= $a ?>" class="btn btn-success"><i class="fa fa-plus-square"></i> <small>Penerimaan Produk Baru <?= $kode_pembelian ?></small></a>
                        <a href="admin/penerimaan/cetak/<?= $a ?>" class="btn btn-warning" target="_blank" rel="noopener noreferrer"><i class="fa fa-print"></i> Cetak Penerimaan</a>
                        <a href="admin/pembelian" class="btn btn-danger"><i class="fa fa-mail-reply"></i> Kembali</a>
                    </div><hr>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="40">No</th>
                                    <th>No. Faktur</th>
                                    <th>Nama Petugas</th>
                                    <th>Tgl. Transaksi</th>
                                    <th>Nama Produk</th>
                                    <th>Qty</th>
                                    <th>Harga Beli</th>
                                    <th>Nominal Pembelian</th>
                                    <th width="120">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($penerimaan as $b) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $kode_pembelian ?></td>
                                    <td><?= $b->nama_admin ?></td>
                                    <td><?= tanggal_indo(substr($b->tgl,0,10)) ?></td>
                                    <td><?= $b->nama_produk ?></td>
                                    <td><?= $b->qty ?></td>
                                    <td><?= rupiah($b->harga_beli) ?></td>
                                    <td><?= rupiah($b->harga_beli*$b->qty) ?></td>
                                    <td>
                                        <a href="admin/penerimaan/edit/<?= $b->id ?>" class="btn btn-success" title="Edit Penerimaan"><i class="fa fa-edit"></i></a>
                                        <!-- <a href="admin/penerimaan/hapus/<?= $b->id ?>" class="btn btn-danger"  onClick='return confirm("Apakah anda yakin akan menghapus produk ini ?")'><i class="fa fa-trash"></i></a> -->
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