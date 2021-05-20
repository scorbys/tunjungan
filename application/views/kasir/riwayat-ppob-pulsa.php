  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Riwayat Transaksi <?= $title ?>
        <small>KUD Tunjungan</small>
      </h1>
      <ol class="breadcrumb">
            <li><p><i class="fa fa-history"></i> Riwayat Transaksi <?= $title ?></p></li>
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
            <div class="col-lg-12">
                <center><p><?php  echo $this->session->flashdata('message'); ?></p></center>
            </div>
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active" id="nav-ppob"><a href="#pulsa" data-toggle="tab">Pulsa</a></li>
                        <li id="nav-ppob"><a href="#paketdata" data-toggle="tab">Paket Data</a></li>
                        <li id="nav-ppob"><a href="#pln" data-toggle="tab">PLN</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="pulsa">
                            <div class="box-header">
                                <h2 class="box-title"><b><i class="fa fa-history"></i> Data Riwayat Transaksi PPOB Kasir</b></h2>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Judul</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Deskripsi</th>
                                            <th>Tanggal</th>
                                            <th width="50">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach($riwayat as $c) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $c->judul ?></td>
                                            <td><?= rupiah($c->nominal) ?></td>
                                            <td>
                                                <?php if($c->status == 'SUCCESS'){
                                                    echo '<span class="label label-success">Sukses</span>';
                                                }else if($c->status == 'PENDING'){
                                                    echo '<span class="label label-warning">Dalam Proses</span>';
                                                }else{
                                                    echo '<span class="label label-danger">Transaksi Gagal</span>';
                                                } ?>
                                            </td>
                                            <td><?= $c->deskripsi ?></td>
                                            <td><?= tanggal_indo(substr($c->tanggal,0,10)).' pukul'.substr($c->tanggal,10).' WIB' ?></td>
                                            <td>
                                                <?php if($c->status == 'PENDING'){
                                                    echo '<a href="kasir/ppob/cek/pulsa/'.$c->ref_id.'" class="btn btn-danger"><i class="fa fa-refresh"></i></a>';
                                                }
                                                if($c->status == 'SUCCESS'){
                                                    echo '<a href="kasir/ppob/cetak/riwayat/'.$c->id_trx.'" class="btn btn-info" target="_blank"><i class="fa fa-print"></i></a>';
                                                } ?>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="paketdata">
                        </div>
                        <div class="tab-pane" id="pln">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  
</div>