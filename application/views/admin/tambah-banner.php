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
                <h2 class="box-title"><b><i class="fa fa-user-plus"></i> Banner Baru</b></h2>
            </div>
            <div class="box-body">
                <form action="admin/banner/aksi_tambah" method="post" enctype="multipart/form-data">
                    
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Foto Banner</label>
                                <input type="file" name="foto" class="form-control" accept="image/x-png,image/jpeg" required>
                            </div>
                        </div> 
                          
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">No Urut</label>
                            <input type="text" name="urut" class="form-control" placeholder="No Urut" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
                            <a href="admin/kategori" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>  