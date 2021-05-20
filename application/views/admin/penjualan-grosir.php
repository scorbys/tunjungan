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
      <div class="col-md-12">                
          <div class="box">
              <div class="box-header with-border">
                  <h2 class="box-title"><b><i class="fa fa-shopping-cart"></i> Penjualan Produk Grosir</b></h2>
              </div><hr>
              <div class="box-body">
                  <form action="admin/penjualan/aksi_grosir" method="post">
                      <div class="row">
                          <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="form-group has-error">
                                    <label>No. Anggota</label>
                                    <input type="text" class="form-control" name="no_anggota" id="no_anggota" value="<?= $no_anggota ?>" placeholder="No. Anggota" required>
                                    <input type="hidden" name="id_user" value="<?= $id_user ?>">
                              </div>
                          </div>
                          <div class="col-md-2 col-sm-12 col-xs-12">
                              <div class="form-group">
                                    <label>Tanggal Invoice</label>
                                    <input type="date" class="form-control" name="tgl_beli" value="<?= date('Y-m-d') ?>" readonly>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-12 col-xs-12">
                              <div class="form-group">
                                  <label>Operator</label>
                                    <input type="text" class="form-control" name="operator" id="operator" readonly="" value="<?= $nama_admin ?>">
                              </div>
                          </div>
                          <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="form-group">
                                    <label>Nama Anggota</label>
                                    <input type="text" class="form-control" name="nama_anggota" value="<?= $nama_anggota ?>" placeholder="Nama Anggota" readonly>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-12 col-xs-12">
                              <div class="form-group has-error">
                                    <label>Pilih Metode Pembayaran</label>
                                    <select name="id_pembayaran" class="form-control" required>
                                        <option value="3">Tunai</option>
                                    </select>
                              </div>
                          </div>
                          <div class="col-md-2 col-sm-12 col-xs-12">
                              <div class="form-group">
                                    <label>Tanggal Pembayaran</label>
                                    <input type="date" class="form-control" name="tgl_beli" value="<?= date('Y-m-d') ?>" readonly>
                              </div>
                          </div>
                      </div><hr>
                      <div class="row">
                          <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="form-group has-error">
                                  <label>Barcode</label>                                          
                                      <input type="hidden" name="id_produk">
                                      <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Barcode Produk" autofocus required>
                              </div>
                              <div class="form-group">
                                  <label>Nama Produk</label>
                                    <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk" readonly>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Harga Jual Grosir</label>
                                            <input type="text" class="form-control" name="harga_grosir" id="hargaitembeli" placeholder="Harga Jual" onkeydown="return numbersonly(this, event);" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Qty</label>
                                        <input type="number" class="form-control" name="jumlah" id="qtybeli" value="" min="1">
                                    </div><hr>
                                <div class="form-group">
                                    <button name="tambah_grosir" class="btn btn-success pull-right"><i class="fa fa-shopping-cart"></i> Tambah Produk</button>
                                </div>
                            </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
      <div class="col-lg-12">                
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="box box-default"  style="padding:10px">
                      <div class="x_title">
                          <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                          <table id="example1" width="100%" class="table table-striped table-bordered">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Barcode</th>
                                      <th>Nama Item</th>
                                      <th>Harga Grosir</th>
                                      <th>Qty</th>
                                      <th>Subtotal</th>
                                      <th>Opsi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php $no = 1; $jumlahnya = 0; if($jumlah_detail > 0){
                                    foreach($detail as $a) :
                                    $jumlahnya += $a->harga*$a->jumlah;  ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $a->barcode ?></td>
                                        <td><?= $a->nama_produk ?></td>
                                        <td><?= rupiah($a->harga) ?></td>
                                        <td width="40">
                                            <form action="admin/penjualan/edit/grosir" method="post">
                                                <input type="hidden" name="id" value="<?= $a->id ?>">
                                                <input type="number" class="form-control" name="qty" min="1" id="jumlah" value="<?= $a->jumlah ?>" onchange="this.form.submit();">
                                            </form>
                                        </td>
                                        <td><?= rupiah($a->harga*$a->jumlah) ?></td>
                                        <td>
                                            <a href="admin/penjualan/hapus/grosir/<?= $a->id ?> " class="btn btn-danger" onClick='return confirm("Apakah anda yakin akan menghapus data ini ?")'><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php 
                                    endforeach;
                                } ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-5">
                  <div class="box box-default">
                      <p class="text-danger" style="padding:10px;"><i><b>Note : </b>Data pembelian tidak dapat diubah kembali jika sudah disimpan.</i></p>
                  </div>
              </div>
              <div class="col-md-7 col-sm-6 col-xs-12">
                  <div class="box box-default"  style="padding:10px">
                      <div class="x_title">
                          <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                          <div class="row">
                              <div class="col-md-4 col-sm-12 col-xs-12">
                                  <h1><b>TOTAL (Rp)</b></h1>
                              </div>
                              <div class="col-md-8 col-sm-12 col-xs-12">
                                  <input type="hidden" class="form-control" name="totalbeli" id="totalbeli">
                                  <h1 class="text-danger pull-right" id="grandtotalbeli"><b><?= rupiah($jumlahnya); ?></b></h1>
                              </div>
                          </div><hr>
                          <div class="row">
                              <div class="col-lg-12">
                                  <a href="admin/penjualan/auth/<?= $this->session->userdata('id_transaksi') ?>" class="btn btn-warning pull-right"  onClick='return confirm("Apakah anda yakin, data penjualan tidak bisa diubah kembali ?")'><i class="fa fa-save"></i> Cetak Penjualan</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </section>  
</div>