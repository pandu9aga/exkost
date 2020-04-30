<?php $this->load->view("template/head.php") ?>
<?php $this->load->view("template/header.php") ?>
<?php $this->load->view("template/navigation.php") ?>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <div class="col-md-12">
        <h3 class="breadcrumb-header">Checkout</h3>
        <ul class="breadcrumb-tree">
          <li><a href="<?php echo base_url('Home'); ?>">Home</a></li>
          <li class="active">Checkout</li>
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
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <div class="col-md-7">
        <!-- Billing Details -->
        <div class="billing-details">
          <div class="section-title">
            <h3 class="title">Pembayaran</h3>
          </div>
          Silahkan Lakukan Pembayaran dengan Cara Transfer ke Rekening Berikut :
        </div>
        <!-- /Billing Details -->

        <div class="billing-details">
          <div class="section-title">
            <h5 class="title">Pilih Rekening</h5>
          </div>
          <form name="formcheckout" action="<?php echo base_url('Checkout/prosesCheckout'); ?>" method="post">
          <?php
          $i = 1;
          foreach ($bankadmin as $rek) {
          ?>
          <div class="input-radio">
            <input type="radio" name="rek_admin" value="<?php echo $rek->id_bank_admin; ?>" id="payment-<?php echo $i; ?>" <?php if($i==1){ echo "checked"; } ?>>
            <label for="payment-<?php echo $i; ?>">
              <span></span>
              <?php echo $rek->nama_bank_admin; ?>
            </label>
            <div class="caption">
              <p><?php echo $rek->no_rek_admin; ?></p>
            </div>
          </div>
          <?php
          $i++;
          }
          ?>
        </div>

        <a href="Topup" class="primary-btn">
          <i class="fa fa-arrow-circle-left"></i>
          <small> Pilihan TopUp</small>
        </a>
      </div>
      <br>

      <!-- Order Details -->
      <div class="col-md-5 order-details">
        <div class="section-title text-center">
          <h3 class="title">Identitas Pembayar</h3>
        </div>
        <div class="order-summary">
          <div class="order-col">
            <div><strong>Nama Pengirim :</strong></div>
            <div></div>
          </div>
          <div class="order-products">
            <div>
              <div class="form-group">
								<input class="input" type="text" name="nama_pembayar" placeholder="Nama" required oninvalid="this.setCustomValidity('nama pembayar tidak boleh kosong')" oninput="setCustomValidity('')">
							</div>
            </div>
          </div>
          <div class="order-col">
            <div><strong>Nominal :</strong></div>
            <div>
              <strong class="order-total">
                Rp.
                <?php
                if ($nominal==1) {
                  echo "10000";
                  ?><input type="hidden" name="nominal" value="10000"> <?php
                }elseif ($nominal==2) {
                  echo "20000";
                  ?><input type="hidden" name="nominal" value="20000"> <?php
                }elseif ($nominal==3) {
                  echo "50000";
                  ?><input type="hidden" name="nominal" value="50000"> <?php
                }elseif ($nominal==4) {
                  echo "100000";
                  ?><input type="hidden" name="nominal" value="100000"> <?php
                }elseif ($nominal==5) {
                  echo "500000";
                  ?><input type="hidden" name="nominal" value="500000"> <?php
                }elseif ($nominal==6) {
                  echo "1000000";
                  ?><input type="hidden" name="nominal" value="1000000"> <?php
                }else {
                  redirect(base_url('Topup'));
                }
                ?>
              </strong>
            </div>
          </div>
        </div>
        <div class="input-checkbox">
          <input type="checkbox" id="terms" required>
          <label for="terms">
            <span></span>
            Saya setuju dengan <a href="#">persyaratan & kondisi</a>
          </label>
        </div>
        <input type="hidden" name="idakun" value=<?php
        foreach ($akun as $user) {
          echo $user->id_akun;
        }?>>
        <button type="submit" name="submitbayar" class="primary-btn order-submit">Lanjut ke Pembayaran</button>
      </form>
      </div>
      <!-- /Order Details -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->

<?php $this->load->view("template/footer.php") ?>
<?php $this->load->view("template/js.php") ?>
