<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Verifikasi Transaksi<small> KUD Tunjungan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-edit"></i> Verifikasi Transaksi</a></li>
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
                            <h4><strong><?= tanggal_indo(date('Y-m-d')) ?></strong></h4>
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
                        <h2 class="box-title"><b><i class="fa fa-edit"></i> Verifikasi Transaksi</b></h2>
                    </div>
                    <div class="box-body">
                        <table id="example3" class="display compact" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>File Transaksi</th>
                                    <th>No. Anggota</th>
                                    <th>Nama Anggota</th>
                                    <th>Nomminal</th>
                                    <th>Status Verifikasi</th>
                                    <th>Tgl. Verifikasi</th>
                                    <th>Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($verifikasi as $a) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><a href="img/<?= $a->file ?>" target="_blank"><img src="img/<?= $a->file ?>" alt="<?= $a->nama ?>" height="100"></a></td>
                                    <td><?= $a->no_anggota ?></td>
                                    <td><?= $a->nama ?></td>
                                    <td><?= rupiah($a->nominal) ?></td>
                                    <td>
                                        <?php if($a->verif == 'N'){
                                            echo '<span class="label bg-yellow">Belum diverifikasi</span>';
                                        }else if($a->verif == 'Y'){
                                            echo '<span class="label bg-green">Terverifikasi</span>';
                                        }else{
                                            echo '<span class="label bg-red">Transaksi ditolak</span>';
                                        }?>
                                    </td>
                                    <td><?= $a->tgl ?></td>
                                    <td>
                                        <b>
                                            <?php if($a->simpanan == 'Simpanan Wajib'){
                                                echo '<p class="text-green">'.$a->simpanan.'</p>';
                                            }elseif($a->simpanan == 'Simpanan Sukarela'){                                            
                                                echo '<p class="text-red">'.$a->simpanan.'</p>';
                                            }else{
                                                echo '<p class="text-purple">'.$a->simpanan.'</p>';
                                            } ?>
                                        </b>
                                    </td>
                                    <td>
                                        <?php if($a->verif == 'N'){ ?>
                                        <a href="keanggotaan/transaksi/aksi_verifikasi/<?= $a->id ?>" class="btn btn-warning" onClick='return confirm("Apakah anda yakin akan melakukan verifikasi untuk transaksi ini ?")' title="Verifikasi Transaksi"><i class="fa fa-check-square"></i></a>
                                        <a href="keanggotaan/transaksi/tolak/<?= $a->id ?>" class="btn btn-danger" onClick='return confirm("Apakah anda yakin akan menolak verifikasi untuk transaksi ini ?")' title="Tolak Transaksi"><i class="fa fa-times"></i></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>  
</div>