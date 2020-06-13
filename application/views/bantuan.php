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
        <h3 class="breadcrumb-header">BANTUAN</h3>
        <ul class="breadcrumb-tree">
          <li><a href="#Servis">Servis</a></li>
          <li class="active">BANTUAN</li>
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
  <center><h2>Bantuan</h2></center>
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
					<p align="justify" ><strong>Apa yang dilakukan jika “lupa kata sandi”?</strong></p><br/>
					<p align="justify" >1.	Klik “lupa kata sandi?”, pada saat melakukan login.</p>
					<p align="justify" >2.	Masukan/input email yang sudah terdaftar. Lalu klik OK.</p>
					<p align="justify" >3.	Tunggu pesan yang dikirimkan dari admin. Dalam pesan tersebut berisikan link yang digunakan untuk mengganti kata sandi yang baru.</p>
					<p align="justify" >4.	Lalu masukan kata sandi yang baru.</p><br/><br/>

					<p align="justify" ><strong>Bagaimana saya melakukan penawaran ?</strong></p><br/>
					<p align="justify" >1.	Login dengan akun yang di punya, jika belum mempunyai akun lakukanlah pendaftaran/register.</p>
					<p align="justify" >2.	Pilih lelang barang apa yang ingin di ikuti.</p>
					<p align="justify" >3.	Input/masukan bid yang melebihi dari harga awal terpasang.</p>
					<p align="justify" >4.	Pastikan saldo anda mencukupi pelelangan yang berlangsung.</p>
					<p align="justify" >5.	Jika harga yang anda inputkan merupakan harga tertinggi maka anda menang dalam pelelangan. Lalu secara otomatis saldo anda akan terpotong.</p>
					<p align="justify" >6.	Lalu barang akan dikirimkan ke alamat anda.</p><br/><br/>

					<p align="justify" ><strong>Bagaimana cara melalukan penjualan/pelelangan</strong></p><br/>
					<p align="justify" >1.	Login dengan akun yang di punya, jaka belum mempunyai akun lakukanlah pendaftaran/register.</p>
					<p align="justify" >2.	Upload barang yang akan dilelang.</p>
					<p align="justify" >3.	Input/masukan informasi atau spesifikasi yang sesuai dengan barang.</p>
					<p align="justify" >4.	Input/masukan batas waktu habis dari pelelang barang tersebut.</p>
					<p align="justify" >5.	Jika telah mencapai batas waktu maka penawar tertinggi yang memenangkannya.</p>
					<p align="justify" >6.	pelelang melakukan pengiriman barang kepada penawar.</p>
					<p align="justify" >7.	Pelelang mendapat transfer dari pihak exkost jika proses lancar dan sesuai aturan yang diberikan EXKOST</p><br/><br/>

					<p align="justify" ><strong>Bagaimana mengisi/top-up saldo saya ?</strong></p><br/>
					<p align="justify" >1.	Klik “top-up”. </p>
					<p align="justify" >2.	Lalu disitu anda akan diberi pilihan, jumlah saldo yang akan anda isikan.</p>
					<p align="justify" >3.	Setelah memilih jumlahnya, anda akan diberi pilihan kembali melalui bank apa anda ingin melakukan transaksi.</p>
					<p align="justify" >4.	Setelah melakukan transsaksi, anda diharapkan untuk mengirimkan bukti transaksi.</p>
					<p align="justify" >5.	Setelah di konfirmasi oleh admin, maka saldo anda akan bertambah.</p><br/><br/>

					<p align="justify" ><strong>Setelah anda melakukan traksaksi. Anda diharapkan melakukan untuk mengirim bukti transfer.</strong></p>
					<p align="justify" ><strong>Bagaimana cara melakukan kirim bukti transaksi?</strong></p><br/>
					<p align="justify" >1.	Bukti transfer ini akan dikirimkan dalam betuk foto. </p>
					<p align="justify" >2.	Pilih foto yang menunjukan anda telah melakukan bukti transfer. Lalu klik “kirim”.</p>
					<p align="justify" >3.	Setelah bukti itu terkirim, admin exkost, akan mengecek foto tersebut.</p>
					<p align="justify" >4.	Jika sudah benar maka, saldo anda akan bertambah.</p><br/><br/>
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
              <h3 class="footer-title" id="Servis">Servis</h3>
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
