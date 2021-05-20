<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="admin/home" class="logo">    
                <span class="logo-lg"><img src="img/logo-koperasi.png" width="40" style="margin-bottom: 2px;"> <b><small>KUD TUNJUNGAN</small></b></span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" id="navigasi" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="<?= base_url('login/logout') ?>" onClick='return confirm("Apakah anda yakin akan keluar dari sistem ?")'>
                                <i class="fa fa-sign-out"></i> Keluar
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <?php foreach($this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result() as $a) : ?>
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="img/<?= $a->image ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <a href="<?= base_url('admin/akun') ?>" style="font-size: 13px;"><?= $a->nama ?></a>
                        <p style="padding-top: 5px; font-size: 12px;"><i class="fa fa-circle text-success"></i> Admin KUD Tunjungan</p>
                    </div>
                </div>
                <?php endforeach ?>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">DAFTAR MENU</li>
                    <li <?php if($title == "Beranda"){ ?>class="active"<?php } ?>><a href="admin/produk/ppob"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
                    <li <?php if($title == "Notifikasi Aplikasi"){ ?>class="active"<?php } ?>><a href="admin/notifikasi"><i class="fa fa-bell"></i><span>Notifikasi Aplikasi</span></a></li>
                    <li <?php if($title == "Promo"){ ?>class="active"<?php } ?>><a href="admin/promo"><i class="fa fa-image"></i><span>Promo</span></a></li>
                    <li <?php if($title == "Data Agen PPOB"){ ?>class="active"<?php } ?>><a href="admin/agen"><i class="fa fa-users"></i> <span>Data Agen PPOB</span></a></li>
                    <li <?php if($title == "Data Produk PPOB"){ ?>class="active"<?php } ?>><a href="admin/produk/ppob"><i class="fa fa-file-text"></i> <span>Data Produk PPOB</span></a></li>
                    <li class="treeview <?php if($title == "Data Produk" || $title == "Banner Promo" || $title == "Data Kategori" || $title == "Pembelian Produk" || $title == 'Data Stokis' || $title == 'Penerimaan Pembelian' || $title == 'Retur Produk'|| $title == 'Data Log Produk'){ echo 'active'; } ?>">
                        <a href="#">
                            <i class="fa fa-image"></i> <span>Produk</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php if($title == "Data Produk"){ ?>class="active"<?php } ?>><a href="admin/produk"><i class="fa fa-circle-o"></i>Data Produk</a></li>
                            <li <?php if($title == "Data Kategori"){ ?>class="active"<?php } ?>><a href="admin/kategori"><i class="fa fa-circle-o"></i>Data Kategori</a></li>
                            <li <?php if($title == "Pembelian Produk" || $title == 'Penerimaan Pembelian'){ ?>class="active"<?php } ?>><a href="admin/pembelian"><i class="fa fa-circle-o"></i>Pembelian Produk</a></li>
                            <li <?php if($title == "Data Stokis"){ ?>class="active"<?php } ?>><a href="admin/supplier"><i class="fa fa-circle-o"></i>Stokis Produk</a></li>
                            <li <?php if($title == "Retur Produk"){ ?>class="active"<?php } ?>><a href="admin/retur"><i class="fa fa-circle-o"></i>Retur Produk</a></li>
                            <li <?php if($title == "Banner Promo"){ ?>class="active"<?php } ?>><a href="admin/banner"><i class="fa fa-circle-o"></i>Banner Promo</a></li>
                            <li <?php if($title == "Data Log Produk"){ ?>class="active"<?php } ?>><a href="admin/Logproduk"><i class="fa fa-circle-o"></i>Log Produk</a></li>
                        </ul>
                    </li>
                    <li class="treeview <?php if($title == "Penjualan Kasir Harian" || $title == "Penjualan Grosir" || $title == "Penjualan TerLaris/Bln"){ echo 'active'; } ?>">
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i> <span>Penjualan</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php if($title == "Penjualan Kasir Harian"){ ?>class="active"<?php } ?>><a href="admin/penjualan/kasir"><i class="fa fa-circle-o"></i>Penjualan Kasir Harian</a></li>
                            <li <?php if($title == "Penjualan Produk Grosir"){ ?>class="active"<?php } ?>><a href="admin/penjualan/grosir"><i class="fa fa-circle-o"></i>Penjualan Grosir</a></li>
                            <li <?php if($title == "Penjualan TerLaris/Bln"){ ?>class="active"<?php } ?>><a href="admin/penjualan/kasirTerlaris"><i class="fa fa-circle-o"></i>Penjualan TerLaris/Bln</a></li>
                        </ul>
                    </li>
                    <li class="treeview <?php if($title == "Data Kabupaten" || $title == "Data Kecamatan" || $title == "Data Desa"){ echo 'active'; } ?>">
                        <a href="#">
                            <i class="fa fa-map-pin"></i> <span>Data Wilayah</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php if($title == "Data Kabupaten"){ ?>class="active"<?php } ?>><a href="admin/wilayah/kabupaten"><i class="fa fa-circle-o"></i> Data Kabupaten</a></li>
                            <li <?php if($title == "Data Kecamatan"){ ?>class="active"<?php } ?>><a href="admin/wilayah/kecamatan"><i class="fa fa-circle-o"></i> Data Kecamatan</a></li>
                            <li <?php if($title == "Data Desa"){ ?>class="active"<?php } ?>><a href="admin/wilayah/desa"><i class="fa fa-circle-o"></i> Data Desa</a></li>
                        </ul>
                    </li>
                    <!--<li <?php if($title == "Data Ongkir"){ ?>class="active"<?php } ?>><a href="admin/ongkir"><i class="fa fa-truck"></i> <span>Data Ongkir</span></a></li>
                    <li <?php if($title == "Tentang KUD Tunjungan"){ ?>class="active"<?php } ?>><a href="admin/about"><i class="fa fa-gear"></i> <span>Tentang KUD Tunjungan</span></a></li>-->
                    <li <?php if($title == "Akun"){ ?>class="active"<?php } ?>><a href="admin/akun"><i class="fa fa-gears"></i> <span>Akun</span></a></li>
                </ul>
            </section>
        </aside>