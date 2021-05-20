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
                        <h2 class="box-title"><b><i class="fa fa-shopping-cart"></i> Pembelian Produk</b></h2>
                    </div><hr>
                    <div class="box-body">
                        <form class="form-horizontal" action="admin/pembelian/tambah" method="post">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Faktur</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="date" class="form-control" name="tgl_beli" value="<?= date('Y-m-d') ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Faktur</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" value="<?= $nopurchase ?>" name="nopurchase" id="nofaktur" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Operator</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" name="operator" id="operator" readonly="" value="<?= $nama_admin ?>">
                                        </div>
                                    </div>
                                    <div class="form-group has-error">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Stokis</label>
                                        <div class=" col-md-9 col-sm-9 col-xs-12">
                                            <select name="id_supplier" class="form-control select2" required style="width:100%;">
                                                <option value="" style="display:none;">Pilih Stokis</option>
                                                <?php foreach($supplier as $b) : ?>
                                                <option value="<?= $b->id ?>" <?php if($id_supplier == $b->id){ echo "selected"; } ?>><?= $b->jenis?>:<?= $b->nama?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div><hr>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group has-error">
                                        <input type="hidden" class="form-control" name="idbarangitembeli" id="idbarangitembeli" readonly="">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Barcode</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">                                            
                                            <input type="hidden" name="id_produk">
                                            <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Barcode Produk" autofocus required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Produk</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Qty</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="number" class="form-control" name="jumlah" id="qtybeli" value="1" min="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Satuan</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" name="harga" id="" placeholder="Harga Jual Satuan" onkeydown="return numbersonly(this, event);" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Grosir</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" name="harga_grosir" id="" placeholder="Harga Jual Grosir" onkeydown="return numbersonly(this, event);" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Beli</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" name="harga_beli" id="" placeholder="Harga beli (Satuan)" onkeydown="return numbersonly(this, event);" required>
                                            <p class="text-danger"><small><i><b>Note : </b>Harga beli sudah termasuk diskon dari Stokis.</i></small></p>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Diskon</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" name="diskon" id="qtybeli" onkeydown="return numbersonly(this, event);">
                                            <small><span><i><b>Note :</b> Diskon disini merupakan diskon keseluruhan dari pembelian. Jika diskon di nota adalah diskon per satuan, maka harap dijumlahkan secara keseluruhan.</i></span></small>
                                        </div>
                                    </div> -->
                                </div>
                            </div><hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button name="tambah_pembelian" class="btn btn-success pull-right"><i class="fa fa-shopping-cart"></i> Tambah Produk</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">                
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="box box-default"  style="padding:10px">
                            <div class="x_title">
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table id="example1" width="100%" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Barcode</th>
                                            <th>Nama Item</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual Satuan</th>
                                            <th>Harga Jual Grosir</th>
                                            <th>Qty</th>
                                            <th>Total Pembelian</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach ($this->cart->contents() as $a) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $a['barcode'] ?></td>
                                                <td><?= $a['name'] ?></td>
                                                <td><?= rupiah($a['price']) ?></td>
                                                <td><?= rupiah($a['harga_jual']) ?></td>
                                                <td><?= rupiah($a['harga_grosir']) ?></td>
                                                <td><?= $a['qty'] ?></td>
                                                <td><p id="harga"><?= rupiah($a['price']*$a['qty']) ?></p></td>
                                                <td>
                                                <a href="admin/pembelian/remove/<?= $a['rowid'] ?>" class="btn btn-danger" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr> 
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="box box-default">
                            <p class="text-danger" style="padding:10px;"><i><b>Note : </b>Data pembelian tidak dapat diubah kembali jika sudah disimpan.</i></p>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <div class="box box-default"  style="padding:10px">
                            <div class="x_title">
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <h1><b>TOTAL (Rp)</b></h1>
                                    </div>
                                    <div class="col-md-8 col-sm-12 col-xs-12">
                                        <input type="hidden" class="form-control" name="totalbeli" id="totalbeli">
                                        <h1 class="text-danger pull-right" id="grandtotalbeli"><b><?= rupiah($this->cart->total()); ?></b></h1>
                                    </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a href="admin/pembelian/auth" class="btn btn-warning pull-right"  onClick='return confirm("Apakah anda yakin, data pembelian tidak bisa diubah kembali ?")'><i class="fa fa-save"></i> Simpan Pembelian</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>   