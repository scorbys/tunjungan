<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?= $title ?><small> KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> <?= $title ?></a></li>
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
                        <h2 class="box-title"><b><i class="fa fa-users"></i> Tambah <?= $title ?></b></h2>
                    </div>
                    <div class="box-body">
                        <form action="keanggotaan/anggota/aksi_tambah" target="_blank" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No. Anggota</label>
                                        <input type="text" name="no_anggota" class="form-control" placeholder="No. Anggota" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Anggota</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Nama Anggota" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">No. KTP</label>
                                        <input type="text" name="ktp" class="form-control" placeholder="No. KTP">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control">
                                            <option value="Laki-laki" selected>Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>            
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Pekerjaan</label>
                                        <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" required>
                                    </div>
                                </div>  
                            </div>
                            <div class="row">          
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Provinsi</label>
                                        <select name="id_provinsi" class="form-control provinsi">
                                            <option value="2" selected>Jawa Tengah</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kabupaten</label>
                                        <select name="id_kabupaten" class="form-control kabupaten">
                                            <option value="">Pilih Kabupaten</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kecamatan</label>
                                        <select name="id_kecamatan" class="form-control kecamatan">
                                            <option value="">Pilih Kecamatan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Desa</label>
                                        <select name="id_kelurahan" class="form-control kelurahan">
                                            <option value="">Pilih Kelurahan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">No. HP</label>
                                        <input type="text" name="no_hp" class="form-control" placeholder="No. HP" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" placeholder="alamatemail@gmail.com" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tgl. Registrasi</label>
                                        <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" required>
                                    </div>
                                </div> 
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">RT</label>
                                        <input type="text" name="rt" placeholder="RT" class="form-control" required>
                                    </div>
                                </div>      
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">RW</label>
                                        <input type="text" name="rw" placeholder="RW" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
                                        <a href="admin/anggota" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
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