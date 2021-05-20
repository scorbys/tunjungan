<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Transaksi Simpanan Anggota
            <small>KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-money"></i> Data Transaksi Simpanan Anggota</a></li>
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
                        <h4><strong><?= tanggal_indo(date("Y-m-d")) ?></strong></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box box-default">
        <div class="box-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs ">
                    <li class="active"><a href="#sukarela" data-toggle="tab">Simpanan Sukarela</a></li>
                    <li><a href="#wajib" data-toggle="tab">Simpanan Wajib</a></li>
                    <li><a href="#pokok" data-toggle="tab">Simpanan Pokok</a></li>
                </ul>
                <div class="tab-content">
            
                    <div class="tab-pane" id="pokok">
                        <h4 class="box-title"><b><i class="fa fa-money"></i> Simpanan pokok</b></h4><hr>
                        <div class="row">
                            <div class="col-lg-2 col-xs-6">
                                <div class="form-group">
                                    <a href="keanggotaan/transaksi/cetak/pokok" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-danger"><i class="fa fa-print"></i> <small>Cetak Data</small></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-xs-6">
                                <div class="form-group">
                                    <a href="keanggotaan/transaksi/export" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-success"><i class="fa fa-file-excel-o"></i> <small>Export Excel</small></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-xs-6">
                                <div class="form-group">
                                    <a href="keanggotaan/transaksi/baru" class="btn btn-block btn-warning"><i class="fa fa-plus-square"></i> <small>Transaksi Baru</small></a>
                                    <!-- <button type="button" class="btn btn-block btn-warning" data-toggle="modal" data-target="#modal-default" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus-square"></i> <small>Transaksi</small></button> -->
                                </div>
                            </div>
                        </div>
                        <table id="example3" class="display compact" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Anggota</th>
                                    <th>Nama Anggota</th>
                                    <th>Desa</th>
                                    <th>RT / RW</th>
                                    <th>Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no_pokok = 1; foreach($pokok as $c) : ?>
                                <tr>
                                    <td><?= $no_pokok++ ?></td>
                                    <td><?= $c->no_anggota ?></td>
                                    <td><?= $c->nama ?></td>
                                    <td><?= $c->kelurahan ?></td>
                                    <td><?= $c->rt.'/'.$c->rw ?></td>
                                    <td><?= rupiah($c->total_pokok) ?></td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane" id="wajib">
                        <h4 class="box-title"><b><i class="fa fa-money"></i> Simpanan Wajib</b></h4><hr>
                        <div class="row">
                            <div class="col-lg-2 col-xs-6">
                                <div class="form-group">
                                    <a href="keanggotaan/transaksi/cetak/wajib" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-danger"><i class="fa fa-print"></i> <small>Cetak Data</small></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-xs-6">
                                <div class="form-group">
                                    <a href="keanggotaan/transaksi/export" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-success"><i class="fa fa-file-excel-o"></i> <small>Export Excel</small></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-xs-6">
                                <div class="form-group">
                                    <a href="keanggotaan/transaksi/baru" class="btn btn-block btn-warning"><i class="fa fa-plus-square"></i> <small>Transaksi Baru</small></a>
                                    <!-- <button type="button" class="btn btn-block btn-warning" data-toggle="modal" data-target="#modal-default" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus-square"></i> <small>Transaksi</small></button> -->
                                </div>
                            </div>
                        </div>
                        <table id="example1" class="display compact" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Anggota</th>
                                    <th>Nama Anggota</th>
                                    <th>Desa</th>
                                    <th>RT / RW</th>
                                    <th>Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no_wajib = 1; foreach($wajib as $b) : ?>
                                <tr>
                                    <td><?= $no_wajib++ ?></td>
                                    <td><?= $b->no_anggota ?></td>
                                    <td><?= $b->nama ?></td>
                                    <td><?= $b->kelurahan ?></td>
                                    <td><?= $b->rt.'/'.$b->rw ?></td>
                                    <td><?= rupiah($b->total_wajib) ?></td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane active" id="sukarela">
                        <h4 class="box-title"><b><i class="fa fa-money"></i> Simpanan Sukarela</b></h4><hr>
                        <div class="row">
                            <div class="col-lg-2 col-xs-6">
                                <div class="form-group">
                                    <a href="keanggotaan/transaksi/cetak/sukarela" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-danger"><i class="fa fa-print"></i> <small>Cetak Data</small></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-xs-6">
                                <div class="form-group">
                                    <a href="keanggotaan/transaksi/export" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-success"><i class="fa fa-file-excel-o"></i> <small>Export Excel</small></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-xs-6">
                                <div class="form-group">
                                    <a href="keanggotaan/transaksi/baru" class="btn btn-block btn-warning"><i class="fa fa-plus-square"></i> <small>Transaksi Baru</small></a>
                                    <!-- <button type="button" class="btn btn-block btn-warning" data-toggle="modal" data-target="#modal-default" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus-square"></i> <small>Transaksi</small></button> -->
                                </div>
                            </div>
                        </div>
                        <table id="example4" class="display compact" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Anggota</th>
                                    <th>Nama Anggota</th>
                                    <th>Desa</th>
                                    <th>RT / RW</th>
                                    <th>Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no_sukarela = 1; foreach($sukarela as $a) : ?>
                                <tr>
                                    <td><?= $no_sukarela++ ?></td>
                                    <td><?= $a->no_anggota ?></td>
                                    <td><?= $a->nama ?></td>
                                    <td><?= $a->kelurahan ?></td>
                                    <td><?= $a->rt.'/'.$a->rw ?></td>
                                    <td><?= rupiah($a->total_sukarela) ?></td>
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