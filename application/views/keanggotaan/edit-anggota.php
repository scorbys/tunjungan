<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Edit <?= $title ?><small> KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Edit <?= $title ?></a></li>
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
                        <h2 class="box-title"><b><i class="fa fa-users"></i> Edit <?= $title ?></b></h2>
                    </div>
                    <div class="box-body">
                        <?php foreach($edit as $a) : ?>
                        <form action="keanggotaan/anggota/aksi_edit" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No. Anggota</label>
                                        <input type="text" name="no_anggota" class="form-control" placeholder="No. Anggota" value="<?= $a->no_anggota ?>">
                                        <input type="hidden" name="id_user" value="<?= $a->id_user ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Anggota</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Nama Anggota" value="<?= $a->nama ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">No. KTP</label>
                                        <input type="text" name="ktp" class="form-control" placeholder="No. KTP" value="<?= $a->ktp ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control">
                                            <option value="Laki-laki" <?php if($a->jenis_kelamin == 'Laki-laki'){ echo 'selected';} ?>>Laki-laki</option>
                                            <option value="Perempuan" <?php if($a->jenis_kelamin == 'Perempuan'){ echo 'selected';} ?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>            
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Pekerjaan</label>
                                        <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value="<?= $a->pekerjaan ?>">
                                    </div>
                                </div>  
                            </div>
                            <div class="row">          
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Provinsi</label>
                                        <select name="id_provinsi" class="form-control provinsi">
                                            <option value="2" <?php if($a->id_provinsi == 2){ echo 'selected'; } ?>>Jawa Tengah</option>
                                            <option value="3" <?php if($a->id_provinsi == 3){ echo 'selected'; } ?>>ALB</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kabupaten</label>
                                        <select name="id_kabupaten" class="form-control kabupaten">
                                            <?php foreach($this->db->query("SELECT * FROM tbl_kabupaten WHERE id_provinsi = '2'")->result() as $b) : ?>
                                            <option value="<?= $b->id_kabupaten ?>" <?php if($a->id_kabupaten == $b->id_kabupaten){ echo 'selected'; } ?>><?= $b->kabupaten ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kecamatan</label>
                                        <select name="id_kecamatan" class="form-control kecamatan">
                                            <?php foreach($this->db->query("SELECT * FROM tbl_kecamatan WHERE id_kabupaten = '$a->id_kabupaten'")->result() as $c) : ?>
                                            <option value="<?= $c->id_kecamatan ?>" <?php if($a->id_kecamatan == $c->id_kecamatan){ echo 'selected'; } ?>><?= $c->kecamatan ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Desa</label>
                                        <select name="id_kelurahan" class="form-control kelurahan">
                                            <?php foreach($this->db->query("SELECT * FROM tbl_kelurahan WHERE id_kecamatan = '$a->id_kecamatan'")->result() as $d) : ?>
                                            <option value="<?= $d->id_kelurahan ?>" <?php if($a->id_kelurahan == $d->id_kelurahan){ echo 'selected'; } ?>><?= $d->kelurahan ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">No. HP</label>
                                        <input type="text" name="no_hp" class="form-control" value="<?= $a->no_hp ?>" placeholder="No. HP">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" placeholder="alamatemail@gmail.com" value="<?= $a->email ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Tgl. Registrasi</label>
                                        <input type="date" name="tanggal" class="form-control" value="<?= substr($a->tgl_registrasi,0,10) ?>" required>
                                    </div>
                                </div> 
                                <div class="col-lg-3">
                                     <div class="form-group">
                                            <label for="">Status Anggota</label>
                                            <select name="status" class="form-control">
                                              <option value="Y" <?php if($a->status == 'Y'){ echo 'selected'; } ?>>Aktif</option>
                                              <option value="N" <?php if($a->status == 'N'){ echo 'selected'; } ?>>Keluar / Tidak Aktif</option>
                                            </select>
                                     </div>
                                </div>     
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">RT</label>
                                        <input type="text" name="rt" placeholder="RT" value="<?= $a->rt ?>" class="form-control" >
                                    </div>
                                </div>      
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">RW</label>
                                        <input type="text" name="rw" placeholder="RW" value="<?= $a->rw ?>" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
                                        <a href="keanggotaan/anggota" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>  
</div>