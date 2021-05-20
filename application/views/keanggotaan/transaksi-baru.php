<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pengambilan Simpanan Anggota<small> KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-money"></i> Pengambilan Simpanan Anggota</a></li>
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
                        <h2 class="box-title"><b><i class="fa fa-money"></i> Pengambilan Simpanan Anggota</b></h2>
                    </div>
                    <div class="box-body">
                        <form action="keanggotaan/transaksi/aksi_baru" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Simpanan</label>
                                    <select name="simpanan" class="form-control" required>
                                    <option value="1">Simpanan Sukarela</option>
                                    <option value="2">Simpanan Wajib</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">No. Anggota</label>
                                    <input type="text" name="no_anggota" id="no_anggota" class="form-control" placeholder="No. Anggota" required>
                                    <input type="hidden" name="id_user" id="id_user" class="form-control" placeholder="No. Anggota" required>
                                    <input type="hidden" name="id_firebase" id="id_firebase" class="form-control"  required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Anggota</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Anggota" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- <div class="form-group">
                                    <label for="">Kode Pembayaran</label>
                                    <input type="text" name="kode" class="form-control" placeholder="Kode Pembayaran" required>
                                </div> -->
                                <div class="form-group">
                                    <label for="">Tgl. Pembayaran</label>
                                    <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nominal (Rp)</label>
                                    <input type="text" name="nominal" class="form-control"  id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" placeholder="Nominal (Hanya Angka)" required>
                                </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Kecamatan</label>
                                        <input type="text" name="kecamatan" class="form-control" placeholder="Nama Kecamatan" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Desa</label>
                                        <input type="text" name="kelurahan" class="form-control" placeholder="Nama Kelurahan" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
                                        <a href="keanggotaan/transaksi" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>  
</div>