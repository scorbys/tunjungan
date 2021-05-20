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
            <a href="kasir/ppob/menu/<?= $a->kode ?>">
                <div class="col-md-1 col-sm-4 col-xs-6 menu-ppob">
                    <div class="box box-solid" style="box-shadow: none;">
                        <div class="box-body">
                            <center><img src="img/icon/<?= $a->foto ?>" alt="" width="40"></center><br>
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
                            <center><img src="img/icon/icon_lain.png" alt="" width="40"></center><br>
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
                        <h2 class="box-title"><b><i class="fa fa-wifi"></i> Bayar tagihan Internet & TV Kabel</b></h2>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <form action="kasir/ppob/aksi/pulsa" method="post">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Layanan TV Kabel</label>
                                        <select name="layanan" class="form-control select2" style="width:100%">
                                            <option value="1340">MNC Play</option>
                                            <option value="1247">Biznet Home</option>
                                            <option value="988">MyRepublic</option>
                                            <option value="243">First Media</option>
                                            <option value="125">Indihome</option>
                                            <option value="340">CBN</option>
                                            <option value="100">BigTv</option>
                                            <option value="120">MNC Vision</option>
                                            <option value="173">K-Vision</option>
                                            <option value="121">Transvision</option>
                                        </select>
                                    </div><hr>
                                    <div class="form-group">
                                        <label for="">Nomor Pelanggan TV Kabel <i class="fa fa-info-circle"></i></label>                                        
                                        <div class="input-group">
                                            <input type="text" name="no_telepon" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Nomor Pelanggan TV Kabel" required>

                                            <div class="input-group-addon">
                                                <img src="img/icon/indihome.png" alt="" height="20">
                                            </div>
                                        </div>
                                    </div><hr>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <b><h4 class="text-danger">Harga : <strong><?= rupiah(150000) ?></strong></h4></b>
                                            </div>
                                            <div class="col-lg-6">
                                                <button class="col-lg-4 btn btn-success pull-right"><b>Bayar</b></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                            <a href="kasir/ppob/menu/<?= $a->kode ?>">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="margin-bottom: 10px;">
                                    <center><img src="img/icon/<?= $b->foto ?>" alt="" width="50"></center><br>
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