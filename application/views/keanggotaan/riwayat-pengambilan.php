<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Data Riwayat Pengambilan Sukarela<small> KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-history"></i> Data Riwayat Pengambilan Sukarela</a></li>
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
                        <h2 class="box-title"><b><i class="fa fa-history"></i> Data Riwayat Pengambilan Sukarela</b></h2>
                    </div>
                    <div class="box-body">
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
                                <?php $no_pokok = 1; foreach($pengambilan as $c) : ?>
                                <tr>
                                    <td><?= $no_pokok++ ?></td>
                                    <td><?= $c->no_anggota ?></td>
                                    <td><?= $c->nama_anggota ?></td>
                                    <td><?= rupiah($c->nominal) ?></td>
                                    <td><?= $c->nama_admin ?></td>
                                    <td>
                                        <a href="keanggotaan/pengambilan/cetak/<?= $c->id_pengambilan ?>" class="btn btn-success" target="_blank" title="Cetak Data"><i class="fa fa-print"></i></a>
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