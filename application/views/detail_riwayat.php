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
        <h3 class="breadcrumb-header">Pembayaran</h3>
        <ul class="breadcrumb-tree">
          <li><a href="<?php echo base_url('Home'); ?>">Home</a></li>
          <li class="active">Pembayaran</li>
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
        </div>
        <!-- /Billing Details -->

        <div class="billing-details">
          <div class="section-title">
            <h5 class="title">Detail Top-Up :</h5>
          </div>
          <?php
          foreach ($topup as $datatop) {
          ?>
          <div class="form-group">
            <label>Nominal</label>
            <input class="input" type="text" name="nominal" value="Rp. <?php echo $datatop->nominal; ?>" disabled>
          </div>
          <div class="form-group">
            <label>Waktu Topup</label>
            <input class="input" type="text" name="waktu" value="<?php echo $datatop->waktu_topup; ?>" disabled>
          </div>
          <div class="form-group">
            <label>Nama Pengirim</label>
            <input class="input" type="text" name="nama" value="<?php echo $datatop->nama_rekening; ?>" disabled>
          </div>
          <div class="form-group">
            <label>Status Topup</label>
            <input class="input" type="text" name="status" value="<?php echo $datatop->status_topup; ?>" disabled>
          </div>
        </div>
      </div>
      <br>

      <?php
      if ($datatop->status_topup=='sukses') {
      ?>
      <!-- Order Details -->
      <div class="col-md-5 order-details">
        <div class="section-title text-center">
          <h3 class="title">Upload Bukti</h3>
        </div>
        <div class="order-summary">
          <div class="order-col">
            <div><strong>Kirim ke Rekening :</strong></div>
            <div></div>
          </div>
          <div class="order-products">
            <div>
              <div class="form-group">
								<input class="input" type="text" name="nama" value="<?php foreach ($bankadmin as $rek) {
                  echo $rek->nama_bank_admin." : ".$rek->no_rek_admin;
                } ?>" disabled>
							</div>
            </div>
          </div>
          <div class="class="order-products"">
            <p>Sukses menambah Saldo</p>
          </div>
        </div>
        <label>Bukti:</label><br>
        <img src="<?php echo base_url('assets/topup/'.$datatop->bukti_transfer); ?>" class="topup-img" width="425"/>
      </div>
      <!-- /Order Details -->
      <?php
    }elseif ($datatop->status_topup=='gagal') {
      ?>
      <!-- Order Details -->
      <div class="col-md-5 order-details">
        <div class="section-title text-center">
          <h3 class="title">Upload Bukti</h3>
        </div>
        <div class="order-summary">
          <div class="order-col">
            <div><strong>Kirim ke Rekening :</strong></div>
            <div></div>
          </div>
          <div class="order-products">
            <div>
              <div class="form-group">
								<input class="input" type="text" name="nama" value="<?php foreach ($bankadmin as $rek) {
                  echo $rek->nama_bank_admin." : ".$rek->no_rek_admin;
                } ?>" disabled>
							</div>
            </div>
          </div>
          <div class="class="order-products"">
            <p>Gagal menambah Saldo</p>
          </div>
        </div>
        <label>Bukti:</label><br>
        <img src="<?php echo base_url('assets/topup/'.$datatop->bukti_transfer); ?>" class="topup-img" width="425"/>
      </div>
      <!-- /Order Details -->
      <?php
      }
      ?>

      <?php
      } ?>
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->

<?php $this->load->view("template/footer.php") ?>
<?php $this->load->view("template/js.php") ?>
