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
                        <h2 class="box-title"><b><i class="fa fa-truck"></i> Data Retur Produk</b></h2>
                    </div>
                    <div class="col-lg-12">
                        <a href="admin/retur/tambah" class="btn btn-success pull-right"><i class="fa fa-plus-square"></i> Retur Produk Baru</a>
                    </div><hr>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="40">No</th>
                                    <th>No. Faktur</th>
                                    <th>Nama Petugas</th>
                                    <th>Tgl. Transaksi</th>
                                    <th>Kode Supplier</th>
                                    <th>Nama Supplier</th>
                                    <th width="70">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($retur as $a) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $a->kode_faktur ?></td>
                                    <td><?= $a->nama_admin ?></td>
                                    <td><?= $a->tgl_transaksi ?></td>
                                    <td><?= $a->kode ?></td>
                                    <td><?= $a->nama_supplier ?></td>
                                    <td>
                                        <a href="admin/retur/detail/<?= $a->id ?>" class="btn btn-info" title="Lihat Detail Retur"><i class="fa fa-info-circle"></i></a>
                                        <a href="admin/retur/cetak/<?= $a->id ?>" class="btn btn-danger" title="Cetak Retur" target="_blank"><i class="fa fa-print"></i></a>
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