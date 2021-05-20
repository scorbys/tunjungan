<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Riwayat Transaksi Simpanan Anggota
            <small>KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-history"></i> Riwayat Transaksi Simpanan Anggota</a></li>
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
    <div class="row">    
        <div class="col-lg-12">
            <center><p><?php  echo $this->session->flashdata('message'); ?></p></center>
        </div>
    </div>
    <div class="box box-default">
        <div class="box-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs ">
                    <li class="active"><a href="#sukarela" data-toggle="tab">Riwayat Simpanan Sukarela</a></li>
                    <li><a href="#wajib" data-toggle="tab">Riwayat Simpanan Wajib</a></li>
                    <li><a href="#pokok" data-toggle="tab">Riwayat Simpanan Pokok</a></li>
                </ul>
                <div class="tab-content">
            
                    <div class="tab-pane" id="pokok">
                        <h4 class="box-title"><b><i class="fa fa-history"></i> Simpanan pokok</b></h4><hr>
                        <table id="example1" class="display compact" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Anggota</th>
                                    <th>Nama Anggota</th>
                                    <th>Nominal</th>
                                    <th>Nama Petugas</th>
                                    <th width="90">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no_pokok = 1; foreach($pokok as $a) : ?>
                                <tr>
                                    <td><?= $no_pokok++ ?></td>
                                    <td><?= $a->no_anggota ?></td>
                                    <td><?= $a->nama_anggota ?></td>
                                    <td><?= rupiah($a->nominal) ?></td>
                                    <td><?= $a->nama_admin ?></td>
                                    <td>
                                        <a href="keanggotaan/transaksi/cetak/pokok/<?= $a->id_simpanan ?>" class="btn btn-success" target="_blank" title="Cetak Data"><i class="fa fa-print"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane" id="wajib">
                        <h4 class="box-title"><b><i class="fa fa-history"></i> Simpanan Wajib</b></h4><hr>
                        <table id="example3" class="display compact" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Anggota</th>
                                    <th>Nama Anggota</th>
                                    <th>Nominal</th>
                                    <th>Nama Petugas</th>
                                    <th width="90">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no_pokok = 1; foreach($wajib as $b) : ?>
                                <tr>
                                    <td><?= $no_pokok++ ?></td>
                                    <td><?= $b->no_anggota ?></td>
                                    <td><?= $b->nama_anggota ?></td>
                                    <td><?= rupiah($b->nominal) ?></td>
                                    <td><?= $b->nama_admin ?></td>
                                    <td>
                                        <a href="keanggotaan/transaksi/cetak/wajib/<?= $b->id_simpanan ?>" class="btn btn-success" target="_blank" title="Cetak Data"><i class="fa fa-print"></i></a>
                                        <a href="keanggotaan/transaksi/hapus/wajib/<?= $b->id_simpanan ?>" class="btn btn-danger" title="Hapus Data"  onClick='return confirm("Apakah anda yakin akan menghapus data ini ?")'><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane active" id="sukarela">
                        <h4 class="box-title"><b><i class="fa fa-history"></i> Simpanan Sukarela</b></h4><hr>
                        <table id="example4" class="display compact" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Anggota</th>
                                    <th>Nama Anggota</th>
                                    <th>Nominal</th>
                                    <th>Nama Petugas</th>
                                    <th width="90">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no_pokok = 1; foreach($sukarela as $c) : ?>
                                <tr>
                                    <td><?= $no_pokok++ ?></td>
                                    <td><?= $c->no_anggota ?></td>
                                    <td><?= $c->nama_anggota ?></td>
                                    <td><?= rupiah($c->nominal) ?></td>
                                    <td><?= $c->nama_admin ?></td>
                                    <td>
                                        <a href="keanggotaan/transaksi/cetak/sukarela/<?= $c->id_simpanan ?>" class="btn btn-success" target="_blank" title="Cetak Data"><i class="fa fa-print"></i></a>
                                        <a href="keanggotaan/transaksi/hapus/sukarela/<?= $c->id_simpanan ?>" class="btn btn-danger" title="Hapus Data"  onClick='return confirm("Apakah anda yakin akan menghapus data ini ?")'><i class="fa fa-trash"></i></a>
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