<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('css/azzara.min.css')?>">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<form action="<?= base_url('admin/login/post/') ?>" method="POST">
				<h3 class="text-center">Sign In To Pamper Me Admin</h3>
				<div class="login-form">
					<div class="form-group">
						<label for="username" class="placeholder"><b>Username</b></label>
						<input id="username" name="username" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="password" class="placeholder"><b>Password</b></label>
						<div class="position-relative">
							<input id="password" name="password" type="password" class="form-control" required>
							<div class="show-password">
								<i class="flaticon-interface"></i>
							</div>
						</div>
					</div>
					<div class="form-group form-action-d-flex mb-3">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="rememberme">
						</div>
						<button type="submit" class="btn btn-primary col-md-5 float-right mt-3 mt-sm-0 fw-bold">Sign In</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<script src="<?php echo base_url('js/core/jquery.3.2.1.min.js')?>"></script>
	<script src="<?php echo base_url('js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')?>"></script>
	<script src="<?php echo base_url('js/core/popper.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/core/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('js/ready.js')?>"></script>
</body>
</html>