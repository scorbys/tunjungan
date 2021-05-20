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
                        <h2 class="box-title"><b><i class="fa fa-file-pdf-o"></i> Data Rekap Simpanan Anggota</b></h2>
                    </div>
                    <div class="box-body">
                        <a href="keanggotaan/laporan/cetak/simpanan" class="btn btn-warning" target="_blank" rel="noopener noreferrer"><i class="fa fa-print"></i> Cetak Data</a>
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="40">No</th>
                                    <th>No. Anggota</th>
                                    <th>Nama Anggota</th>
                                    <th>Desa</th>
                                    <th>RT / RW</th>
                                    <th>Simpanan Pokok</th>
                                    <th>Simpanan Wajib</th>
                                    <th>Simpanan Sukarela</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($simpanan as $a) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $a->no_anggota ?></td>
                                    <td><?= $a->nama ?></td>
                                    <td><?= $a->kelurahan ?></td>
                                    <td><?= $a->rt.' / '.$a->rw ?></td>
                                    <td><?= rupiah($a->total_pokok) ?></td>
                                    <td><?= rupiah($a->total_wajib) ?></td>
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