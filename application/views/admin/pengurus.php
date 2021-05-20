<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= $title ?><small> KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> <?= $title ?></a></li>
            <?php if(!empty($menu )){ ?>
            <li><a href="#"> <?= $menu ?></a></li>
            <?php } ?>
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
        <div class="box box-default">
            <div class="box-header with-border">
                <center><p><?php  echo $this->session->flashdata('message'); ?></p></center>
                <h2 class="box-title"><b><i class="fa fa-plus-square"></i> Data Pengguna Sistem KUD Tunjungan</b></h2>
            </div>
            <div class="col-lg-10"></div>
            <div class="col-lg-2">
                <a href="admin/pengguna/tambah" class="btn btn-block btn-success pull-right"><i class="fa fa-plus-square"></i> Tambah Pengguna</a>
            </div><hr>
            <div class="box-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="40">No</th>
                            <th>Nama Pengurus</th>
                            <th>Jabatan</th>
                            <th>Username</th>
                            <th>Tgl. Update</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($pengurus as $a) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $a->nama ?></td>
                            <td>
                                <?php if($a->level == 1)
                                {
                                    echo 'Admin KOPRANESIA';
                                }
                                elseif($a->level == 2)
                                {
                                    echo 'Kasir KOPRANESIA';
                                }
                                else
                                {
                                    echo 'Keanggotaan';
                                } ?>
                            </td>
                            <td><?= $a->username ?></td>
                            <td><?= $a->tgl_update ?></td>
                            <td>
                                <a href="admin/pengguna/edit/<?= $a->id ?>" class="btn btn-success" title="Edit Data"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>  
</div>