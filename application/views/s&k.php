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
        <h3 class="breadcrumb-header">Syarat dan ketentuan</h3>
        <ul class="breadcrumb-tree">
          <li><a href="#Informasi">Informasi</a></li>
          <li class="active">Syarat dan ketentuan</li>
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
  <center><h2> Syarat dan ketentuan</h2></center>
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <br/>
		<p align="justify" >Dengan mendaftar sebagai pengguna aplikasi ex-kost, berarti Anda telah menyetujui semua Syarat dan Ketentuan layanan yang berlaku di ex-kost, yang menetapkan hubungan antara Anda dan pihak penyedia layanan ex-kost. Jika Anda tidak bersedia mengikuti setiap syarat dan ketentuan yang berlaku di ex-kost , maka anda tidak dapat menggunakan ex-kost. </p><br/>

		<p align="justify" >Syarat dan Ketentuan dalam perjanjian ini dapat berubah sesuai dengan berjalannya waktu. Dan merupakan tanggung jawab Anda untuk memperhatikan setiap perubahan yang akan terjadi kedepannya.</p>
		<br/><br/>
		<center><h4> TERM OF SERVICE</h4></center>
			<p align="justify" >1. Pengguna dapat melakukan kegiatan pelelangan. </p><br/>
			<p align="justify" >2. Untuk dapat mengakses layanan di Ex-kost, harus membuka account pengguna baru, dengan memasukan username, e-mail dan password.</p><br/>
			<p align="justify" >3. Pengguna dapat mengakses akun ex-kos dengan mengisikan username dan password jika sudah mempunyai akun.</p><br/>
			<p align="justify" >4. Pengguna wajib mengisikan data informasi tentang pelelangan dengan benar.</p><br/>
			<p align="justify" >5. Pengguna dihimbau untuk tidak melakukan segala bentuk tindakan yang merugikan atau menimbulkan ketidaknyamanan, seperti mengancam atau melecehkan, saat menggunakan aplikasi.</p><br/>
			<p align="justify" >6. Pengguna dilarang menggunakan informasi/ program/ fitur yang terdapat di situs dan aplikasi ex-kost untuk melanggar peraturan perundang-undangan yang berlaku di Indonesia.</p><br/>
			<p align="justify" >7. Pengguna bertanggung jawab penuh atas akun e-mas miliknya dan dapat dimintai pertanggungjawaban jika sewaktu-waktu terjadi kerugian yang disebabkan oleh akunnya, meskipun akun tersebut disalahgunakan oleh pihak lain.</p><br/>
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
