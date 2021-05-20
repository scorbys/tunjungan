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
                    <div class="col-lg-10"></div>
                    <div class="col-lg-2">
                        <a href="admin/pembelian/tambah" class="btn btn-block btn-success pull-right"><i class="fa fa-plus-square"></i> Pembelian Produk Baru</a>
                    </div><hr>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="40">No</th>
                                    <th>No. Faktur</th>
                                    <th>Nama Petugas</th>
                                    <th>Tgl. Transaksi</th>
                                    <th>Nominal Pembelian</th>
                                    <th>Nama Supplier</th>
                                    <th width="120">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($pembelian as $a) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $a->kode_pembelian ?></td>
                                    <td><?= $a->nama_admin ?></td>
                                    <td><?= tanggal_indo(substr($a->tgl_transaksi,0,10)) ?></td>
                                    <td><?= rupiah($a->harga_total) ?></td>
                                    <td><?= $a->nama_supplier ?></td>
                                    <td>
                                        <a href="admin/pembelian/detail/<?= $a->id ?>" class="btn btn-success" title="Data Detail Pembelian"><i class="fa fa-list-ol"></i></a>
                                        <a href="admin/penerimaan/detail/<?= $a->id ?>" class="btn btn-warning" title="Data Penerimaan Produk"><i class="fa fa-truck"></i></a>
                                        <!-- <a href="admin/pembelian/hapus/<?= $a->id ?>" class="btn btn-danger"  onClick='return confirm("Apakah anda yakin akan menghapus produk ini ?")'><i class="fa fa-trash"></i></a> -->
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