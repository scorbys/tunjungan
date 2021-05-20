<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <base href="<?= base_url() ?>"/>

		<title>KUD TUNJUNGAN</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="img/logo-koperasi.png"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<link rel="stylesheet" href="template/assets/dist/css/AdminLTE.css">

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

	</head>
	<body class="hold-transition login-pager" style="background: linear-gradient(to top, #0562589e 0%, #0562589e 100%) no-repeat center center fixed;">

		<div class="login-box">
			<div class="login-logo">
				<a href="" class=""><img src="<?php echo base_url() . 'img/logo-koperasi.png'; ?>" width="100" class="img-responsive center-block"/></a>
				<a href="" style="color:white;"><b>KUD TUNJUNGAN</b></a>
			</div>
			<center><p><?php echo $this->session->flashdata('message'); ?></p></center>
			<div class="login-box-body">
				<p class="login-box-msg">Silahkan melakukan login dengan username dan password berlaku</p>
				<form action="login/auth" method="post">
					<div class="form-group has-feedback">
						<div class="form-group">
							<label>ID User</label>
							<input type="text" name="username" pattern="[A-Za-z 0-9]+" class="form-control" placeholder="ID User">
						</div>
						<div class="form-group">
							<label>Kata Sandi</label>
							<input type="password" name="password" pattern="[A-Za-z 0-9]+" class="form-control" placeholder="Kata Sandi">
						</div>
						<!-- <div class="form-group">
							<label>Login Sebagai</label>
							<select class="form-control" name="id_level">
								<option value="1">Admin</option>
								<option value="3">Bendahara / Keanggotaan</option>
								<option value="2">Kasir</option>
							</select>
						</div> -->
						<button class="btn btn-success btn-block">Masuk</button>
					</div>
				</form>
			</div>
		</div>

	</body>
	
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

	<script src="template/bootstrap/dist/js/bootstrap.min.js"></script>

	<script>
		window.setTimeout(function() { 
			$(".alert-danger").fadeTo(500, 0).slideUp(500,
			function(){ 
				$(this).remove(); 
			}); 
		}, 2000);
	</script>
</html>