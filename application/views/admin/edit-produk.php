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
                <form action="admin/produk/aksi_edit" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Foto Produk</label><br>
                                <img src="img/<?= $a->foto ?>" alt="<?= $a->nama ?>" height="150" style="padding-bottom:10px;">
                                <input type="file" name="foto">
                                <input type="hidden" name="foto_lama" value="<?= $a->foto ?>">
                                <input type="hidden" name="id" value="<?= $a->id ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Barcode Produk</label>
                                <input type="text" name="barcode" class="form-control" value="<?= $a->barcode ?>" placeholder="Barcode Produk" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Nama Produk</label>
                                <input type="text" name="nama" class="form-control" value="<?= $a->nama ?>" placeholder="Nama Produk" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Kategori Produk</label>
                                <select name="id_kategori" class="form-control select2" required>
                                    <?php foreach($kategori as $b) : ?>
                                    <option value="<?= $b->id ?>" <?php if($a->id_kategori == $b->id){ echo 'selected'; } ?>><?= $b->nama ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Harga Beli Satuan</label>
                                <input type="text" name="harga_beli" class="form-control" id="inputku" onkeydown="return numbersonly(this, event);" value="<?= $a->harga_beli ?>" onkeyup="javascript:tandaPemisahTitik(this);" placeholder="Harga Beli Satuan (Hanya Angka)" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Harga Produk Satuan</label>
                                <input type="text" name="harga" class="form-control" id="inputku" onkeydown="return numbersonly(this, event);" value="<?= $a->harga ?>" placeholder="Harga Produk (Hanya Angka)" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Harga Produk Grosir</label>
                                <input type="text" name="harga_grosir" class="form-control" id="inputku" onkeydown="return numbersonly(this, event);" value="<?= $a->harga_grosir ?>" placeholder="Harga Produk (Hanya Angka)" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Stok Produk</label>
                                <input type="text" name="stok" class="form-control" onkeypress="return hanyaAngka(event)" value="<?= $a->stok ?>" placeholder="Stok Produk" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Diskon Produk (%)</label>
                                <input type="text" name="diskon" class="form-control" onkeypress="return hanyaAngka(event)" value="<?= $a->diskon ?>" placeholder="Diskon Produk" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Poin Produk</label>
                                <input type="text" name="poin" class="form-control" onkeypress="return hanyaAngka(event)" value="<?= $a->poin ?>" placeholder="Poin Produk" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Status Produk</label>
                                <select name="status" class="form-control" required>
                                    <option value="Y" <?php if($a->status == 'Y'){ echo 'selected'; } ?>>Tampil</option>
                                    <option value="N" <?php if($a->status == 'N'){ echo 'selected'; } ?>>Tidak Tampil</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Jenis Produk</label>
                                <select name="jenis" class="form-control" required>
                                    <option value="aksesoris" <?php if($a->jenis == 'aksesoris'){ echo 'selected'; } ?>>Aksesoris</option>
                                    <option value="pokok" <?php if($a->jenis == 'pokok'){ echo 'selected'; } ?>>Pokok</option>
                                    <option value="lainnya" <?php if($a->jenis == 'lainnya'){ echo 'selected'; } ?>>Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Deskripsi Produk</label>
                                <textarea id="editor1" class="form-control" name="keterangan" rows="10" cols="80" required><?= $a->keterangan ?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
                                <a href="admin/produk" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
                <?php endforeach ?>
            </div>
        </div>
    </section>
</div>  