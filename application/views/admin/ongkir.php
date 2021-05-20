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
                        <a href="admin/ongkir/tambah" class="btn btn-block btn-success pull-right"><i class="fa fa-plus-square"></i> Ongkir Baru</a>
                    </div><hr>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="40">No</th>
                                    <th>Nama Area</th>
                                    <th>Harga Ongkir</th>
                                    <th width="120">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($ongkir as $a) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $a->nama ?></td>
                                    <td><?= rupiah($a->ongkir) ?></td>
                                    <td>
                                        <a href="admin/ongkir/edit/<?= $a->id ?>" class="btn btn-success" title="Edit Ongkir"><i class="fa fa-edit"></i></a>
                                        <a href="admin/ongkir/hapus/<?= $a->id ?>" class="btn btn-danger"  onClick='return confirm("Apakah anda yakin akan menghapus data ini ?")'><i class="fa fa-trash"></i></a>
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