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
                <h2 class="box-title"><b><i class="fa fa-edit"></i> Edit Data Akun KUD Tunjungan</b></h2>
            </div>
            <div class="box-body">
                <?php foreach($akun as $a) : ?>
                <form action="<?= base_url('admin/akun/edit') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">                            
                                <label for="">Foto</label><br>
                                <img src="img/<?= $a->image ?>" alt="" class="img-circle" height="100" style="margin-bottom:10px;">
                                <input type="hidden" name="foto_lama" value="<?= $a->image ?>">
                                <input type="file" name="image">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="<?= $a->nama ?>" placeholder="Nama Admin" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?= $a->email ?>"  placeholder="alamatemail2020@domain.com">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" value="<?= $a->username ?>" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label>Kata Sandi</label>
                                <input type="password" name="password" class="form-control" placeholder="Diisi jika akan mengganti kata sandi" minlength="8">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
                                <a href="admin/pengguna" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
                <?php endforeach ?>
            </div>
        </div>
    </section>  
</div>