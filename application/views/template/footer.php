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
              <li><a href="<?php echo base_url('Profil'); ?>">Profil</a></li>
              <li><a href="<?php echo base_url('Cart/berlangsung'); ?>">Cart</a></li>
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
