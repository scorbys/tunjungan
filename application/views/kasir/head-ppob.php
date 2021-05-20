<?php
    function tanggal_indo($tanggal){
        $aulan  = array (1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
                );
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $aulan[ (int)$split[1] ] . ' ' . $split[0];
    }

    function rupiah($angka){    
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah; 
    }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TUNJUNGAN | <?= $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->  
  <link rel="shortcut icon" href="<?= base_url() ?>img/logo-koperasi.png" />
  <style rel="stylesheet">
    #scroll{
      overflow-x: scroll;
    }
    
    .nominal{      
      margin: 0;
      vertical-align: middle;
      margin-bottom: 30px;
    }
    .btn-ppob{
      border: 1.5px solid #cecece;
      color: grey;
      padding-top:10px;
    }

    .menu-ppob p{
      font-weight: 500;
      font-size: 12px;
      color: black;
      line-height: 15px;
    }
    .menu-ppob p:hover{
      color: green;
      font-weight: 500;
    }
    .btn-ppob p{
      line-height: 10px;
    }
    .btn-ppob:hover{
      border: 1.5px solid green;
      background-color: #f9f9f9;
      color: black;
    }
    .btn-ppob-active{
      border: 1.5px solid green;
      background-color: #f9f9f9;
      color: black;
      padding-top:10px;
    }
    .menu-ppob-active p{
      font-weight: 500;
      font-size: 12px;
      color: black;
      line-height: 15px;
    }

    .btn-ppob-active p{
      line-height: 10px;
    }
    .ket-ppob{
      border: 1.5px solid green;
      margin-top: 10px;
      background-color: #cff5d5;
      color: #777;
    }
    #nav-ppob.active{
      border-top-color: #00a13a;
    }
    .notelp {
      background-color: white;
      background-repeat: no-repeat;
      background-size: auto 20px;
      background-position: 99% 50%;
    }

    .box-train{
      border-left: 1px solid #2727273d;
      border-right: 1px solid #2727273d;
      border-bottom: 1px solid #2727273d;
    }
  </style>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.0/css/ionicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/css/style.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/jquery-ui.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/css/skins/skin-template.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/iCheck/all.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/bootstrap-slider/slider.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400&display=swap" rel="stylesheet">
</head>