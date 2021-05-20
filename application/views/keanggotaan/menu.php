<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
    <header class="main-header">
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="keanggotaan/home" class="navbar-brand"><b>KUD Tunjungan</b></a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown <?php if($title == 'Data Anggota & Pengguna'){ echo 'active'; } ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Anggota & Pengguna <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="keanggotaan/anggota">Data Anggota</a></li>
                                <li class="divider"></li>
                                <li><a href="keanggotaan/pengguna">Data Hak Akses Sistem</a></li>
                            </ul>
                        </li>
                        <li class="dropdown <?php if($title == 'Data Transaksi'){ echo 'active'; } ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Simpanan <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="keanggotaan/transaksi">Transaksi Simpanan</a></li>
                                <li class="divider"></li>
                                <li><a href="keanggotaan/transaksi/verifikasi">Verifikasi Transaksi</a></li>
                                <li class="divider"></li>
                                <li><a href="keanggotaan/transaksi/riwayat">Riwayat Transaksi</a></li>
                            </ul>
                        </li>
                        <li class="dropdown <?php if($title == 'Data Pengambilan'){ echo 'active'; } ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pengambilan Simpanan <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="keanggotaan/pengambilan">Pengambilan Sukarela</a></li>
                                <li class="divider"></li>
                                <li><a href="keanggotaan/pengambilan/riwayat">Riwayat Pengambilan</a></li>
                            </ul>
                        </li>
                        <li class="dropdown <?php if($title == 'Data Laporan'){ echo 'active'; } ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="keanggotaan/laporan/simpanan">Rekap Simpanan Anggota</a></li>
                                <li class="divider"></li>
                                <li><a href="keanggotaan/shu">Data SHU</a></li>
                                <li class="divider"></li>
                                <li><a href="keanggotaan/shu/laporan">Rekap Laporan SHU</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <?php foreach($this->m_akun->cek_admin($this->session->userdata('kopranesia@id_user'))->result() as $a) : ?>
                        <li class="dropdown user user-menu">
                            <a href="keanggotaan/akun">
                                <img src="img/<?= $a->image ?>" class="user-image">
                                <span class="hidden-xs"><?= $a->nama ?></span>
                            </a>
                        </li>
                        <?php endforeach ?>
                        <li class="tasks-menu">
                            <a href="login/logout" title="Keluar" onClick='return confirm("Apakah anda yakin akan keluar dari sistem ?")'>
                                <i class="fa fa-sign-out"></i>
                                <span class="hidden-xs">Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>