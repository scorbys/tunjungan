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
                        <h2 class="box-title"><b><i class="fa fa-users"></i> <?= $title ?></b></h2>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Awal Periode</label>
                                    <input type="date" name="awal" value="<?= $awal ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Akhir Periode</label>
                                    <input type="date" name="akhir" value="<?= $akhir ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button class="btn btn-success"><i class="fa fa-search"></i> Cari Data</button>
                                <a href="admin/agen/cetak/<?= $id_agen.'/'.$awal.'/'.$akhir ?>" target="_blank" class="btn btn-warning"><i class="fa fa-print"></i> Cetak Data</a>
                            </div>
                        </div><hr>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="40">No</th>
                                    <th>Waktu Transaksi</th>
                                    <th>Nominal Transaksi</th>
                                    <th>Bonus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; $total = 0; $total_untung = 0; foreach($transaksi as $a) :
                                $total += $a->total;
                                $total_untung += 1000;
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $a->tgl_sukses ?></td>
                                    <td><?= rupiah($a->total) ?></td>
                                    <td><?= rupiah(1000) ?></td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2">TOTAL</th>
                                    <th><?= $total ?></th>
                                    <th><?= $total_untung ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>  
</div>