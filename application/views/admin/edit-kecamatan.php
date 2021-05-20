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
                <h2 class="box-title"><b><i class="fa fa-edit"></i> Edit Kecamtan</b></h2>
            </div>
            <div class="box-body">
                <?php foreach($edit as $a) : ?>
                <form action="admin/wilayah/edit_kecamatan" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Propinsi</label>
                                <input type="hidden" name="id_kecamatan" value="<?= $a->id_kecamatan ?>">
                                <select name="id_provinsi" class="form-control propinsi" required>
                                    <option value="2" selected>Jawa Tengah</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Kabupaten</label>
                                <select name="id_kabupaten" class="form-control kabupaten" required>
                                    <?php foreach($this->db->query("SELECT * FROM tbl_kabupaten WHERE id_kabupaten > 1 AND id_provinsi = 2 ORDER BY kabupaten ASC")->result() as $c) : ?>
                                    <option value="<?= $c->id_kabupaten ?>" <?php if($a->id_kabupaten == $c->id_kabupaten){ echo 'selected'; } ?>><?= $c->kabupaten ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>               
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Nama Kecamatan</label>
                                <input type="text" name="kecamatan" class="form-control" value="<?= $a->kecamatan ?>" placeholder="Nama Kecamatan" required>
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
                <?php endforeach ?>
            </div>
        </div>
    </section>
</div>  