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
                        <h2 class="box-title"><b><i class="fa fa-users"></i> Anggota</b></h2>
                    </div>
                    <div class="col-lg-10"></div>
                    <div class="col-lg-2">
                        <a href="admin/anggota/tambah" class="btn btn-block btn-success pull-right"><i class="fa fa-plus-square"></i> Tambah Anggota</a>
                    </div><hr>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="40">No</th>
                                    <th>No. Anggota</th>
                                    <th>NIK</th>
                                    <th>Nama Anggota</th>
                                    <th>Desa</th>
                                    <th>RT / RW</th>
                                    <th>Pekerjaan</th>
                                    <th>No. HP</th>
                                    <th>Status</th>
                                    <th>Tgl. Register</th>
                                    <th width="120">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($anggota as $a) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $a->no_anggota ?></td>
                                    <td><?= $a->ktp ?></td>
                                    <td><?= $a->nama ?></td>
                                    <td><?= $a->kelurahan ?></td>
                                    <td><?= $a->rt.' / '.$a->rw ?></td>
                                    <td><?= $a->pekerjaan ?></td>
                                    <td><?= $a->no_hp ?></td>
                                    <td>
                                        <?php if($a->status == 'Y'){
                                            echo 'Aktif';
                                        }else{
                                            echo 'TIdak Aktif';
                                        } ?>
                                    </td>
                                    <td><?= tanggal_indo(substr($a->tgl_registrasi,0,10)) ?></td>
                                    <td>
                                        <a href="admin/anggota/edit/<?= $a->id_user ?>" class="btn btn-success" title="Edit Data"><i class="fa fa-edit"></i></a>
                                        <a href="admin/anggota/hapus/<?= $a->id_user ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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