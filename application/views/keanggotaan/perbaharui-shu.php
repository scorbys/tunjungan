<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?= $title ?> SHU<small> KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> <?= $title ?> SHU</a></li>
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
                        <h2 class="box-title"><b><i class="fa fa-file-pdf-o"></i> Data Pembaharuan SHU</b></h2>
                    </div>
                    <form action="keanggotaan/shu/aksi_pembaharuan" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">                                    
                                        <label for="">Tgl. Pembaharuan</label>
                                        <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Nominal SHU</label>
                                        <input type="text" name="nominal_shu" class="form-control" placeholder="Nominal SHU" onkeydown="return numbersonly(this, event);" value="0" onkeyup="javascript:tandaPemisahTitik(this);" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">                                    
                                        <label for="">Akumulasi Simpanan Wajib & Pokok Anggota</label>
                                        <input type="hidden" name="akumulasi" value="<?= $akumulasi ?>">
                                        <input type="text" name="total_akumulasi_simpanan" value="<?= rupiah($akumulasi) ?>" class="form-control" placeholder="Akumulasi Simpanan Wajib & Pokok Anggota" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button class="btn btn-success"><i class="fa fa-save"></i> Simpanan Data</button>
                                    <a href="keanggotaan/shu" class="btn btn-danger"><i class="fa fa-mail-reply"></i> Kembali</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>  
</div>