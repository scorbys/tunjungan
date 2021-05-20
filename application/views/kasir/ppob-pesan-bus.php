  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <?= $title ?>
        <small>KUD Tunjungan</small>
      </h1>
      <ol class="breadcrumb">
            <li><p><i class="fa fa-money"></i> <?= $title ?></p></li>
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
                            <h4><strong>Saldo PPOB : <?= rupiah($saldo) ?></strong></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <center><p><?php  echo $this->session->flashdata('message'); ?></p></center>
                <div class="user-block">
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="img/icon/icon_bus_02.png" class="img-circle" alt="Icon Kereta" style="box-shadow: 0 0 5px #2727273d;">
                            <span class="username">
                                <a><b>Terminal Cepu → Terminal Pulo Gadung</b></a>
                            </span>
                            <span class="description">Min, 14 Jan 2021 | 1 Dewasa</span>
                        </div>
                    </div>
                </div><hr>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="row">
                    <form action="" method="post">
                        <div class="col-lg-8">                        
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4><b>Data pemesan</b><span>(untuk e-tiket)</span></h4>
                                        </div>
                                    </div>
                                    <div class="box box-success box-train">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">Nama Lengkap</label>
                                                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <label for="">No. Telepon</label>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <input type="text" name="kode_area" class="form-control" placeholder="No. Telepon" value="+62" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-10">
                                                            <div class="form-group">
                                                                <input type="text" name="no_telp" class="form-control" placeholder="No. Telepon" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="">Email</label>
                                                        <input type="email" name="email" class="form-control" placeholder="Ex. alamatemail@domain.com" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="alert alert-warning" role="alert">Pastikan data pemesan sudah benar, karena e-tiket akan dikirim ke kontak tercantum.</div>
                                                </div>
                                            </div>
                                        </div>                        
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4><b>Data Penumpang</b></h4>
                                        </div>
                                    </div>
                                    <div class="box box-success box-train">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">Nama Lengkap</label>
                                                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                                                        <small>Sesuai KTP/paspor/lainnya</small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <label for="">Tipe Identitas</label>
                                                            <select name="tipe_identitas" class="form-control select2" style="width:100%">
                                                                <option value="ktp">KTP</option>
                                                                <option value="sim">SIM</option>
                                                                <option value="passport">Passpor</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="">Nomor Identitas <small>(Sesuai KTP/Paspor/Lainnya)</small></label>
                                                        <input type="text" name="id_identitas" class="form-control" placeholder="Nomor Identitas" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                        
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </form>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4><b>Detail perjalanan</b></h4>
                            </div>
                        </div>
                        <div class="box box-success box-train">
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <h4>Sinar Jaya</h4>
                                            <small>Ekonomi (E)</small>
                                            <h4><b>Terminal Cepu → Terminal Pulo Gadung</b></h4>
                                            <p>Jum, 15 Jan 2021 • 07:50 - 10:55</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box box-success box-train">
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <h4>Total</h4>
                                        </div>
                                        <div class="col-lg-6">
                                            <h4 class="text-danger"><b>Rp. 110.000,00</b></h4>
                                        </div>
                                    </div><hr>
                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <p>Cepu → P. Gadung</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p>Rp. 100.000,00</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p>Biaya Admin</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p>Rp. 10.000,00</p>
                                        </div>
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