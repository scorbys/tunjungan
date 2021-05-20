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
        <div class="box box-default">
            <center><p><?php  echo $this->session->flashdata('message'); ?></p></center>
            <div class="box-header with-border">
                <h2 class="box-title"><b><i class="fa fa-user-plus"></i> Kecamatan Baru</b></h2>
            </div>
            <div class="box-body">
                <form action="admin/wilayah/tambah_kecamatan" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Propinsi</label>
                                <select name="id_provinsi" class="form-control propinsi" required>
                                    <option value="" style="display:none;">Pilih Propinsi</option>
                                    <option value="2">Jawa Tengah</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Kabupaten</label>
                                <select name="id_kabupaten" class="form-control kabupaten" required>
                                    <option value="" style="display:none;">Pilih Kabupaten</option>
                                </select>
                            </div>
                        </div>                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Nama Kabupaten</label>
                                <input type="text" name="kecamatan" class="form-control" placeholder="Nama Kecamatan" required>
                            </div>
                        </div>                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
                                <a href="admin/wilayah/kecamatan" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>  