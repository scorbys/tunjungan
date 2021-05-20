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
        <div class="box box-default">
            <center><p><?php  echo $this->session->flashdata('message'); ?></p></center>
            <div class="box-header with-border">
                <h2 class="box-title"><b><i class="fa fa-edit"></i> Edit Produk</b></h2>
            </div>
            <div class="box-body">
                <?php foreach($edit as $a) : ?>
                <form action="admin/kategori/aksi_edit" method="post" enctype="multipart/form-data">
                    <div class="row col-lg-6">
                     
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Foto Kategori</label><br>
                                <img src="img/<?= $a->foto ?>" alt="<?= $a->nama ?>" height="150" style="padding-bottom:10px;">
                                <input type="file" name="foto">
                                <input type="hidden" name="foto_lama" value="<?= $a->foto ?>">
                                <input type="hidden" name="id" value="<?= $a->id ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <input type="hidden" name="id" value="<?= $a->id ?>">
                                <input type="text" name="nama" class="form-control" value="<?= $a->nama ?>" placeholder="Katgori Produk" required>
                            </div>
                        </div> 
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="">No Urut</label> 
                                <input type="text" name="urut" class="form-control" value="<?= $a->no_urut ?>" placeholder="No Urut" required>
                            </div>
                        </div> 
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
                                <a href="admin/kategori" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
                <?php endforeach ?>
            </div>
        </div>
    </section>
</div>  