<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?= $title ?><small> KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-truck"></i> <?= $title ?></a></li>
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
                        <h2 class="box-title"><b><i class="fa fa-truck"></i> Retur Produk</b></h2>
                    </div><hr>
                    <div class="box-body">
                        <form action="admin/retur/aksi_tambah" method="post">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Tanggal Faktur</label>
                                        <input type="date" class="form-control" name="tgl_retur" value="<?= date('Y-m-d') ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Faktur</label>
                                        <input type="text" class="form-control" value="<?= $kode_faktur ?>" name="kode_faktur" id="" >
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Operator</label>
                                        <input type="text" class="form-control" name="operator" id="operator" readonly="" value="<?= $nama_admin ?>">
                                    </div>
                                    <div class="form-group has-error">
                                        <label>Supplier</label>
                                        <select name="id_supplier" class="form-control select2" required style="width:100%;">
                                            <option value="" style="display:none;">Pilih Suppiler</option>
                                            <?php foreach($supplier as $b) : ?>
                                            <option value="<?= $b->id ?>" <?php if($id_supplier == $b->id){ echo "selected"; } ?>><?= $b->nama ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div><hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Barcode</label>
                                        <input type="hidden" name="id_produk">
                                        <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Barcode Produk" autofocus required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama Produk</label>
                                        <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Qty</label>
                                        <input type="number" class="form-control" name="qty" id="qtybeli" value="1" min="1">
                                    </div>
                                </div>
                            </div><hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group pull-right">
                                        <button name="tambah_pembelian" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Tambah Produk Retur</button>
                                        <a href="admin/retur" class="btn btn-danger"><i class="fa fa-mail-reply"></i> Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">                
                <div class="box">
                    <div class="box-header with-border">
                        <h2 class="box-title"><b><i class="fa fa-truck"></i> Data Retur Produk</b></h2><hr>
                        <a href="admin/retur/konfirmasi" class="btn btn-warning pull-right" onClick='return confirm("Apakah anda yakin akan menyimpan data retur ini ?")'><i class="fa fa-info-circle"></i> Simpan Retur</a>
                    </div>
                    <div class="box-body">
                        <table id="example1" width="100%" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Barcode</th>
                                    <th>Nama Item</th>
                                    <th>Qty</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($detail as $a) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $a->barcode ?></td>
                                        <td><?= $a->nama ?></td>
                                        <td><?= $a->qty ?></td>
                                        <td>
                                            <a href="admin/retur/remove/<?= $a->id ?>" class="btn btn-danger" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr> 
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>   