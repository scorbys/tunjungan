<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <?= $title ?>
        <small>KUD Tunjungan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-credit-card"></i> <?= $title ?></a></li>
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
        <div class="col-lg-8">             
          <div class="box">
            <div class="box-header with-border">
                <h2 class="box-title"><b><i class="fa fa-list-ol"></i> Daftar Produk Yang Dibeli</b></h2><hr>
                <a href="kasir/home" class="btn btn-danger pull-right"><i class="fa fa-shopping-cart"></i> Belanja Lagi</a>
            </div>
            <div class="box-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="40">No</th>
                      <th>Barcode</th>
                      <th>Foto Produk</th>
                      <th>Nama Produk</th>
                      <th width="70">Qty</th>
                      <th>Harga</th>
                      <th width="175">Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($this->cart->contents() as $a) : ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $a['barcode'] ?></td>
                        <td><img src="img/<?= $a['image'] ?>" width="100"></td>
                        <td><?= $a['name'] ?></td>
                        <td><?= $a['qty'] ?></td>
                        <td><?= $a['price'] ?></td>
                        <td><p id="harga"><?= $a['price']*$a['qty'] ?></p></td>
                      </tr>                      
                    <?php endforeach ?>
                  </tbody>
                  <tfoot>
                      <tr>
                        <td colspan="6" style="text-align:right;">Total Belanja</td>
                        <td class="text-danger" style="font-size:20px; font-weight:900;"><b><?= rupiah($this->cart->total()) ?></b></td>
                      </tr>
                  </tfoot>
                </table>
            </div>
          </div>
        </div>
        <div class="col-md-4">                
          <div class="box">
            <div class="box-header with-border">
                <h2 class="box-title"><b><i class="fa fa-plus-square"></i> Form Pembayaran</b></h2>
            </div>
            <div class="box-body">
              <form action="kasir/home/nota" target="_blank" method="post">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="form-group">
                              <label for="">Total Belanja</label>
                              <input type="hidden" name="id_transaksi" value="<?= $id_transaksi ?>">
                              <input type="text" name="biaya" id="biaya" placeholder="Total Belanja" onkeyup="sum();" value="<?= $this->cart->total() ?>" class="form-control input-lg" style="background-color:white;" readonly>
                          </div>
                      </div>
                      <div class="col-lg-12">
                          <div class="form-group">
                              <label for="">Nominal Uang</label>
                              <input type="text" name="nominal" autofocus id="nominal" placeholder="Total Belanja" onkeyup="sum();" class="form-control input-lg" required>
                          </div>
                      </div>
                      <div class="col-lg-12">
                          <div class="form-group">
                              <label for="">Uang Kembali</label>
                              <input type="text" name="kembali" id="kembali" placeholder="Uang Kembali" class="form-control input-lg" required>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <button class="btn-lg btn-warning" id="RefreshPage" ACCESSKEY="v"><i class="fa fa-credit-card"></i> Cetak Nota !</button>
                            <small>*tekan ALT + V</small>
                          </div>
                      </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script>
   $('#RefreshPage').click(function() {
      location.reload();
   });
</script>