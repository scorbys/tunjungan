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
                <h2 class="box-title"><b><i class="fa fa-image"></i> Produk Baru</b></h2>
            </div>
            <div class="box-body">
                <?php foreach($edit as $a) : ?>
                <form action="admin/promo/aksi_edit" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">                            
                            <label for="">Foto Promo (1280 * 720 pixel)</label><br>
                            <img src="img/<?= $a->foto ?>" alt="" height="150"><br><br>
                            <input type="file" name="foto">
                        </div>
                        <div class="form-group">
                            <label for="">Kode Promo (Jangan Pakai Spasi & Huruf Kapital)</label>
                            <input type="text" name="kd_promo" class="form-control" value="<?= $a->kd_promo ?>" placeholder="Kode Promo (Jangan Pakai Spasi & Huruf Kapital)" required>
                        </div>
                        <div class="form-group">
                            <label for="">Judul Promo</label>
                            <input type="hidden" name="id" value ="<?= $a->id ?>">
                            <input type="hidden" name="foto_lama" value ="<?= $a->foto ?>">
                            <input type="text" name="nama" class="form-control" value="<?= $a->nama ?>" placeholder="Judul Promo" required>
                        </div>
                        <div class="form-group">
                            <label for="">Urutan Slide</label>
                            <input type="text" name="no_urut" class="form-control" value="<?= $a->no_urut ?>" placeholder="Urutan Slide" required>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="0" <?php if($a->status == 0) { echo 'selected'; } ?>>Disable</option>
                                <option value="1" <?php if($a->status == 1) { echo 'selected'; } ?>>Enable</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
                            <a href="admin/promo" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
                        </div>
                    </div>
                </form>
                <?php endforeach ?>
            </div>
        </div>
    </section>
</div>  