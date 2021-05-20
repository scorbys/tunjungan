  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <?= $title ?>
        <small>KUD Tunjungan</small>
      </h1>
      <ol class="breadcrumb">
            <li><p><i class="fa fa-money"></i> <?= $title ?></p></li>
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
                            <h4><strong>Saldo PPOB : <?= rupiah($saldo) ?></strong></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1"></div>
            <center>
            <?php foreach($ppob_limit as $a) : ?>
            <a href="<?= base_url() ?>kasir/ppob/menu/<?= $a->kode ?>">
                <div class="col-md-1 col-sm-4 col-xs-6 menu-ppob">
                    <div class="box box-solid" style="box-shadow: none;">
                        <div class="box-body">
                            <center><img src="<?= base_url() ?>img/icon/<?= $a->foto ?>" alt="" width="40"></center><br>
                            <center><p><?= $a->nama ?></p></center>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>            
            </a>
            <?php endforeach ?>
            <a href="#" data-toggle="modal" data-target="#modal-default">
                <div class="col-md-1 col-sm-4 col-xs-6 menu-ppob">
                    <div class="box box-solid" style="box-shadow: none;">
                        <div class="box-body">
                            <center><img src="<?= base_url() ?>img/icon/icon_lain.png" alt="" width="40"></center><br>
                            <center><p>Lainnya</p></center>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>            
            </a>
            </center>
        </div>
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <center><p><?php  echo $this->session->flashdata('message'); ?></p></center>
                        <h2 class="box-title"><b><i class="fa fa-bolt"></i> Beli Token atau Bayar Tagihan Listrik</b></h2>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                        <li class="active" id="nav-ppob"><a href="#token" data-toggle="tab">Token Listrik</a></li>
                                        <li id="nav-ppob"><a href="#tagihan" data-toggle="tab">Tagihan Listrik</a></li>
                                        <!-- <li id="nav-ppob"><a href="#non-taglis" data-toggle="tab">PLN Non-Taglis</a></li> -->
                                    </ul>
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="token">
                                            <form action="<?= base_url() ?>kasir/ppob/aksi/plntoken" method="post">
                                                <div class="form-group">
                                                    <label for="">No. Meter/ID Pel <i class="fa fa-info-circle"></i></label>                                        
                                                    <div class="input-group">
                                                        <input type="text" name="token" onkeypress="return hanyaAngka(event)" id="plntoken" class="form-control" placeholder="No. Meter/ID Pel" required>

                                                        <div class="input-group-addon">
                                                            <img src="<?= base_url() ?>img/icon/icon_pln.png" alt="" height="20">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div c;ass="form-group">
                                                    <label>Nama Agen Anggota</label>
                                                    <select name="id_agen" class="form-control select2" style="width:100%;">
                                                        <option value="" style="display:none;">Tanpa Agen PPOB</option>
                                                        <?php foreach($agen as $a){
                                                            echo '<option value="'.$a->id.'">'.$a->nama.'</option>';
                                                        } ?>
                                                    </select>
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <label for="">Nominal</label>
                                                    <div class="row">
                                                        <div class="lg-12" id="result" style="max-height: 275px; overflow-y:scroll; margin:5px;"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" name="id_produk" id="id_produk" placeholder="ID Produk" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <p class="ket-ppob text-muted well-sm no-shadow">
                                                        <span><b>Keterangan</b></span><br>
                                                        1. Produk Listrik PLN tidak tersedia pada jam <i>cut off/maintenance (23.00 - 01.00)</i>. <br>
                                                        2. Proses verifikasi transaksi maksimal 2x24 jam hari kerja. <br>
                                                        3. Harap cek limit kWh anda sebelum membeli token listrik
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <b><h4 class="text-danger">Harga : <strong><input type="text" name="harga" id="harga" value="<?= rupiah(0) ?>" style="border:none; background-color: white;" disabled="disabled" readonly></strong></h4></b>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <button class="col-lg-4 btn btn-success pull-right"><b>Lanjutkan Cek Data Pelanggan</b></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="tagihan">
                                            <form action="<?= base_url() ?>kasir/ppob/aksi/plnpasca" method="post">
                                                <div class="form-group">
                                                    <label for="">No. Meter/ID Pel <i class="fa fa-info-circle"></i></label>                                        
                                                    <div class="input-group">
                                                        <input type="text" name="id_pel" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="No. Meter/ID Pel" required>

                                                        <div class="input-group-addon">
                                                            <img src="<?= base_url() ?>img/icon/icon_pln.png" alt="" height="20">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div c;ass="form-group">
                                                    <label>Nama Agen Anggota</label>
                                                    <select name="id_agen" class="form-control select2" style="width:100%;">
                                                        <option value="" style="display:none;">Tanpa Agen PPOB</option>
                                                        <?php foreach($agen as $a){
                                                            echo '<option value="'.$a->id.'">'.$a->nama.'</option>';
                                                        } ?>
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <p class="ket-ppob text-muted well-sm no-shadow">
                                                        <span><b>Keterangan</b></span><br>
                                                        1. Produk Listrik PLN tidak tersedia pada jam <i>cut off/maintenance (22.00 - 05.00)</i>. <br>
                                                        2. Proses verifikasi transaksi maksimal 2x24 jam hari kerja. <br>
                                                        3. Harap cek limit kWh anda sebelum membeli token listrik
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <!-- <b><h4 class="text-danger">Harga : <strong><?= rupiah(150000) ?></strong></h4></b> -->
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <button class="col-lg-4 btn btn-success pull-right"><b>Lanjutkan Cek Data Pelanggan</b></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane" id="non-taglis">

                                        </div>
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"><center><b>Layanan Lainnya</b></center></h3>
            </div>
            <div class="modal-body">                
                <div class="row">
                    <div class="col-lg-12">
                        <center>
                            <?php foreach($ppob as $b) : ?>
                            <a href="<?= base_url() ?>kasir/ppob/menu/<?= $b->kode ?>">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="margin-bottom: 10px;">
                                    <center><img src="<?= base_url() ?>img/icon/<?= $b->foto ?>" alt="" width="50"></center><br>
                                    <center><p><?= $b->nama ?></p></center><hr>
                                </div>            
                            </a>
                            <?php endforeach ?>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>