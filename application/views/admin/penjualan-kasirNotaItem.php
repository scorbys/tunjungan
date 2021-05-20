<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?= $title ?><small> KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file-pdf-o"></i> <?= $title ?></a></li>
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
                        <h2 class="box-title"><b><i class="fa fa-file-pdf-o"></i> Data Penjualan Kasir</b></h2>
                    </div>
                    <div class="box-body">
                        <!-- <a href="admin/penjualan/cetak/kasir" target="_blank" rel="noopener noreferrer"></a> -->
                        <table id="example5" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="60">Nota</th>
                                    <th>Nama Kasir</th>
                                    <th>Tgl. Transaksi</th>
                                    <th>Produk</th>
                                    <th>Harga Produk</th> 
                                    <th>Harga Total</th> 
                                    <th>Qty</th>  
                                </tr>
                            </thead> 
                            <tbody>
                                <?php $no = 1; foreach($penjualan as $a) : ?>
                                <tr>
                                    <td><?= $a->id ?></td>
                                    <td><?= $a->kasir ?></td> 
                                    <td><?= $a->tgl_transaksi ?></td> 
                                    <td><?= $a->produk ?></td> 
                                    <td><?= rupiah($a->harga) ?></td> 
                                    <td><?= rupiah($a->harga_total) ?></td> 
                                    <td><?= $a->jumlah ?></td>  
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