<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
    <header class="main-header">
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="<?= base_url() ?>kasir/home" class="navbar-brand"><b>KUD Tunjungan</b></a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown <?php if($title == 'Data Pembayaran'){ echo 'active'; } ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pembayaran <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?= base_url() ?>kasir/transaksi/baru">Konfirmasi Pembayaran</a></li>
                                <li class="divider"></li>
                                <li><a href="<?= base_url() ?>kasir/transaksi/saldo">Pembayaran Simpanan</a></li>
                            </ul>
                        </li>
                        <li class="dropdown <?php if($title == 'Data Transaksi'){ echo 'active'; } ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Simpanan Anggota <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?= base_url() ?>kasir/transaksi">Transaksi Simpanan</a></li>
                                <li class="divider"></li>
                                <li><a href="<?= base_url() ?>kasir/pengambilan">Pengambilan Sukarela</a></li>
                            </ul>
                        </li>
                        <!-- <li><a href="kasir/anggota">Data Anggota</a></li> -->
                        <li class="dropdown <?php if($title == 'Data Penjualan'){ echo 'active'; } ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Penjualan <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?= base_url() ?>kasir/home">Penjualan Kasir</a></li>
                                <li class="divider"></li>
                                <li><a href="<?= base_url() ?>kasir/penjualan/riwayat">Riwayat Transaksi</a></li>
                            </ul>
                        </li>
                        <li class="dropdown <?php if($title == 'PPOB'){ echo 'active'; } ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">PPOB <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?= base_url() ?>kasir/ppob">Menu PPOB</a></li>
                                <li class="divider"></li>
                                <li><a href="<?= base_url() ?>kasir/ppob/riwayat">Riwayat Transaksi PPOB</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <?php foreach($this->m_akun->cek_admin($this->session->userdata('tunjungan@id_user'))->result() as $a) : ?>
                        <li class="dropdown user user-menu">
                            <a href="<?= base_url() ?>kasir/akun">
                                <img src="<?= base_url() ?>img/<?= $a->image ?>" class="user-image">
                                <span class="hidden-xs"><?= $a->nama ?></span>
                            </a>
                        </li>
                        <?php endforeach ?>
                        <li class="tasks-menu">
                            <a href="<?= base_url() ?>login/logout" title="Keluar" onClick='return confirm("Apakah anda yakin akan keluar dari sistem ?")'>
                                <i class="fa fa-sign-out"></i>
                                <span class="hidden-xs">Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>