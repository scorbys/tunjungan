<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?= $title ?><small> KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file-text"></i> <?= $title ?></a></li>
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
                        <h2 class="box-title"><b><i class="fa fa-file-text"></i> Data Produk PPOB</b></h2>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="40">No</th>
                                    <th>Kode Produk</th>
                                    <th>Nama Produk (DENOM)</th>
                                    <th>Provider</th>
                                    <th>Deskripsi</th>
                                    <th>Harga Produk</th>
                                    <th>Biaya Admin</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Poin</th>
                                    <th width="60">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($produk as $a) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $a->code_produk ?></td>
                                    <td><?= $a->nama ?></td>
                                    <td><?= $a->penyedia ?></td>
                                    <td><?= $a->deskripsi ?></td>
                                    <td><?= rupiah($a->harga+$a->fee_vikosha) ?></td>
                                    <td><?= rupiah($a->biaya_admin) ?></td>
                                    <td><?= $a->kategori ?></td>
                                    <td><center><?php
                                        if($a->status == 'ACTIVE'){
                                            echo '<p class="label btn-block bg-green">Aktif</p>';
                                        }else{
                                            echo '<p class="label btn-block bg-red">Tidak Aktif</p>';
                                        }
                                    ?></center></td>
                                    <td><?= $a->poin ?></td>
                                    <td>
                                        <a href="admin/produk/editppob/<?= $a->id ?>" class="btn btn-success" title="Edit Produk PPOB"><i class="fa fa-edit"></i></a>
                                        <!--<a href="admin/produk/hapus/<?= $a->id ?>" class="btn btn-danger" title="Hapus Produk" onClick='return confirm("Apakah anda yakin akan menghapus data ini ?")'><i class="fa fa-trash"></i></a>-->
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