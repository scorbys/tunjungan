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
            <div class='col-md-12'>
                  <div class="col-md-6 " style="background:white;">
                      <div class="x_panel"> 
                            <div class="x_content">
                              <h4>Pilih menu ini jika ingin mengexport semua data barang di toko anda</h4><br>
                              <a href="admin/pelaporan/report_barang" class="btn btn-primary btn-block"><i class="fa fa-download"></i> Export Data</a>
                            </div>
                      </div>
                  </div> 
                  <!-- <div class="col-md-6 " style="background:white;">
                    <div class="x_panel">    
                        <div class="x_content">
                          <h4>Export Data berdasarkan Supplier.</h4>
                          <form action="http://localhost/pos/pos/report/itemBySupplier" method="post">
                              <div class="form-group">
                              <select class="form-control select2 select2-hidden-accessible" id="lbarangsup" name="itemsupp" tabindex="-1" aria-hidden="true">
                                <option> - Supplier - </option>
                                                          <option value="3">CV. Nusantara Packindo</option>
                                                          <option value="4">CV. Indo Visitama</option>
                                                          <option value="5">CV. Karunia Jaya Perkasa</option>
                                                          <option value="33">CV. Jaya Makmur</option>
                                                          </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-lbarangsup-container"><span class="select2-selection__rendered" id="select2-lbarangsup-container" title=" - Supplier - "> - Supplier - </span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                              </div>
                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-download"></i> Export Data</button>
                          </form>
                        </div>
                    </div>
                  </div>  -->
              </div>
             
          </div> 
  </section>  
</div>  
             