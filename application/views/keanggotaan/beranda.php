<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <?= $title ?>
        <small>KUD Tunjungan</small>
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
      <?php foreach($total as $a) : ?>
      <div class="col-md-4 col-xs-12">
        <div class="small-box bg-aqua">
          <div class="inner">
            <b><h4><?= rupiah($a->total_pokok) ?></h4></b>
            <p>Simpanan Pokok</p>
          </div>
          <div class="icon">
            <i class="fa fa-balance-scale"></i>
          </div>
          <a href="keanggotaan/anggota" class="small-box-footer">Klik Disini <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-md-4 col-xs-12">
        <div class="small-box bg-maroon">
          <div class="inner">
            <b><h4><?= rupiah($a->total_wajib) ?></h4></b>
            <p>Simpanan Wajib</p>
          </div>
          <div class="icon">
            <i class="fa fa-money"></i>
          </div>
          <a href="keanggotaan/anggota" class="small-box-footer">Klik Disini <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-md-4 col-xs-12">
        <div class="small-box bg-purple">
          <div class="inner">
            <b><h4><?= rupiah($a->total_sukarela) ?></h4></b>
            <p>Simpanan Sukarela</p>
          </div>
          <div class="icon">
            <i class="fa fa-credit-card"></i>
          </div>
          <a href="keanggotaan/anggota" class="small-box-footer">Klik Disini <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <?php endforeach ?>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-md-4">
            <div class="box box-solid">
              <div class="box-body text-center">
                <div id="chart-anggota"></div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="box box-solid">
              <div class="box-body text-center">
                <div id="simpanan-anggota"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>