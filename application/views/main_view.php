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

						<!-- SEARCH BAR -->
	          <div class="col-md-6">
	            <div class="header-search">
	              <form method="post" name="fskey" action="<?php echo base_url('Cari/keyword'); ?>">
	                <input type="hidden" name="min" value="0">
	                <input type="hidden" name="max" value="5000000">
	                <input type="hidden" name="sort" value="4">
	                <input type="hidden" name="checkall" value="checkall">
	                <input class="input" type="text" name="key" placeholder="Isi Pencarian" <?php if (isset($keyword)) {
	                  echo "value='".$keyword."'";
	                } ?>required oninvalid="this.setCustomValidity('Masukkan kata kunci')" oninput="setCustomValidity('')">
	                <button class="search-btn"><i class="fa fa-search"></i></button>
	              </form>
	            </div>
	          </div>
	          <!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="Main/login">
										<i class="fa fa-sign-in"></i>
										<span>Login</span>
									</a>
								</div>
								<!-- /Wishlist -->
								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
		  <!-- container -->
		  <div class="container">
		    <!-- responsive-nav -->
		    <div id="responsive-nav">
		      <!-- NAV -->
		      <form method="post" name="fnew" action="<?php echo base_url('Cari/hasil'); ?>">
		        <input type="hidden" name="min" value="0">
		        <input type="hidden" name="max" value="5000000">
		        <input type="hidden" name="sort" value="0">
		        <input type="hidden" name="checkall" value="checkall">
		      </form>
		      <?php
		      foreach ($jenlimbar as $formlimbar) {
		      ?>
		      <form method="post" name="f<?php echo $formlimbar->nama_jenis_barang; ?>" action="<?php echo base_url('Cari/hasil'); ?>">
		        <input type="hidden" name="min" value="0">
		        <input type="hidden" name="max" value="5000000">
		        <input type="hidden" name="sort" value="0">
		        <input type="hidden" name="kategori[]" value="<?php echo $formlimbar->id_jenis_barang; ?>">
		      </form>
		      <?php
		      }
		       ?>
		      <ul class="main-nav nav navbar-nav">
		        <li class="active"><a href="<?php echo base_url('Home'); ?>">Home</a></li>
		        <li><a href="#" onclick="document.forms['fnew'].submit(); return false;">New</a></li>
		        <?php
		        foreach ($jenlimbar as $kategolimbar) {
		        ?>
		        <li><a href="#" onclick="document.forms['f<?php echo $kategolimbar->nama_jenis_barang; ?>'].submit(); return false;"><?php echo $kategolimbar->nama_jenis_barang; ?></a></li>
		        <?php
		        }
		        ?>
		      </ul>
		      <!-- /NAV -->
		    </div>
		    <!-- /responsive-nav -->
		  </div>
		  <!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<?php
					foreach ($jenlimcol as $kategolimcol) {
					?>
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="<?php echo base_url('assets/img/shop01.png'); ?>" alt="">
							</div>
							<form method="post" name="f<?php echo $kategolimcol->nama_jenis_barang; ?>" action="<?php echo base_url('Cari/hasil'); ?>">
								<input type="hidden" name="min" value="0">
								<input type="hidden" name="max" value="5000000">
								<input type="hidden" name="sort" value="0">
								<input type="hidden" name="kategori[]" value="<?php echo $kategolimcol->id_jenis_barang; ?>">
							</form>
							<div class="shop-body">
								<h3>Kategori<br><?php echo $kategolimcol->nama_jenis_barang; ?></h3>
								<a href="#" onclick="document.forms['f<?php echo $kategolimcol->nama_jenis_barang; ?>'].submit(); return false;" class="cta-btn">Tawar Sekarang<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
					<?php
					}
					?>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Produk Terbaru</h3>
							<div class="section-nav">
								<form id="form_tn" method="post" name="form_tn" action="<?php echo base_url('Cari/hasil'); ?>">
									<input id="tnmin" type="hidden" name="min" value="0">
									<input id="tnmax" type="hidden" name="max" value="5000000">
									<input id="tnsort" type="hidden" name="sort" value="4">
									<input id="tncheck" type="hidden" name="checkall" value="checkall">
								</form>
								<ul class="section-tab-nav tab-nav">
									<li id="tabnavnew" class="active"><a data-toggle="tab" href="#tab1">Semua</a></li>
									<?php
									$knew=2;
									foreach ($jenlimnew as $kategolimnew) {
									?>
									<li><a data-toggle="tab" href="#tab<?php echo $knew; ?>"><?php echo $kategolimnew->nama_jenis_barang; ?></a></li>
									<?php
									$knew++;
									}
									?>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php
										foreach ($barang as $barnew) {
											if ($barnew->status_lelang=='berlangsung') {
										?>
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="<?php echo base_url('assets/barang/'.$barnew->nama_gambar_barang); ?>" alt="">
												<div class="product-label">
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo $barnew->nama_jenis_barang; ?></p>
												<h3 class="product-name"><a href="<?php echo base_url('Barang/index/'.$barnew->id_barang); ?>"><?php echo $barnew->nama_barang; ?></a></h3>
												<h4 class="product-price">Rp. <?php echo $barnew->harga_barang; ?></h4>
												<h4 class="product-category"><i class="fa fa-hourglass-half"></i> <?php echo $barnew->waktu_lelang; ?></h4>
											</div>
											<div class="add-to-cart">
												<a href="<?php echo base_url('Barang/index/'.$barnew->id_barang); ?>">
													<button class="add-to-cart-btn"><i class="fa fa-search"></i> lihat</button>
												</a>
											</div>
										</div>
										<!-- /product -->
										<?php
											}
										}
										?>
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<?php
								$new=2;
								foreach ($jenlimnew as $tabnew) {
								?>
								<div id="tab<?php echo $new; ?>" class="tab-pane">
									<div class="products-slick" data-nav="#slick-nav-<?php echo $new; ?>">
										<?php
										foreach ($barang as $barnew) {
											if ($barnew->nama_jenis_barang==$tabnew->nama_jenis_barang) {
												if ($barnew->status_lelang=='berlangsung') {
											?>
											<!-- product -->
											<div class="product">
												<div class="product-img">
													<img src="<?php echo base_url('assets/barang/'.$barnew->nama_gambar_barang); ?>" alt="">
													<div class="product-label">
														<span class="new">NEW</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category"><?php echo $barnew->nama_jenis_barang; ?></p>
													<h3 class="product-name"><a href="<?php echo base_url('Barang/index/'.$barnew->id_barang); ?>"><?php echo $barnew->nama_barang; ?></a></h3>
													<h4 class="product-price">Rp. <?php echo $barnew->harga_barang; ?></h4>
													<h4 class="product-category"><i class="fa fa-hourglass-half"></i> <?php echo $barnew->waktu_lelang; ?></h4>
												</div>
												<div class="add-to-cart">
													<a href="<?php echo base_url('Barang/index/'.$barnew->id_barang); ?>">
														<button class="add-to-cart-btn"><i class="fa fa-search"></i> lihat</button>
													</a>
												</div>
											</div>
											<!-- /product -->
											<?php
												}
											}
										}
										?>
									</div>
									<div id="slick-nav-<?php echo $new; ?>" class="products-slick-nav"></div>
								</div>
								<?php
								$new++;
								}
								?>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<div class="col-md-12">
			<div class="section-title">
				<div class="section-nav">
					<ul class="section-tab-nav tab-nav">
						<li class="active"><a href="#" onclick="document.forms['form_tn'].submit(); return false;">Selengkapnya</a></li>
						<li></li><li></li><li></li><li></li>
					</ul>
				</div>
			</div>
		</div>
		<br><br>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Pelelangan Paling Top</h3>
							<div class="section-nav">
								<form id="form_tn" method="post" name="form_tn" action="<?php echo base_url('Cari/hasil'); ?>">
									<input id="tnmin" type="hidden" name="min" value="0">
									<input id="tnmax" type="hidden" name="max" value="5000000">
									<input id="tnsort" type="hidden" name="sort" value="4">
									<input id="tncheck" type="hidden" name="checkall" value="checkall">
								</form>
								<ul class="section-tab-nav tab-nav">
									<li id="tabnavtop" class="active"><a data-toggle="tab" href="#tab11">Semua</a></li>
									<?php
									$ktop=12;
									foreach ($jenlimtop as $kategolimtop) {
									?>
									<li><a data-toggle="tab" href="#tab<?php echo $ktop; ?>"><?php echo $kategolimtop->nama_jenis_barang; ?></a></li>
									<?php
									$ktop++;
									}
									?>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab11" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-11">
										<?php
										foreach ($barang as $bartop) {
											if ($bartop->status_lelang=='berlangsung') {
										?>
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="<?php echo base_url('assets/barang/'.$bartop->nama_gambar_barang); ?>" alt="">
												<div class="product-label">
													<span class="sale">TOP</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo $bartop->nama_jenis_barang; ?></p>
												<h3 class="product-name"><a href="<?php echo base_url('Barang/index/'.$bartop->id_barang); ?>"><?php echo $bartop->nama_barang; ?></a></h3>
												<h4 class="product-price">Rp. <?php echo $bartop->harga_barang; ?></h4>
												<h4 class="product-category"><i class="fa fa-hourglass-half"></i> <?php echo $bartop->waktu_lelang; ?></h4>
											</div>
											<div class="add-to-cart">
												<a href="<?php echo base_url('Barang/index/'.$bartop->id_barang); ?>">
													<button class="add-to-cart-btn"><i class="fa fa-search"></i> lihat</button>
												</a>
											</div>
										</div>
										<!-- /product -->
										<?php
											}
										}
										?>
									</div>
									<div id="slick-nav-11" class="products-slick-nav"></div>
								</div>
								<?php
								$top=12;
								foreach ($jenlimtop as $tabtop) {
								?>
								<div id="tab<?php echo $top; ?>" class="tab-pane">
									<div class="products-slick" data-nav="#slick-nav-<?php echo $top; ?>">
										<?php
										foreach ($barang as $bartop) {
											if ($bartop->nama_jenis_barang==$tabtop->nama_jenis_barang) {
												if ($bartop->status_lelang=='berlangsung') {
											?>
											<!-- product -->
											<div class="product">
												<div class="product-img">
													<img src="<?php echo base_url('assets/barang/'.$bartop->nama_gambar_barang); ?>" alt="">
													<div class="product-label">
														<span class="sale">TOP</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category"><?php echo $bartop->nama_jenis_barang; ?></p>
													<h3 class="product-name"><a href="<?php echo base_url('Barang/index/'.$bartop->id_barang); ?>"><?php echo $bartop->nama_barang; ?></a></h3>
													<h4 class="product-price">Rp. <?php echo $bartop->harga_barang; ?></h4>
													<h4 class="product-category"><i class="fa fa-hourglass-half"></i> <?php echo $bartop->waktu_lelang; ?></h4>
												</div>
												<div class="add-to-cart">
													<a href="<?php echo base_url('Barang/index/'.$bartop->id_barang); ?>">
														<button class="add-to-cart-btn"><i class="fa fa-search"></i> lihat</button>
													</a>
												</div>
											</div>
											<!-- /product -->
											<?php
												}
											}
										}
										?>
									</div>
									<div id="slick-nav-<?php echo $top; ?>" class="products-slick-nav"></div>
								</div>
								<?php
								$top++;
								}
								?>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<div class="col-md-12">
			<div class="section-title">
				<div class="section-nav">
					<ul class="section-tab-nav tab-nav">
						<li class="active"><a href="#" onclick="document.forms['form_tn'].submit(); return false;">Selengkapnya</a></li>
						<li></li><li></li><li></li><li></li>
					</ul>
				</div>
			</div>
		</div>
		<br><br>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<?php
					$valjl = 33;
					foreach ($jenlimcol as $jen) {
					?>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top <?php echo $jen->nama_jenis_barang; ?></h4>
							<div class="section-nav">
								<div id="slick-nav-<?php echo $valjl; ?>" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-<?php echo $valjl; ?>">
							<div>
								<?php
								foreach ($barang as $jl) {
									if ($jl->nama_jenis_barang==$jen->nama_jenis_barang) {
										if ($jl->status_lelang=='berlangsung') {
								?>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="<?php echo base_url('assets/barang/'.$jl->nama_gambar_barang); ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category"><?php echo $jl->nama_jenis_barang; ?></p>
										<h3 class="product-name"><a href="<?php echo base_url('Barang/index/'.$jl->id_barang); ?>"><?php echo $jl->nama_barang; ?></a></h3>
										<h4 class="product-price">Rp. <?php echo $jl->harga_barang; ?></h4>
									</div>
								</div>
								<!-- /product widget -->
								<?php
										}
									}
								}
								 ?>
							</div>
						</div>
					</div>

					<?php
					$valjl++;
					}
					?>

					<div class="clearfix visible-sm visible-xs"></div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

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

		        <div class="col-md-3 col-xs-6">
		          <div class="footer">
		            <h3 class="footer-title">Kategori</h3>
		            <form method="post" name="fnew" action="<?php echo base_url('Cari/hasil'); ?>">
		              <input type="hidden" name="min" value="0">
		              <input type="hidden" name="max" value="5000000">
		              <input type="hidden" name="sort" value="0">
		              <input type="hidden" name="checkall" value="checkall">
		            </form>
		            <?php
		            $j=0;
		            foreach ($jenlimbar as $formlimbarf) {
		              if ($j<4) {
		                ?>
		                <form method="post" name="f<?php echo $formlimbarf->nama_jenis_barang; ?>" action="<?php echo base_url('Cari/hasil'); ?>">
		                  <input type="hidden" name="min" value="0">
		                  <input type="hidden" name="max" value="5000000">
		                  <input type="hidden" name="sort" value="0">
		                  <input type="hidden" name="kategori[]" value="<?php echo $formlimbarf->id_jenis_barang; ?>">
		                </form>
		                <?php
		              }
		              $j++;
		            }
		             ?>
		            <ul class="footer-links">
		              <li><a href="#" onclick="document.forms['fnew'].submit(); return false;">New</a></li>
		              <?php
		              $jj=0;
		              foreach ($jenlimbar as $kategolimbarf) {
		                if ($jj<4) {
		                  ?>
		                  <li><a href="#" onclick="document.forms['f<?php echo $kategolimbarf->nama_jenis_barang; ?>'].submit(); return false;"><?php echo $kategolimbarf->nama_jenis_barang; ?></a></li>
		                  <?php
		                }
		                $jj++;
		              }
		              ?>
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
