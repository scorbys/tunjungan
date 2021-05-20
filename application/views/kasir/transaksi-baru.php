<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Konfirmasi Pembayaran<small> KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-money"></i> Konfirmasi Pembayaran</a></li>
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
                    </div>
                    <div class="box-body">
                        <form action="kasir/transaksi/baru" method="post">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Kode Pembayaran</label>
                                        <input type="text" name="kode" class="form-control" placeholder="Kode Pembayaran" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <button class="btn btn-success" name="tombolkode"><i class="fa fa-search"></i> Kode Pembayaran Ini Benar !</button>
                                        <a href="kasir/transaksi" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">              
                <div class="box">
                    <div class="box-header with-border">
                        <h2 class="page-header">
                            <i class="fa fa-globe"></i> KUD Tunjungan
                            <small class="pull-right">Tanggal Transaksi : <?= tanggal_indo(date('Y-m-d')) ?></small>
                        </h2>
                    </div>
                    <div class="box-body">
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>Admin.</strong><br>
                                    KUD Tunjungan<br>
                                    Jl. jendral sudirman Kav 4 Bangkle Blora<br>
                                    <i class="fa fa-phone"></i> : 081809434513<br>
                                    <i class="fa fa-envelope-o"></i> : admin@tunjungan.com
                                </address>
                            </div>
                            
                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong><i>Anggota tidak ditemukan.</i></strong><br>
                                    <i>Alamat tidak ditemukan</i><br>
                                </address>
                            </div>
                            
                            <div class="col-sm-4 invoice-col">
                                <h3 class=" pull-right"><b>Kode Transaksi:</b> -</h3><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4" style="text-align:right;">Total</th>
                                            <th><?= rupiah(0) ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row no-print">
                            <div class="col-xs-12">
                                <a href="kasir/home" class="btn btn-danger pull-right"><i class="fa fa-reply"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>