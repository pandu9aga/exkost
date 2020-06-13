<?php $this->load->view("template/head.php") ?>
<?php
if (isset($akun)) {
  $this->load->view("template/header.php");
}else {
  ?>
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
									<a href="<?php echo base_url('Main/login'); ?>">
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
  <?php
}
?>
<?php $this->load->view("template/navigation.php") ?>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <div class="col-md-12">
        <h3 class="breadcrumb-header">TENTANG KAMI</h3>
        <ul class="breadcrumb-tree">
          <li><a href="#Informasi">Informasi</a></li>
          <li class="active">TENTANG KAMI</li>
        </ul>
      </div>
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
  <center><h2> Tentang Kami</h2></center>
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
					<p align="justify" >Pelelangan adalah serangkaian kegiatan yang menyediakan barang dengan cara menciptakan persaingan yang sehat diantara penyedian barang yang setara dan memenuhi syarat, berdasaekan metode dan tata cara tertentu yang telah ditetapkan dan diikuti oleh pihak yang terkait.</p><br/>
					<div class="row">
					<center>
						<div class="col-md-12 col-xs-6">
							<div class="tentang-img">
								<img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="">
							</div>
						</div>
					</center>
					</div>



					<br/><br/><p align="justify" >Exkost adalah platform yang dirancang sebagai tempat bagi para anak kos untuk menjual barang kos pribadi yang dimiliki dengan cara pelelangan. Penawar dapat dilakukan dengan cara menginputkan harga yang  diinginkan. Pelelangan ini dilaksanakan dengan batas waktu yang telah ditentulakn oleh pelelang. Penawar dengan harga yang tertinggi adalah pemenangnya dan akan mendapatkan barnag yang di inginkan. </p>


					<p align="justify" >Dengan adanya Exkost ini kami berharap agar memudahkan pengguna menjual atau mendapatkan barang yang di butuhkan dengan pelelangan.</p><br/>

				</div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->

<?php
if (isset($akun)) {
  $this->load->view("template/footer.php");
}else {
  ?>
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
                <li><a href="http://exkost.decode@gmail.com"><i class="fa fa-envelope-o"></i>exkost.decode@gmail.com</a></li>
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
              <h3 class="footer-title" id="Informasi">Informasi</h3>
              <ul class="footer-links">
                <li><a href="<?php echo base_url('Informasi/tentang_kami'); ?>">Tentang Kami</a></li>
                <li><a href="<?php echo base_url('Informasi/kontak_kami'); ?>">Kontak Kami</a></li>
                <li><a href="<?php echo base_url('Informasi/privacy_policy'); ?>">Privacy Policy</a></li>
                <li><a href="<?php echo base_url('Informasi/term_condition'); ?>">Terms & Conditions</a></li>
              </ul>
            </div>
          </div>

          <div class="col-md-3 col-xs-6">
            <div class="footer">
              <h3 class="footer-title">Servis</h3>
              <ul class="footer-links">
                <li><a href="<?php echo base_url('Servis/Bantuan'); ?>">Bantuan</a></li>
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
  <?php
}
?>
<?php $this->load->view("template/js.php") ?>
