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
                        <h2 class="box-title"><b><i class="fa fa-truck"></i> Data Stokis</b></h2>
                    </div>
                    <div class="col-lg-10"></div>
                    <div class="col-lg-2">
                        <a href="admin/supplier/tambah" class="btn btn-block btn-success pull-right"><i class="fa fa-plus-square"></i> Tambah Stokis</a>
                    </div><hr>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="40">No</th>
                                    <th>Kode Stokis</th>
                                    <th>Nama Stokis</th>
                                    <th>Alamat</th>
                                    <th>Kode Pos</th>
                                    <th>No. Telepon</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th width="120">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($supplier as $a) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $a->kode ?></td>
                                    <td><?= $a->nama ?></td>
                                    <td><?= $a->alamat ?></td>
                                    <td><?= $a->kode_pos ?></td>
                                    <td><?= $a->telp ?></td>
                                    <td><?= $a->email ?></td>
                                    <td>
                                        <?php if($a->status == 'aktif'){
                                            echo "<span class='label label-success'>Aktif</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Tidak Aktif</span>";
                                        } ?>
                                    </td>
                                    <td><?= $a->catatan ?></td>
                                    <td>
                                        <a href="admin/supplier/edit/<?= $a->id ?>" class="btn btn-success" title="Edit Data"><i class="fa fa-edit"></i></a>
                                        <a href="admin/supplier/hapus/<?= $a->id ?>" class="btn btn-danger" title="Hapus Data" onClick='return confirm("Apakah anda yakin akan menghapus data ini ?")'><i class="fa fa-trash"></i></a>
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