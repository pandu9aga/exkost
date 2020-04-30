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
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li class="active"><?php
							if (isset($paskategori)) {
								if ($paskategori!='checkall') {
									foreach ($jenis as $kbread) {
										for ($i=0; $i < sizeof($paskategori); $i++) {
											if ($paskategori[$i]==$kbread->id_jenis_barang) {
												$k[] = $kbread->nama_jenis_barang;
											}
										}
									}
									$val = implode(", ", $k);
									echo $val;
								}elseif ($paskategori=='checkall') {
									echo "Semua Kategori";
								}
							}
							?> (227,490 Results)</li>
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
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Kategori</h3>
              <form method="post" name="form_fs" action="<?php echo base_url('Cari/hasil'); ?>">
							<div class="checkbox-filter">

                <div class="input-checkbox">
									<input type="checkbox" name="checkall" id="category-0" value="all" onClick="check_uncheck_checkbox(this.checked);" <?php
                  if (isset($paskategori)) {
                    if ($paskategori=='checkall') {
                      echo "checked";
                    }
                  } ?>>
									<label for="category-0">
										<span></span>
										Semua
										<small>(120)</small>
									</label>
								</div>

                <?php
                $k=1;
                foreach ($jenis as $kategori) {
                ?>
								<div class="input-checkbox">
									<input type="checkbox" name="kategori[]" id="category-<?php echo $k; ?>" value="<?php echo $kategori->id_jenis_barang; ?>" onClick="check_kategori(this.checked);"<?php
                  if (isset($paskategori)) {
                    if ($paskategori!='checkall') {
                      for ($i=0; $i < sizeof($paskategori); $i++) {
                        if ($paskategori[$i]==$k) {
                          echo "checked";
                        }
                      }
                    }
                  } ?>>
									<label for="category-<?php echo $k; ?>">
										<span></span>
										<?php echo $kategori->nama_jenis_barang; ?>
										<small>(120)</small>
									</label>
								</div>
                <?php
                $k++;
                }
                ?>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Harga</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number" name="min" <?php if (isset($pasmin)) {
                    $min = $pasmin;
                  }else {
                    $min = 0;
                  }?>>
                  <script type="text/javascript">
                  var vmin = '<?php echo $min; ?>'
                  </script>
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number" name="max" <?php if (isset($pasmax)) {
                    $max = $pasmax;
                  }else {
                    $max = 5000000;
                  } ?>>
                  <script type="text/javascript">
                  var vmax = '<?php echo $max; ?>'
                  </script>
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>
            <br>
            <ul class="store-grid">
              <li><a href="#" onclick="document.forms['form_fs'].submit(); return false;"><i class="fa fa-filter"></i></a></li>
              <li><a href="#" onclick="document.forms['form_fs'].submit(); return false;"><i class="fa fa-window-close"></i></a></li>
            </ul>
            <br>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Urutkan:
									<select class="input-select" name="sort">
                    <option value="0" <?php if (isset($passort)) {
                      if ($passort=='0') {
                        echo "selected";
                      }
                    } ?>>-</option>
										<option value="1" <?php if (isset($passort)) {
                      if ($passort=='1') {
                        echo "selected";
                      }
                    } ?>>Harga &uarr;</option>
										<option value="2" <?php if (isset($passort)) {
                      if ($passort=='2') {
                        echo "selected";
                      }
                    } ?>>Harga &darr;</i></option>
                    <option value="3" <?php if (isset($passort)) {
                      if ($passort=='3') {
                        echo "selected";
                      }
                    } ?>>Waktu &uarr;</option>
                    <option value="4" <?php if (isset($passort)) {
                      if ($passort=='4') {
                        echo "selected";
                      }
                    } ?>>Waktu &darr;</option>
									</select>
								</label>
  							<ul class="store-grid">
  								<li><a href="#" onclick="document.forms['form_fs'].submit(); return false;"><i class="fa fa-sort"></i></a></li>
  								<li><a href="#" onclick="document.forms['form_fs'].submit(); return false;"><i class="fa fa-window-close"></i></a></li>
  							</ul>
                </form>
							</div>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
              <?php
		            //$no = $this->uri->segment('3') + 1;
		            foreach($barang as $b){
		          ?>
							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="<?php echo base_url('assets/barang/'.$b->nama_gambar_barang); ?>" alt="">
										<div class="product-label">
										</div>
									</div>
                  <div class="product-body">
                    <p class="product-category"><?php echo $b->nama_jenis_barang; ?></p>
                    <h3 class="product-name"><a href="<?php echo base_url('Barang/index/'.$b->id_barang); ?>"><?php echo $b->nama_barang; ?></a></h3>
                    <h4 class="product-price">Rp. <?php echo $b->harga_barang; ?></h4>
                    <h4 class="product-category"><i class="fa fa-hourglass-half"></i> <?php echo $b->waktu_lelang; ?></h4>
                  </div>
                  <div class="add-to-cart">
                    <a href="<?php echo base_url('Barang/index/'.$b->id_barang); ?>">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> ikuti lelang</button>
										</a>
                  </div>
								</div>
							</div>
							<!-- /product -->
            <?php
            }
            ?>
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Produk Exkost</span>
              <?php
                echo $pagination;
              ?>
							<!--<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>-->
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

<?php $this->load->view("template/footer.php") ?>
<?php $this->load->view("template/js.php") ?>
