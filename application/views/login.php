<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kopranesia | Login Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="<?= base_url() ?>"/>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="img/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="template/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="template/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="template/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="login/auth" method="post" class="login100-form validate-form">
                    <center><p><?php  echo $this->session->flashdata('message'); ?></p></center>
					<span class="login100-form-title p-b-30">
						<img src="img/logo.png" alt="" width="60">
					</span>
					<center><b><h5>Welcome to Kopranesia</h5></b></center><br>

					<div class="wrap-input100">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

                    <div class="wrap-input100">
                        <select name="level" class="input100">
                            <option value="1">Admin</option>
                            <option value="2">Bendahara / Keanggotaan</option>
                            <option value="3">Kasir</option>
                        </select>
                    </div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="template/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="template/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="template/login/vendor/bootstrap/js/popper.js"></script>
	<script src="template/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="template/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="template/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="template/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="template/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="template/login/js/main.js"></script>

    <script>
        window.setTimeout(function() { 
            $(".alert-danger").fadeTo(500, 0).slideUp(500,
            function(){ 
                $(this).remove(); 
            }); 
        }, 2000);
    </script>
</body>
</html>