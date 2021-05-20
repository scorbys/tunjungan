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
                <h2 class="box-title"><b><i class="fa fa-image"></i> Produk Detail Promo Baru</b></h2>
            </div>
            <div class="box-body">
                <form action="admin/promo/aksi_tambah_detail" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Barcode Produk</label>
                            <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode Produk" required>
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="hidden" name="id_produk">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Produk</label>
                            <input type="text" name="nama_produk" id="nama_produk" class="form-control" placeholder="Nama Produk" required>
                        </div>
                        <div class="form-group">
                            <label for="">Harga Promo</label>
                            <input type="text" name="harga_promo" onkeydown="return numbersonly(this, event);" class="form-control" placeholder="Jumlah Produk" required>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Produk</label>
                            <input type="number" name="jumlah" value="1" class="form-control" min="0" placeholder="Jumlah Produk" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
                            <a href="admin/promo" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>  