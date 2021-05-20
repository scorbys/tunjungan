<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= $title ?><small> KUD Tunjungan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> <?= $title ?></a></li>
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
                  <h4><strong><?= tanggal_indo(date("Y-m-d")) ?></strong></h4>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
          <center><p><?php  echo $this->session->flashdata('message'); ?></p></center>
      </div> 
      <div class="col-md-4">                
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 " style="background:white;">
                <div class="x_panel"> 
                    <div class="x_content">
                    <h3 style="padding-bottom: 10px">Laporan Penjualan</h3>
                    <form class="form-horizontal" method="post" action="admin/pelaporan/report_penjualan">
                    <div class="form-group">
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <label for="">Tanggal Awal :</label>
                         <input type="date" id="tgl1" class="form-control datepicker" name="tgl1" required=""> 
                       </div>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <label for="">Tanggal Akhir :</label>
                         <input type="date" id="tgl2" class="form-control datepicker" name="tgl2" required=""> 
                       </div>
                     </div>
                        <div class="col-md-6">   
                            <input type="text" id="value" class="form-control datepicker" name="value" value="<?=$value?>" required="" readonly> 
                        </div>  
                        <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-primary btn-block"><i class="fa fa-file-pdf-o"></i> Lihat Laporan</button>
                        </div>
                        </div>
                    </form>
                    </div> 
                </div>
                </div> 
                </div>
             
          </div>
      </div> 
      <div class="col-md-4">                
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 " style="background:white;">
                <div class="x_panel"> 
                    <div class="x_content">
                    <h3 style="padding-bottom: 10px">Laporan Barang</h3>
                    <form class="form-horizontal" method="post" action="admin/pelaporan/report_barang">
                    <div class="form-group">
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <label for="">Tanggal Awal :</label>
                         <input type="date" id="tgl1" class="form-control datepicker" name="tgl1" required=""> 
                       </div>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <label for="">Tanggal Akhir :</label>
                         <input type="date" id="tgl2" class="form-control datepicker" name="tgl2" required=""> 
                       </div>
                     </div>
                        <div class="col-md-6">  
                            <input type="text" id="value" class="form-control datepicker" name="value" value="<?=$value?>" required="" readonly> 
                        </div>  
                        <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-primary btn-block"><i class="fa fa-file-pdf-o"></i> Lihat Laporan</button>
                        </div>
                        </div>
                    </form>
                    </div> 
                </div>
                </div> 
                </div>
             
          </div>
      </div> 
      <div class="col-md-4">                
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 " style="background:white;">
                <div class="x_panel"> 
                    <div class="x_content">
                    <h3 style="padding-bottom: 10px">Laporan Laba Rugi</h3>
                    <form class="form-horizontal" method="post" action="admin/pelaporan/report_laba_rugi">
                    <div class="form-group">
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <label for="">Tanggal Awal :</label>
                         <input type="date" id="tgl1" class="form-control datepicker" name="tgl1" required=""> 
                       </div>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <label for="">Tanggal Akhir :</label>
                         <input type="date" id="tgl2" class="form-control datepicker" name="tgl2" required=""> 
                       </div>
                     </div>
                        <div class="col-md-6"> 
                             <input type="text" id="value" class="form-control datepicker" name="value" value="<?=$value?>" required="" readonly> 
                        </div>  
                        <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-primary btn-block"><i class="fa fa-file-pdf-o"></i> Lihat Laporan</button>
                        </div>
                        </div>
                    </form>
                    </div> 
                </div>
                </div> 
                </div>
             
          </div>
      </div> 
      
  </div>
  </section>  
</div>