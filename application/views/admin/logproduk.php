<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?= $title ?><small> KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-image"></i> <?= $title ?></a></li>
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
                        <h2 class="box-title"><b><i class="fa fa-image"></i> Data Produk</b></h2>
                    </div>
                    <div class="col-lg-12 pull-right">
                        <a href="admin/produk/tambah" class="btn btn-success"><i class="fa fa-plus-square"></i> Tambah Produk</a>
                        <a href="admin/produk/export" class="btn btn-warning" target="_blank"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
                    </div><hr>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="40">No</th>
                                    <th>admin</th> 
                                    <th>proses</th>
                                    <th>ip</th> 
                                    <th width="60">date</th> 
                                    <th>nama</th>
                                    <th>stok</th>
                                    <th>harga_jual</th>
                                    <th>harga_beli</th>
                                    <th>harga_grosir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($produk as $a) : ?>
                                <tr>
                                    <td><?= $no++ ?></td> 
                                    <td><?= $a->admin ?></td> 
                                    <td><?= $a->proses ?></td>
                                    <td><?= $a->ip ?> <br><?= $a->user ?> </td> 
                                    <td><?= $a->date ?></td> 
                                    <td><?= $a->nama ?></td>
                                    <td><?= $a->stok ?></td>
                                    <td><?= $a->harga_jual ?></td>
                                    <td><?= $a->harga_beli ?></td>
                                    <td><?= $a->harga_grosir ?></td>
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