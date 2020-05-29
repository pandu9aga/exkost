<?php $this->load->view("template/head.php") ?>
<?php $this->load->view("template/header.php") ?>
<?php $this->load->view("template/navigation.php") ?>

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

		<?php
		foreach ($akun as $key) {
			$id_akun = $key->id_akun;
		}
	  ?>

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
													<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> <?php if ($barnew->id_akun!=$id_akun) {
						                echo "ikuti lelang";
						              }else {
						                echo "lihat";
						              } ?></button>
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
														<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> <?php if ($barnew->id_akun!=$id_akun) {
							                echo "ikuti lelang";
							              }else {
							                echo "lihat";
							              } ?></button>
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

		<!-- HOT DEAL SECTION
		<div id="hot-deal" class="section">

			<div class="container">

				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">Pelelangan Paling Top Minggu ini</h2>
							<p>Ikuti Pelelangan Segera</p>
							<a class="primary-btn cta-btn" href="#">Lihat</a>
						</div>
					</div>
				</div>

			</div>

		</div>
		 /HOT DEAL SECTION -->

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
													<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> <?php if ($bartop->id_akun!=$id_akun) {
						                echo "ikuti lelang";
						              }else {
						                echo "lihat";
						              } ?></button>
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
														<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> <?php if ($bartop->id_akun!=$id_akun) {
							                echo "ikuti lelang";
							              }else {
							                echo "lihat";
							              } ?></button>
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

		<?php $this->load->view("template/footer.php") ?>
		<?php $this->load->view("template/js.php") ?>
