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
      <div class="col-md-3">                
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 " style="background:white;">
                <div class="x_panel"> 
                    <div class="x_content">
                    <h3 style="padding-bottom: 10px">Banjarejo</h3>
                    <form class="form-horizontal" method="post" action="admin/pelaporan/pindah_halaman">
                        
                        <div class="col-md-6"> 
                            <input type="hidden" id="Banjarejo" class="form-control datepicker" name="Banjarejo" value="Banjarejo" > 
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
      <div class="col-md-3">                
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 " style="background:white;">
                <div class="x_panel"> 
                    <div class="x_content">
                    <h3 style="padding-bottom: 10px">KPRI Karya Sejahtera</h3>
                    <form class="form-horizontal" method="post" action="admin/pelaporan/pindah_halaman">
                        
                        <div class="col-md-6"> 
                            <input type="hidden" id="Banjarejo" class="form-control datepicker" name="Banjarejo" value="KPRIKaryaSejahtera" > 
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
      <div class="col-md-3">                
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 " style="background:white;">
                <div class="x_panel"> 
                    <div class="x_content">
                    <h3 style="padding-bottom: 10px">KUD Makmur Jati</h3>
                    <form class="form-horizontal" method="post" action="admin/pelaporan/pindah_halaman">
                        
                        <div class="col-md-6"> 
                            <input type="hidden" id="Banjarejo" class="form-control datepicker" name="Banjarejo" value="KUD Makmur Jati" > 
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
      <div class="col-md-3">                
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 " style="background:white;">
                <div class="x_panel"> 
                    <div class="x_content">
                    <h3 style="padding-bottom: 10px">KPRI Dwi Eksa</h3>
                    <form class="form-horizontal" method="post" action="admin/pelaporan/pindah_halaman">
                        
                        <div class="col-md-6"> 
                            <input type="hidden" id="Banjarejo" class="form-control datepicker" name="Banjarejo" value="KPRIDwiEksa" > 
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
       
      <div class="col-md-3">                
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 " style="background:white;">
                <div class="x_panel"> 
                    <div class="x_content">
                    <h3 style="padding-bottom: 10px">KPRI Sehat DKK</h3>
                    <form class="form-horizontal" method="post" action="admin/pelaporan/pindah_halaman">
                        
                        <div class="col-md-6"> 
                            <input type="hidden" id="Banjarejo" class="form-control datepicker" name="Banjarejo" value="KPRISehatDKK" > 
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
      <div class="col-md-3">                
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 " style="background:white;">
                <div class="x_panel"> 
                    <div class="x_content">
                    <h3 style="padding-bottom: 10px">Kopendik Banjarejo</h3>
                    <form class="form-horizontal" method="post" action="admin/pelaporan/pindah_halaman">
                        
                        <div class="col-md-6"> 
                            <input type="hidden" id="Banjarejo" class="form-control datepicker" name="Banjarejo" value="KopendikBanjarejo" > 
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
      <div class="col-md-3">                
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 " style="background:white;">
                <div class="x_panel"> 
                    <div class="x_content">
                    <h3 style="padding-bottom: 10px">KPRI Wargo Tunggal</h3>
                    <form class="form-horizontal" method="post" action="admin/pelaporan/pindah_halaman">
                        
                        <div class="col-md-6"> 
                            <input type="hidden" id="Banjarejo" class="form-control datepicker" name="Banjarejo" value="KPRIWargoTunggal" > 
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
      
      <div class="col-md-3">                
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 " style="background:white;">
                <div class="x_panel"> 
                    <div class="x_content">
                    <h3 style="padding-bottom: 10px">KPRI Ihklas Kemenag</h3>
                    <form class="form-horizontal" method="post" action="admin/pelaporan/pindah_halaman">
                        
                        <div class="col-md-6"> 
                            <input type="hidden" id="Banjarejo" class="form-control datepicker" name="Banjarejo" value="KPRIIhklasKemenag" > 
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
      <div class="col-md-3">                
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 " style="background:white;">
                <div class="x_panel"> 
                    <div class="x_content">
                    <h3 style="padding-bottom: 10px">KUD Tani Jaya Banjarejo</h3>
                    <form class="form-horizontal" method="post" action="admin/pelaporan/pindah_halaman">
                        
                        <div class="col-md-6"> 
                            <input type="hidden" id="Banjarejo" class="form-control datepicker" name="Banjarejo" value="BanjKUDTaniJayaBanjarejoarejo" > 
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
      <div class="col-md-3">                
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 " style="background:white;">
                <div class="x_panel"> 
                    <div class="x_content">
                    <h3 style="padding-bottom: 10px">KOPKAR Bhakti Usaha</h3>
                    <form class="form-horizontal" method="post" action="admin/pelaporan/pindah_halaman">
                        
                        <div class="col-md-6"> 
                            <input type="hidden" id="Banjarejo" class="form-control datepicker" name="Banjarejo" value="KOPKARBhaktiUsaha" > 
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
      <div class="col-md-3">                
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 " style="background:white;">
                <div class="x_panel"> 
                    <div class="x_content">
                    <h3 style="padding-bottom: 10px">KPRI Guyub Rukun</h3>
                    <form class="form-horizontal" method="post" action="admin/pelaporan/pindah_halaman">
                        
                        <div class="col-md-6"> 
                            <input type="hidden" id="Banjarejo" class="form-control datepicker" name="Banjarejo" value="KPRIGuyubRukun" > 
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
      <div class="col-md-3">                
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 " style="background:white;">
                <div class="x_panel"> 
                    <div class="x_content">
                    <h3 style="padding-bottom: 10px">KPRI Dwija Mustika</h3>
                    <form class="form-horizontal" method="post" action="admin/pelaporan/pindah_halaman">
                        
                        <div class="col-md-6"> 
                            <input type="hidden" id="Banjarejo" class="form-control datepicker" name="Banjarejo" value="KPRIDwijaMustika" > 
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
      <div class="col-md-3">                
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 " style="background:white;">
                <div class="x_panel"> 
                    <div class="x_content">
                    <h3 style="padding-bottom: 10px">7 STAR</h3>
                    <form class="form-horizontal" method="post" action="admin/pelaporan/pindah_halaman">
                        
                        <div class="col-md-6"> 
                            <input type="hidden" id="Banjarejo" class="form-control datepicker" name="Banjarejo" value="KPRIDwijaMustika" > 
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
      <div class="col-md-3">                
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 " style="background:white;">
                <div class="x_panel"> 
                    <div class="x_content">
                    <h3 style="padding-bottom: 10px">KPRI Serba Usaha Migas</h3>
                    <form class="form-horizontal" method="post" action="admin/pelaporan/pindah_halaman">
                        
                        <div class="col-md-6"> 
                            <input type="hidden" id="Banjarejo" class="form-control datepicker" name="Banjarejo" value="KPRISerbaUsahaMigas" > 
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
      <div class="col-md-3">                
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 " style="background:white;">
                <div class="x_panel"> 
                    <div class="x_content">
                    <h3 style="padding-bottom: 10px">KPRI Dwijo Santosa</h3>
                    <form class="form-horizontal" method="post" action="admin/pelaporan/pindah_halaman">
                        
                        <div class="col-md-6"> 
                            <input type="hidden" id="Banjarejo" class="form-control datepicker" name="Banjarejo" value="KPRIDwijoSantosa" > 
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
      <div class="col-md-3">                
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 " style="background:white;">
                <div class="x_panel"> 
                    <div class="x_content">
                    <h3 style="padding-bottom: 10px">Koperasi Dwi Makmur</h3>
                    <form class="form-horizontal" method="post" action="admin/pelaporan/pindah_halaman">
                        
                        <div class="col-md-6"> 
                            <input type="hidden" id="Banjarejo" class="form-control datepicker" name="Banjarejo" value="KoperasiDwiMakmur" > 
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