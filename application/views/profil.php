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
        <h3 class="breadcrumb-header">Profil</h3>
        <ul class="breadcrumb-tree">
          <li><a href="<?php echo base_url('Home'); ?>">Home</a></li>
          <li class="active">Profil</li>
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
    <?php
    foreach ($akun as $profil) {
    ?>
    <!-- row -->
    <div class="col-md-5">
      <center class="m-t-30">
        <img src="<?php echo base_url('assets/profil/'.$profil->pp_akun); ?>" class="img-circle" width="250"/>
        <h4 class="card-title m-t-10"><?php echo $profil->nama_akun; ?></h4>
        <div>
        <form method="post" name="form_uploadpp" action="<?php echo base_url('Profil/uploadPP'); ?>" enctype="multipart/form-data">
          <center>
            <button class="primary-btn" disabled>
              <input type="file" name="file_gambar" accept="image/*" required>
            </button>
          </center>
          <br><input type="hidden" name="id" value="<?php echo $profil->id_akun; ?>">
          <button class="primary-btn order-submit-form"><i class="fa fa-save"></i> Simpan Foto</button>
        </form>
        </div>
      </center>
    </div>
    <div class="col-md-7">
        <!-- Billing Details -->
        <div class="billing-details">
          <div class="section-title">
            PROFIL
          </div>
          <form method="post" name="form_uploadprofil" action="<?php echo base_url('Profil/uploadProfil'); ?>">
          <div class="form-group">
            <input class="input" type="text" name="nama" placeholder="Nama" value="<?php echo $profil->nama_akun; ?>" required oninvalid="this.setCustomValidity('nama tidak boleh kosong')" oninput="setCustomValidity('')">
          </div>
          <div class="form-group">
            <input class="input" type="email" name="email" placeholder="Email" value="<?php echo $profil->email_akun; ?>" required oninvalid="this.setCustomValidity('email tidak boleh kosong')" oninput="setCustomValidity('')">
          </div>
          <div class="form-group">
            <input class="input" type="text" name="alamat" placeholder="Alamat" value="<?php echo $profil->alamat_akun; ?>" required oninvalid="this.setCustomValidity('alamat tidak boleh kosong')" oninput="setCustomValidity('')">
          </div>
          <div class="form-group">
            <input class="input" type="text" name="rekening" placeholder="Rekening (Jika ingin melelang barang, maka rekening harus diisi)" value="<?php if($profil->rekening_akun==0){ echo ""; }else{ echo $profil->rekening_akun; }; ?>" required oninvalid="this.setCustomValidity('Rekening tidak boleh kosong')" oninput="setCustomValidity('')">
          </div>
          <div class="form-group">
            <input class="input" type="number" name="telepon" placeholder="Telepon" value="<?php echo $profil->no_telp_akun; ?>" required oninvalid="this.setCustomValidity('telepon tidak boleh kosong')" oninput="setCustomValidity('')">
          </div>
          <div class="order-notes">
            <textarea class="input" name="catatan" placeholder="Catatan"><?php echo $profil->catatan_akun; ?></textarea>
          </div><br>
          <div class="form-group">
            <input class="input" type="password" name="password" id="txtPassword" placeholder="Password" value="<?php echo $profil->pass_akun; ?>" required oninvalid="this.setCustomValidity('password tidak boleh kosong')" oninput="setCustomValidity('')">
          </div>
          <div class="form-group">
            <input class="input" type="password" name="repassword" id="txtConfirmPassword" placeholder="Konfirmasi Password" required oninvalid="this.setCustomValidity('ulangi password yang benar')" oninput="setCustomValidity('')"/>
          </div>
          <input type="hidden" name="id" value="<?php echo $profil->id_akun; ?>">
          <div class="form-group">
            <div>
              <button class="primary-btn" id="updateprofile"><em class="fa fa-save"></em> Save</button>
              <!--<input type="submit" class="primary-btn" id="updateprofile"><em class="fa fa-save"></em> Save</input>-->
            </div>
          </div>
        </form>
        </div>
      </div>
    <!-- /row -->
    <?php
    }
     ?>
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->

<?php $this->load->view("template/footer.php") ?>
<?php $this->load->view("template/js.php") ?>
