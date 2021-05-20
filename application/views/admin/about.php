<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?= $title ?><small> KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user"></i> <?= $title ?></a></li>
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
                <h2 class="box-title"><b><i class="fa fa-gear"></i> Tentang KUD Tunjungan</b></h2>
            </div>
            <div class="box-body">
                <?php foreach($about as $a) : ?>
                <form action="admin/about/edit" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Koperasi</label>
                                <input type="hidden" name="id_setting" value="<?= $a->id_setting ?>">
                                <input type="text" name="nama" class="form-control" value="<?= $a->nama ?>" placeholder="KUD Tunjungan">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email_support" class="form-control" value="<?= $a->email_support ?>" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">WA Koperasi</label>
                                <input type="text" name="wa" class="form-control" value="<?= $a->wa ?>" placeholder="WA Koperasi">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Kontak Koperasi</label>
                                <input type="text" name="kontak" class="form-control" value="<?= $a->kontak ?>" placeholder="Kontak Koperasi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alamat Koperasi</label>
                                <input type="text" name="alamat" class="form-control" value="<?= $a->alamat ?>" placeholder="Alamat Koperasi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Badan Hukum</label>
                                <textarea name="bdn_hukum" class="form-control" rows="4"><?= $a->bdn_hukum ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea name="keterangan" id="editor2" class="form-control" rows="5"><?= $a->keterangan ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Visi Koperasi</label>
                                <textarea name="visi" id="editor3" class="form-control" rows="5"><?= $a->visi ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Syarat</label>
                                <textarea name="syarat" id="editor4" class="form-control" rows="5"><?= $a->syarat ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Tentang Koperasi</label>
                                <textarea id="editor1" name="tentang" rows="10" cols="80"><?= $a->tentang ?></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success"><i class="fa fa-save"></i> Simpan data</button>
                            </div>
                        </div>
                    </div>
                </form>
                <?php endforeach ?>
            </div>
        </div>
    </section>
</div>