<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/admin/assets/images/logo_min.png'); ?>">

	<title>ExKost</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>"/>

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/slick.css'); ?>"/>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/slick-theme.css'); ?>"/>

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/nouislider.min.css'); ?>"/>

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"/>

	<link href="<?php echo base_url('assets/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css'); ?>" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">

			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="<?php echo base_url('Main'); ?>" class="logo">
									<img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Login</h3>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="login">
							<p>Masuk ke <strong>EXKOST</strong></p>
							<?php
							if (isset($regisSukses)) {
								echo "Registrasi Berhasil";
							}
							if (isset($login)) {
								echo "Email atau Password Salah!!";
							}
							 ?>
							<form class="" action="prosesLogin" method="post">
								<input class="input" type="email" placeholder="Masukkan Email" name="email" required>
                <input class="input" type="password" placeholder="Masukkan Password" name="password" required>
								<button class="primary-btn">Masuk</button>
                <a href="lupa_password">Lupa password</a>
							</form>
              <a href="register">Belum punya akun?</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<footer id="footer">
		  <!-- top footer -->
		  <div class="section">
		    <!-- container -->
		    <div class="container">
		      <!-- row -->
		      <div class="row">
		        <div class="col-md-3 col-xs-6">
		          <div class="footer">
		            <h3 class="footer-title">Tentang Kami</h3>
		            <p>Penyedia layanan platform pelelangan barang kost.</p>
		            <ul class="footer-links">
		              <li><a href="#"><i class="fa fa-map-marker"></i>MIF-JTI, POLIJE</a></li>
		              <li><a href="#"><i class="fa fa-phone"></i>+6282234885169</a></li>
		              <li><a href="#"><i class="fa fa-envelope-o"></i>exkost@gmail.com</a></li>
		            </ul>
		          </div>
		        </div>

		        <div class="clearfix visible-xs"></div>

		        <div class="col-md-3 col-xs-6">
		          <div class="footer">
		            <h3 class="footer-title">Informasi</h3>
		            <ul class="footer-links">
		              <li><a href="#">Tentang Kami</a></li>
		              <li><a href="#">Kontak Kami</a></li>
		              <li><a href="#">Privacy Policy</a></li>
		              <li><a href="#">Terms & Conditions</a></li>
		            </ul>
		          </div>
		        </div>

		        <div class="col-md-3 col-xs-6">
		          <div class="footer">
		            <h3 class="footer-title">Servis</h3>
		            <ul class="footer-links">
		              <li><a href="#">Bantuan</a></li>
		            </ul>
		          </div>
		        </div>
		      </div>
		      <!-- /row -->
		    </div>
		    <!-- /container -->
		  </div>
		  <!-- /top footer -->

		  <!-- bottom footer -->
		  <div id="bottom-footer" class="section">
		    <div class="container">
		      <!-- row -->
		      <div class="row">
		        <div class="col-md-12 text-center">
		          <ul class="footer-payments">
		            <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
		            <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
		            <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
		            <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
		            <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
		            <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
		          </ul>
		          <span class="copyright">
		            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
		            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made by <a href="#" target="_blank">Decode</a>
		          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
		          </span>
		        </div>
		      </div>
		        <!-- /row -->
		    </div>
		    <!-- /container -->
		  </div>
		  <!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->


		<!-- jQuery Plugins -->
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/slick.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/nouislider.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.zoom.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>

	</body>
</html>
