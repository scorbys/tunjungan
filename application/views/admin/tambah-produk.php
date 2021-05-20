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
                <form action="admin/produk/aksi_tambah" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group has-error">
                                <label for="">Barcode Produk</label>
                                <input type="text" name="barcode" class="form-control" id="barcode" placeholder="Barcode Produk" autofocus required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Foto Produk</label>
                                <input type="file" name="foto" class="form-control" accept="image/x-png,image/jpeg">
                            </div>
                        </div>
                    <div class="row">
                    </div>
                        <div class="col-lg-6">
                            <div class="form-group has-error">
                                <label for="">Nama Produk</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama Produk" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group has-error">
                                <label for="">Deskripsi Singkat Produk</label>
                                <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi Singkat Produk" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Harga Beli Satuan</label>
                                <input type="text" name="harga_beli" class="form-control" id="inputku" onkeydown="return numbersonly(this, event);" value="0" onkeyup="javascript:tandaPemisahTitik(this);" placeholder="Harga Jual Satuan (Hanya Angka)" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Harga Jual Satuan</label>
                                <input type="text" name="harga" class="form-control" id="inputku" onkeydown="return numbersonly(this, event);" value="0" onkeyup="javascript:tandaPemisahTitik(this);" placeholder="Harga Jual Satuan (Hanya Angka)" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Kategori Produk</label>
                                <select name="id_kategori" class="form-control select2">
                                    <!--<option value="1" style="display:none;">Umum</option>-->
                                    <?php foreach($kategori as $b) : ?>
                                    <option value="<?= $b->id ?>"><?= $b->nama ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Stok Produk</label>
                                <input type="text" name="stok" class="form-control" onkeypress="return hanyaAngka(event)" placeholder="Stok Produk" value="0" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Harga Jual Grosir</label>
                                <input type="text" name="harga_grosir" class="form-control" id="inputku" onkeydown="return numbersonly(this, event);" value="0" onkeyup="javascript:tandaPemisahTitik(this);" placeholder="Harga Jual Grosir (Hanya Angka)" required>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="">Diskon Produk (%)</label>
                                <input type="text" name="diskon" class="form-control" onkeypress="return hanyaAngka(event)" placeholder="Diskon Produk" value="0">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="">Poin Produk</label>
                                <input type="text" name="poin" class="form-control" onkeypress="return hanyaAngka(event)" placeholder="Poin Produk" value="0">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="">Status Produk</label>
                                <select name="status" class="form-control" required>
                                    <option value="Y" selected>Tampil</option>
                                    <option value="N">Tidak Tampil</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Jenis Produk</label>
                                <select name="jenis" class="form-control" required>
                                    <option value="" style="display:none;"> - Pilih Jenis Produk - </option>
                                    <option value="aksesoris">Aksesoris</option>
                                    <option value="pokok" selected>Pokok</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Deskripsi Produk</label>
                                <textarea id="editor1" class="form-control" name="keterangan" rows="10" cols="80" required>-</textarea>
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
            </div>
        </div>
    </section>
</div>  