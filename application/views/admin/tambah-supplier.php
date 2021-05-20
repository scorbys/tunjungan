<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= $title ?><small> KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> <?= $title ?></a></li>
            <?php if(!empty($menu )){ ?>
            <li><a href="#"> <?= $menu ?></a></li>
            <?php } ?>
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
        <div class="box box-default">
            <div class="box-header with-border">
                <center><p><?php  echo $this->session->flashdata('message'); ?></p></center>
                <h2 class="box-title"><b><i class="fa fa-plus-square"></i> Tambah Data Stokis</b></h2>
            </div>
            <div class="box-body">
            <form action="admin/supplier/aksi_tambah" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Kode Stokis</label>
                                <input type="text" name="kode" class="form-control" value="SUP-<?= date('ymd').$kode ?>" placeholder="Kode Stokis" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Nama Stokis</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama Stokis" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Alamat Stokis</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat Stokis">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Email Stokis</label>
                                <input type="email" name="email" class="form-control" placeholder="alamatemail@domain.com">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">No. Telp</label>
                                <input type="text" name="telp" class="form-control" placeholder="No. Telp">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="">Kode Pos</label>
                                <input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="">Pilih Status</label>
                                <select name="jenis" class="form-control" required>
                                    <option value="Distributor">Distributor</option>
                                    <option value="Supplier">Supplier</option> 
                                    <option value="Mitra">Mitra</option> 
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="">Status Stokis</label>
                                <select name="status" class="form-control" required>
                                    <option value="aktif">Aktif</option>
                                    <option value="tidak">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea name="catatan" class="form-control" rows="4" placeholder="Keterangan"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
                                <a href="admin/supplier" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>  
</div>