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
                        <h2 class="box-title"><b><i class="fa fa-image"></i> Data Detail Promo KUD Tunjungan</b></h2>
                    </div>
                    <div class="col-lg-12 pull-right">
                        <a href="admin/promo/tambahdetail/<?= $id ?>" class="btn btn-success"><i class="fa fa-plus-square"></i> Tambah Produk Detail Promo</a>
                        <a href="admin/promo" class="btn btn-danger"><i class="fa fa-mail-reply"></i> Kembali</a>
                    </div><hr>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="40">No</th>
                                    <th>Foto Produk</th>
                                    <th>Barcode</th>
                                    <th>Nama Produk</th>
                                    <th>Harga Promo</th>
                                    <TH>Jumlah</TH>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($detail as $a) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><img src="<?= base_url('img/'.$a->foto) ?>" alt="" height="150"></td>
                                    <td><?= $a->barcode ?></td>
                                    <td><?= $a->nama ?></td>
                                    <td><?= $a->harga_promo ?></td>
                                    <td><?= $a->jumlah ?></td>
                                    <td>
                                        <a href="admin/promo/hapusdetail/<?= $a->id ?>" onClick='return confirm("Apakah anda yakin akan menghapus data ini ?")' class="btn btn-danger"><i class="fa fa-trash"></i></a>
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