  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <?= $title ?>
        <small>KUD Tunjungan</small>
      </h1>
      <ol class="breadcrumb">
            <li><p><i class="fa fa-home"></i> <?= $title ?></p></li>
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
        <div class="col-md-3">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-database"></i> Jumlah Transaksi Masuk</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <center><b><h3><?= $this->db->query("SELECT * FROM tbl_transaksi WHERE id_admin = '$id_kasir' AND SUBSTR(tgl_transaksi,1,10) = date(now())")->num_rows(); ?> Transaksi</h3></b></center>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="box box-danger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-money"></i> Juml. Simpanan Sukarela Today</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <center><b><h3><?= rupiah($this->db->query("SELECT SUM(nominal) AS nominal FROM tbl_sim_sukarela WHERE id_admin = '$id_kasir' AND SUBSTR(tanggal,1,10) = date(now())")->row()->nominal) ?></h3></b></center>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-users"></i> Jumlah Anggota</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <center><b><h3><?= $this->db->query("SELECT * FROM tbl_user")->num_rows() ?> Anggota</h3></b></center>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-file-text"></i> Jumlah Transaksi Anda</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <center><b><h3><?= rupiah($this->db->query("SELECT SUM(harga_total) AS harga_total FROM tbl_transaksi WHERE id_admin = '$id_kasir' AND SUBSTR(tbl_transaksi.tgl_transaksi,1,10) = date(now())")->row()->harga_total) ?></h3></b></center>
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
                <h2 class="box-title"><b><i class="fa fa-list-ol"></i> Daftar Produk Yang Dibeli</b></h2>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="40">No</th>
                      <th>Barcode</th>
                      <th>Foto Produk</th>
                      <th>Nama Produk</th>
                      <th width="70">Qty</th>
                      <th>Harga</th>
                      <th>Subtotal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($this->cart->contents() as $a) : ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $a['barcode'] ?></td>
                        <td><img src="img/<?= $a['image'] ?>" width="100"></td>
                        <td><?= $a['name'].'<br><small>'.$a['deskripsi'].'</small>' ?></td>
                        <td>
                          <form action="kasir/home/update/cart" method="post">
                            <input type="hidden" name="rowid" value="<?= $a['rowid'] ?>">
                            <input type="number" class="form-control" name="qty" min="0" id="jumlah" value="<?= $a['qty'] ?>" onchange="this.form.submit();">
                          </form>
                        </td>
                        <td><?= $a['price'] ?></td>
                        <td><p id="harga"><?= $a['price']*$a['qty'] ?></p></td>
                        <td>
                          <a href="kasir/home/remove/<?= $a['rowid'] ?>" class="btn btn-danger" title="Hapus Data"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>                      
                    <?php endforeach ?>
                  </tbody>
                  <tfoot>
                      <tr>
                        <td colspan="6" style="text-align:right;">Total Belanja</td>
                        <td colspan="2" class="text-danger"><b><?= rupiah($this->cart->total()); ?></b></td>
                      </tr>
                  </tfoot>
                </table><hr>
                <?php if(count($this->cart->contents()) > 0){ ?>
                <a href="kasir/home/batal"  ACCESSKEY="a" class="btn btn-danger"  onClick='return confirm("Apakah anda yakin akan membatalkan transaksi ini ?")'><i class="fa fa-times"></i> Batalkan Transaksi Ini</a>
                <small>*tekan ALT + A</small>
                <div class="pull-right">
                    <small>*tekan ALT + X</small>
                    <a href="kasir/home/transaksi" ACCESSKEY="x" class="btn btn-warning"><i class="fa fa-shopping-cart"></i> Lanjutkan Transaksi</a>
                </div>
                <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-md-4">                
          <div class="box">
            <div class="box-header with-border">
                <h2 class="box-title"><b><i class="fa fa-plus-square"></i> Transaksi Baru</b></h2>
            </div>
            <div class="box-body">
              <form action="kasir/home/cart" method="post">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="form-group">
                              <label FOR="barcode" ACCESSKEY="Q">Kode Produk / Kode Promo</label>
                              <input type="text" name="barcode" placeholder="Tekan Tombol ALT+Q" id="barcode" onchange="this.form.submit();" class="form-control" autofocus required>
                          </div>
                      </div>
                      <div class="col-lg-12">
                          <div class="form-group">
                              <label for="nama_produk" ACCESSKEY="W">Nama Produk</label>
                              <input type="text" name="nama_produk" id="nama_produk" class="form-control" onchange="this.form.submit();" placeholder="Tekan Tombol ALT+W">
                              <input type="hidden" name="foto">
                              <input type="hidden" name="id_produk">
                              <input type="hidden" name="poin">
                              <input type="hidden" name="deskripsi">
                              <input type="hidden" name="diskon">
                          </div>
                      </div>
                      <div class="col-lg-12">
                          <div class="form-group">
                              <label for="">Harga Produk</label>
                              <input type="text" name="harga" class="form-control" placeholder="Harga Produk" readonly>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <button class="btn btn-success" ACCESSKEY="c" name="masukkeranjang"><i class="fa fa-plus-square"></i> Tambah Produk</button>
                            <small>*tekan ALT + C</small>
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