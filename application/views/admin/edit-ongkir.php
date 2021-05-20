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
                        <h2 class="box-title"><b><i class="fa fa-edit"></i> Edit <?= $title ?></b></h2>
                    </div>
                    <div class="box-body">
                        <?php foreach($edit as $a) : ?>
                        <form action="admin/ongkir/aksi_edit" method="post" enctype="multipart/form-data">                                
                            <div class="form-group">
                                <label for="">Nama Area</label>
                                <input type="text" name="nama" class="form-control" value="<?= $a->nama ?>" placeholder="Nama Area" required>
                                <input type="hidden" name="id" value="<?= $a->id ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Nominal Ongkir</label>
                                <input type="text" name="ongkir" onkeydown="return numbersonly(this, event);" value="<?= $a->ongkir ?>" onkeyup="javascript:tandaPemisahTitik(this);" class="form-control" placeholder="Nominal Ongkir" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
                                <a href="admin/ongkir" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
                            </div>
                        </form>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>  
</div>