<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?= $title ?><small> KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-money"></i> <?= $title ?></a></li>
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
                        <h2 class="box-title"><b><i class="fa fa-money"></i> <?= $title ?></b></h2>
                    </div>
                    <!--<div class="col-lg-9"></div>
                    <div class="col-lg-3">
                        <a href="simpanan/tambah/pokok" class="btn btn-block btn-success pull-right"><i class="fa fa-plus-square"></i> Tambah Simpanan Pokok</a>
                    </div><hr>-->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="40">No</th>
                                    <th>No. Anggota</th>
                                    <th>Nama Anggota</th>
                                    <th>Nominal</th>
                                    <th>Tgl. Pembayaran</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($simpanan as $a) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $a->no_anggota ?></td>
                                    <td><?= $a->nama_anggota ?></td>
                                    <td><?= $a->nominal ?></td>
                                    <td><?= tanggal_indo($a->tgl) ?></td>
                                    <!-- <td>
                                        <a href="simpanan/edit/pokok/<?= $a->id_iuran ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                        <a href="simpanan/hapus/pokok/<?= $a->id_iuran ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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