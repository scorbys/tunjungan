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
        <div class="box"> 
            <div class="box-body">
                <?php foreach($edit as $b) : ?>
                <form class="form-horizontal" method="post" action="admin/penerimaan/aksi_edit"> 
                    <div class="row"> 
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Pembelian</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="kode_pembelian" value="<?= $kode_pembelian ?>" id="kode_pembelian" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Operator</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="nama_admin" value="<?= $nama_admin ?>" id="kode_pembelian" readonly>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="idbarangitembeli" id="idbarangitembeli" readonly="">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Barcode</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">                                            
                                    <input type="hidden" name="id_produk" value="<?= $b->id_produk ?>">
                                    <input type="text" class="form-control" name="barcode" id="barcode" value="<?= $b->barcode ?>" placeholder="Barcode Produk" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Produk</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="<?= $b->nama_produk ?>" placeholder="Nama Produk" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Qty</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="number" class="form-control" name="jumlah" id="qtybeli" value="<?= $b->qty ?>" min="1">
                                    <input type="hidden" name="id" value="<?= $a ?>">
                                    <input type="hidden" name="id_pembelian" value="<?= $id_pembelian ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Beli</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="harga_beli" id="hargabeli" value="<?= $b->harga_beli ?>" placeholder="Harga beli" onkeydown="return numbersonly(this, event);" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Jual</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="harga" id="hargaitembeli" value="<?= $b->harga ?>" placeholder="Harga Jual" onkeydown="return numbersonly(this, event);" required>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                    <div class="row" style="padding:15px;">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button name="tambah_pembelian" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Edit Produk Diterima</button>
                                <a href="admin/penerimaan/detail/<?= $id_pembelian ?>" class="btn btn-danger"><i class="fa fa-mail-reply"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
                <?php endforeach ?>
            </div>
        </div>
    </section>
</div>