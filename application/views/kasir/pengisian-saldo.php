<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pembayaran Simpanan Anggota<small> KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-money"></i> Pembayaran Simpanan Anggota</a></li>
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
                        <h2 class="box-title"><b><i class="fa fa-money"></i> Pembayaran Simpanan Anggota</b></h2>
                    </div>
                    <div class="box-body">
                        <form action="kasir/transaksi/aksi_saldo" target="_blank" method="post">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Simpanan</label>
                                        <select name="simpanan" class="form-control" required>
                                        <option value="" style="display:none;">-Pilih Simpanan-</option>
                                        <option value="1">Simpanan Sukarela</option>
                                        <option value="2">Simpanan Wajib</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">                                
                                    <div class="form-group">
                                        <label for="">Tgl. Pembayaran</label>
                                        <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group has-error">
                                        <label for="">No. Anggota (Wajib Diisi)</label>
                                        <input type="text" name="no_anggota" id="no_anggota" class="form-control" placeholder="No. Anggota" required>
                                        <input type="hidden" name="id_user" id="id_user" class="form-control" placeholder="No. Anggota" required>
                                        <input type="hidden" name="id_firebase" id="id_firebase" class="form-control"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Nama Anggota</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Nama Anggota" readonly disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nominal (Rp)</label>
                                        <input type="text" name="nominal" class="form-control"  id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" placeholder="Nominal (Hanya Angka)" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Kecamatan</label>
                                        <input type="text" name="kecamatan" class="form-control" placeholder="Nama Kecamatan" readonly disabled>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Desa</label>
                                        <input type="text" name="kelurahan" class="form-control" placeholder="Nama Kelurahan" readonly disabled>
                                    </div>
                                </div>
                                <div class="col-lg-3">                                
                                    <div class="form-group">
                                        <label>RT <code>*)</code></label>
                                        <input type="text" name="rt" id="rt" class="form-control" placeholder="RT" readonly disabled>
                                    </div>
                                </div>
                                <div class="col-lg-3">                                
                                    <div class="form-group">
                                        <label>RW <code>*)</code></label>
                                        <input type="text" name="rw" id="rw" class="form-control" placeholder="RW" readonly disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
                                        <a href="kasir/transaksi" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
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