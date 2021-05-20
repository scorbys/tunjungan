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
            <div class="col-lg-10">
                <center><p><?php  echo $this->session->flashdata('message'); ?></p></center>
                <div class="user-block">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="img/icon/icon_bus_02.png" class="img-circle" alt="Icon Kereta" style="box-shadow: 0 0 5px #2727273d;">
                            <span class="username">
                                <a><b>Terminal Cepu → Terminal Pulo Gadung</b></a>
                            </span>
                            <span class="description">Min, 14 Jan 2021 | 1 Dewasa</span>
                        </div>
                        <div class="col-lg-6">
                            <a href="#" data-toggle="modal" data-target="#modal-default" class="pull-right btn btn-success">Ubah Pencarian</a>
                        </div>
                    </div>
                </div><hr>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-lg-6">
                                <h4><b>Filter</b></h4>
                            </div>
                            <div class="col-lg-6">
                                <a href="kasir/ppob/aksi/kereta" class="text-success pull-right" onClick="reload"><h4><b>RESET</b></h3></a>
                            </div>
                        </div>
                        <div class="box box-success box-train">
                            <div class="box-header with-border">
                                <h3 class="box-title"><b><i class="fa fa-tags"></i> Kelas</b></h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                            Ekonomi
                                        </div>
                                        <div class="col-lg-2 icheck">
                                            <label>
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </div><br>
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                            Eksekutif
                                        </div>
                                        <div class="col-lg-2 icheck">
                                            <label>
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </div><br>
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                            Travel
                                        </div>
                                        <div class="col-lg-2 icheck">
                                            <label>
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer"></div>
                            <div class="box-header with-border">
                                <h3 class="box-title"><b><i class="fa fa-clock-o"></i> Waktu Keberangkatan</b></h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                            Pagi (00:00 - 12:00)
                                        </div>
                                        <div class="col-lg-2 icheck">
                                            <label>
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </div><br>
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                            Siang (12:00 - 18:00)
                                        </div>
                                        <div class="col-lg-2 icheck">
                                            <label>
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </div><br>
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                            Malam (18:00 - 24.00)
                                        </div>
                                        <div class="col-lg-2 icheck">
                                            <label>
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </div><br>
                                </div>
                            </div>
                            <div class="box-footer"></div>
                            <div class="box-header with-border">
                                <h3 class="box-title"><b><i class="fa fa-train"></i> Nama Bus / Travel</b></h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                            Sinar Jaya
                                        </div>
                                        <div class="col-lg-2 icheck">
                                            <label>
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </div><br>
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                            Qyta Trans
                                        </div>
                                        <div class="col-lg-2 icheck">
                                            <label>
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </div><br>
                                </div>
                            </div>
                            <div class="box-footer"></div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <form action="" class="form-horizontal" method="post">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h4><b>Pilih tiket berangkat</b><span>(8 hasil)</span></h4>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="urutan" class="col-sm-4 control-label">Urutkan dari</label>
                                        <div class="col-sm-8">
                                            <select name="urutan" id="urutan" class="form-control input-sm select2" style="width:100%;" >
                                                <option value="">Harga Terendah</option>
                                                <option value="" selected>Waktu Keberangkatan Terawal</option>
                                                <option value="">Waktu Keberangkatan Terakhir</option>
                                                <option value="">Perjalanan Tercepat</option>
                                                <option value="">Perjalanan Terlama</option>
                                                <option value="">Tiba Terawal</option>
                                                <option value="">Tiba Terakhir</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php for ($i=1; $i < 9; $i++) { ?>
                        <div class="box box-success box-train">
                            <div class="box-header with-border">
                                <h3 class="box-title"><b>Sinar Jaya</b> <span>Ekonomi (Eko)</span></h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <h4><b>22:26</b></h4>
                                                <p>Cepu  <br> (T. Cepu)</p>
                                            </div>
                                            <div class="col-lg-2 hidden-xs">
                                                <img src="img/icon/jurusan_bus.png" alt="" width="90" style="margin-top: 25px; margin-left:-65px;">
                                            </div>
                                            <div class="col-lg-5">
                                                <h4><b>03:45</b></h4>
                                                <p>Pulo Gadung  <br> (T. Pulo Gadung)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <center><h4>8j 0m</h4></center>
                                    </div>
                                    <div class="col-lg-3">
                                        <center><h4>Rp115.000/orang</h4></center>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="kasir/ppob/pesan/bus" class="pull-right btn btn-block btn-success">Pilih</a><br><br>
                                        <p class="text-danger">Sisa 33 kursi</p>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>  
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog" style="width:65%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="kasir/ppob/aksi/bus" method="post">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Asal</label>
                                        <select name="asal" class="form-control select2" style="width:100%;">
                                            <option value="" style="display:none;">- Asal -</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-1 hidden-xs">
                                    <img src="img/icon/icon_jurusan_kai.png" alt="" width="30" style="margin-top: 25px; margin-left:-5px;">
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label for="">Tujuan</label>
                                        <select name="tujuan" class="form-control select2" style="width:100%;" >
                                            <option value="" style="display:none;">- Tujuan -</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Berangkat</label>
                                <input type="text" name="berangkat" class="form-control" id="from" value="<?= date('m/d/Y') ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Jumlah Penumpang</label>
                                <div class="popover-markup"> 
                                    <div class="trigger form-group form-group-icon-left">
                                        <input type="text" name="passanger-info" id="passanger-info" class="form-control" value="Dewasa 1">
                                        <input type="hidden" name="passengers" id="passengers" class="form-control" value="1" disabled>
                                    </div>
                                    <div class="content hide">
                                        <div class="form-group">
                                            <label class="control-label col-md-6"><img src="img/icon/icon_dewasa.png" alt="" width="15"> <strong>Dewasa</strong></label>
                                            <div class="input-group number-spinner col-md-6">
                                                <span class="input-group-btn">
                                                    <a class="btn btn-success" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></a>
                                                </span>
                                                <input type="text" disabled name="adult" id="adult" class="form-control text-center" value="1" max=9 min=1>
                                                <span class="input-group-btn">
                                                    <a class="btn btn-warning" data-dir="up"><span class="glyphicon glyphicon-plus"></span></a>
                                                </span>
                                            </div>
                                        </div><hr>
                                            <a class="btn btn-success btn-block demise">Simpan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-lg-9"></div>
                            <div class="col-lg-3">
                                <button class="btn btn-success btn-block"><b>Cari Tiket</b></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>