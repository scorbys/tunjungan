<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?= $title ?><small> KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bell-o"></i> <?= $title ?></a></li>
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
                        <h2 class="box-title"><b><i class="fa fa-bell-o"></i> Tambah <?= $title ?></b></h2>
                    </div>
                    <div class="box-body">
                         <form action="admin/notifikasi/aksi_tambah" 
                               method="post" enctype="multipart/form-data"  >
                            <fieldset>
                                <div class="form-group">
                                    <label for="">Foto Notifikasi</label>
                                    <input type="file" name="foto">
                                </div>
                                <div class="form-group">
                                    <label for="">Judul</label>
                                    <input type="text" id="title1" name="title" class="form-control" placeholder="Judul Notifikasi" required>
                                    <input type="hidden" name="push_type" value="topic"/> 
                                </div>
                                <div class="form-group">
                                    <label for="">Keterangan</label>
                                    <textarea   id="message1" name="message"class="form-control"  placeholder="Notification message!"></textarea>
                                </div>
                                <div class="form-group">
                                     <button type="submit" class=" btn_send btn btn-success">Kirim Broadcast</button>
                                </div>
                   
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>  
</div>