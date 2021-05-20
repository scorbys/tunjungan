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
                        <?php foreach($edit as $a) : ?>
                        <form class="form-horizontal" action="admin/pembelian" method="post">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Faktur</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="date" class="form-control" name="tgl_beli" value="<?= substr($a->tgl_transaksi,0,10) ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Faktur</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" value="<?= $a->kode_pembelian ?>" name="nopurchase" id="nofaktur" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Operator</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" name="operator" id="operator" readonly="" value="<?= $a->nama_admin ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Supplier</label>
                                        <div class=" col-md-9 col-sm-9 col-xs-12">
                                            <select name="id_supplier" class="form-control select2" required style="width:100%;">
                                                <option value="" style="display:none;">Pilih Suppiler</option>
                                                <?php foreach($supplier as $b) : ?>
                                                <option value="<?= $b->id ?>" <?php if($a->id_supplier == $b->id){ echo "selected"; } ?>><?= $b->nama ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div><hr>
                        </form>
                        <?php endforeach ?>
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
                                            <th>Qty</th>
                                            <th>Total Pembelian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach ($detail as $b) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $b->barcode ?></td>
                                                <td><?= $b->nama_produk ?></td>
                                                <td><?= rupiah($b->harga) ?></td>
                                                <td><?= $b->qty ?></td>
                                                <td><p id="harga"><?= rupiah($b->harga*$b->qty) ?></p></td>
                                            </tr> 
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7"></div>
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
                                        <h1 class="text-danger pull-right" id="grandtotalbeli"><b><?= rupiah($a->harga_total); ?></b></h1>
                                    </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a href="admin/pembelian" class="btn btn-danger pull-right"><i class="fa fa-mail-reply"></i> Kembali</a>
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