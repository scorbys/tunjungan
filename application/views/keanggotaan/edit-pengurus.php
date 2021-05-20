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
                <h2 class="box-title"><b><i class="fa fa-edit"></i> Edit Data Pengguna KUD Tunjungan</b></h2>
            </div>
            <div class="box-body">
                <?php foreach($edit as $a) : ?>
                <form action="keanggotaan/pengguna/aksi_edit" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Nama Pengurus</label>
                                <input type="text" name="nama" class="form-control" value="<?= $a->nama ?>" placeholder="Pengurus" required>
                                <input type="hidden" name="id" value="<?= $a->id ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control" value="<?= $a->username ?>" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Kata Sandi</label>
                                <input type="password" name="password" class="form-control" placeholder="Diisi jika ada perubahan data kata sandi akun" minlength="8" maxlength="15">
                            </div>
                            <div class="form-group">
                                <label for="">Nama Jabatan</label>
                                <select name="level" class="form-control" required>
                                    <option value="1" <?php if($a->level == 1){ echo 'selected'; } ?>>Admin KUD Tunjungan</option>
                                    <option value="2" <?php if($a->level == 2){ echo 'selected'; } ?>>Kasir KUD Tunjungan</option>
                                    <option value="3" <?php if($a->level == 3){ echo 'selected'; }else if($a->level != 3){ echo 'hidden';} ?>>Keanggotaan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
                                <a href="keanggotaan/pengguna" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
                <?php endforeach ?>
            </div>
        </div>
    </section>  
</div>