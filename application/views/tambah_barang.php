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
						<h3 class="breadcrumb-header">Tambah Barang</h3>
						<ul class="breadcrumb-tree">
							<li><a href="<?php echo base_url('Home'); ?>">Home</a></li>
							<li class="active">Tambah Barang</li>
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
								<h3 class="title">Lelang Barang</h3>
							</div>

							<form method="post" name="form_uploadproduk" action="<?php echo base_url('Tambah_Barang/prosesUpload'); ?>" enctype="multipart/form-data">

							<div class="form-group">
                <select class="input-select-jen-up" name="jenis_barang" required oninvalid="this.setCustomValidity('pilih jenis barang yang ada!')" oninput="setCustomValidity('')">
                  <option>Jenis Barang</option>
                  <?php
                  foreach ($jenis as $kategori) {
                    echo "<option>".$kategori->nama_jenis_barang."</option>";
                  }
                  ?>
                </select>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="nama_barang" placeholder="Nama Barang" required oninvalid="this.setCustomValidity('nama barang tidak boleh kosong')" oninput="setCustomValidity('')">
							</div>
							<div class="form-group">
								<input class="input" type="number" name="harga_barang" placeholder="Harga Barang" required oninvalid="this.setCustomValidity('harga barang tidak boleh kosong')" oninput="setCustomValidity('')">
							</div>
							<div class="form-group">
								<input type="text" class="input" id="datetime" name="waktu_lelang" placeholder="Waktu Habis" readonly oninvalid="this.setCustomValidity('waktu lelang tidak boleh kosong')" oninput="setCustomValidity('')">
							</div>
						</div>
						<!-- /Billing Details -->

						<!-- Order notes -->
						<div class="order-notes">
							<textarea class="input" name="catatan" placeholder="Catatan" required oninvalid="this.setCustomValidity('harap berikan catatan mengenai barang yang akan dilelang')" oninput="setCustomValidity('')"></textarea>
						</div>
						<!-- /Order notes -->

					</div>

					<!-- Hidden input-->
					<input type="hidden" name="id_pelelang" value=<?php
					foreach ($akun as $user) {
						echo $user->id_akun;
					}?>>
					<input type="hidden" name="status" value="berlangsung">
					<!-- /Hidden input-->

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Upload Foto</h3>
						</div>
						<label>Masukkan Foto:</label><br>
						<button class="primary-btn" disabled>
							<input type="file" name="gambar" required oninvalid="this.setCustomValidity('gambar barang tidak boleh kosong dan merupakan jenis file jpg, jpeg, & png')" oninput="setCustomValidity('')">
						</button>
						<button class="primary-btn order-submit-form"><i class="fa fa-plus-square"></i> Upload Barang</button>
					</div>
					<!-- /Order Details -->

				</form>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
    <?php $this->load->view("template/footer.php") ?>
    <?php $this->load->view("template/js.php") ?>
