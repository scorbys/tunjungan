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
                        <form action="kasir/pengambilan/aksi_pengambilan" target="_blank" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label>No. Anggota <code>*)</code></label>
                                        <input type="text" name="no_anggota" id="no_anggota" class="form-control" placeholder="No. Anggota" required>
                                        <input type="hidden" name="id_user">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Anggota <code>*)</code></label>
                                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Anggota" readonly required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Desa <code>*)</code></label>
                                        <input type="text" name="kelurahan" id="kelurahan" class="form-control" placeholder="Desa" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-3">                                
                                    <div class="form-group">
                                        <label>RT <code>*)</code></label>
                                        <input type="text" name="rt" id="rt" class="form-control" placeholder="RT" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-3">                                
                                    <div class="form-group">
                                        <label>RW <code>*)</code></label>
                                        <input type="text" name="rw" id="rw" class="form-control" placeholder="RW" readonly>
                                    </div>
                                </div>
                            </div><hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Simpanan Anggota <code>*)</code></label>
                                        <select name="tipe_simpanan" id="tipe_simpanan" class="form-control" required>
                                            <option value="1" hidden>Simpanan Pokok</option>
                                            <option value="2" hidden>Simpanan Wajib</option>
                                            <option value="3" selected>Simpanan Sukarela</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tgl. Transaksi <code>*)</code></label>
                                        <input type="date" name="tgl_transaksi" class="form-control" value="2020-10-09" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-red">Nominal <code>*)</code></label>
                                        <input type="text" name="nominal" class="form-control"  id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" placeholder="Nominal (Hanya Angka)" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
                                        <a href="kasir/home" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
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