<?php $this->load->view("template/head.php") ?>
<?php $this->load->view("template/header.php") ?>
<?php $this->load->view("template/navigation.php") ?>

<!-- BREADCRUMB -->
<?php
foreach ($barang as $tbarang) {
  if ($tbarang->id_barang==$id_barang) {
?>
<div id="breadcrumb" class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb-tree">
          <form method="post" name="form_b" action="<?php echo base_url('Lelang/hasil'); ?>">
            <input type="hidden" name="min" value="0">
            <input type="hidden" name="max" value="5000000">
            <input type="hidden" name="sort" value="4">
            <input type="hidden" name="kategori[]" value="<?php echo $tbarang->id_jenis_barang; ?>">
            <?php $thisjenis=$tbarang->id_jenis_barang; ?>
          </form>
          <li><a href="<?php echo base_url('Home'); ?>">Home</a></li>
          <li><a href="#" onclick="document.forms['form_b'].submit(); return false;"><?php echo $tbarang->nama_jenis_barang; ?></a></li>
          <li class="active"><?php echo $tbarang->nama_barang; ?></li>
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
      <!-- Product main img -->
      <div class="col-md-6 col-md-push-2">
        <div id="product-main-img">
          <div class="product-preview">
            <img src="<?php echo base_url('assets/barang/'.$tbarang->nama_gambar_barang); ?>" alt="">
          </div>
        </div>
      </div>
      <!-- /Product main img -->

      <!-- Product thumb imgs -->
      <div class="col-md-2  col-md-pull-6">
        <div id="product-imgs">
          <div class="product-preview">
            <img src="<?php echo base_url('assets/barang/'.$tbarang->nama_gambar_barang); ?>" alt="">
          </div>
        </div>
      </div>
      <!-- /Product thumb imgs -->
      <div class="col-md-1">
      </div>
      <!-- Product details -->
      <div class="col-md-3">
        <div class="product-details">
          <h2 class="product-name"><?php echo $tbarang->nama_barang; ?></h2>
          <p><a href="#" onclick="document.forms['form_b'].submit(); return false;"><?php echo $tbarang->nama_jenis_barang; ?></a></p>
          <div>
            <h3 class="product-price">Rp. <?php echo $tbarang->harga_barang; ?></del></h3>
            <span class="product-available"><?php echo $tbarang->status_lelang; ?></span>
          </div>
          <div class="review-heading">
            <h5 class="name">Waktu Habis</h5>
            <p class="date"><i class="fa fa-hourglass-half"></i> <?php echo $tbarang->waktu_lelang; ?></p>
          </div>
          <p>
            __________________________________
          </p>
          <div class="product-options">
            <label>
              Tawaran Tertinggi
              <input class="input" type="text" name="high_bid" placeholder="Tawaran Tertinggi" disabled>
            </label>
          </div>

          <div class="add-to-cart">
            <br>
            <button class="add-to-cart-btn"><i class="fa fa-pencil"></i> Edit</button>
            <button class="add-to-cart-btn"><i class="fa fa-close"></i> Hapus</button>
          </div>

          <div class="review-heading">
            <h5 class="name"><?php echo $tbarang->nama_akun; ?></h5>
            <p class="date"><i class="fa fa-truck"></i> <?php echo $tbarang->alamat_akun; ?></p>
            <p class="date"><i class="fa fa-phone"></i> <?php echo $tbarang->no_telp_akun; ?></p>
          </div>

        </div>
      </div>
      <!-- /Product details -->

      <!-- Product tab -->
      <div class="col-md-12">
        <div id="product-tab">
          <!-- product tab nav -->
          <ul class="tab-nav">
            <li class="active"><a data-toggle="tab" href="#tab1">Deskripsi</a></li>
            <li><a data-toggle="tab" href="#tab2">Tawaran</a></li>
            <li><a data-toggle="tab" href="#tab3">Komentar (3)</a></li>
          </ul>
          <!-- /product tab nav -->

          <!-- product tab content -->
          <div class="tab-content">
            <!-- tab1  -->
            <div id="tab1" class="tab-pane fade in active">
              <div class="row">
                <div class="col-md-12">
                  <p><?php echo $tbarang->info_barang; ?></p>
                </div>
              </div>
            </div>
            <!-- /tab1  -->

            <!-- tab2  -->
            <div id="tab2" class="tab-pane fade in">
              <div class="row">
                <!-- Rating -->
                <div class="col-md-3">
                  <div id="rating">
                    <div class="rating-avg">
                      <span class="spanred"><?php echo $tbarang->nama_barang; ?></span>
                    </div>
                    <div class="review-heading">
                      <h5 class="name">Jumlah Tawaran:</h5>
                      <p class="date">(30)</p>
                    </div>
                  </div>
                </div>
                <!-- /Rating -->

                <!-- Reviews -->
                <div class="col-md-6">
                  <div id="reviews">
                    <ul class="reviews">
                      <li>
                        <div class="review-heading">
                          <h4 class="name">John</h4>
                          <p class="date"><i class="fa fa-hourglass"></i> 27 DEC 2018, 8:0 PM</p>
                        </div>
                        <div class="review-body">
                          <p><h5>Jumlah Tawaran :</h5> Rp. 000</p>
                        </div>
                      </li>
                      <li>
                        <div class="review-heading">
                          <h4 class="name">John</h4>
                          <p class="date"><i class="fa fa-hourglass"></i> 27 DEC 2018, 8:0 PM</p>
                        </div>
                        <div class="review-body">
                          <p><h5>Jumlah Tawaran :</h5> Rp. 000</p>
                        </div>
                      </li>
                    </ul>
                    <ul class="reviews-pagination">
                      <li class="active">1</li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                  </div>
                </div>
                <!-- /Reviews -->

                <!-- Review Form -->
                <div class="col-md-3">
                </div>
                <!-- /Review Form -->
              </div>
            </div>
            <!-- /tab2  -->

            <!-- tab3  -->
            <div id="tab3" class="tab-pane fade in">
              <div class="row">
                <!-- Rating -->
                <div class="col-md-3">
                  <div id="rating">
                    <div class="rating-avg">
                      <span>4.5</span>
                      <div class="rating-stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                      </div>
                    </div>
                    <ul class="rating">
                      <li>
                        <div class="rating-stars">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                        </div>
                        <div class="rating-progress">
                          <div style="width: 80%;"></div>
                        </div>
                        <span class="sum">3</span>
                      </li>
                      <li>
                        <div class="rating-stars">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-o"></i>
                        </div>
                        <div class="rating-progress">
                          <div style="width: 60%;"></div>
                        </div>
                        <span class="sum">2</span>
                      </li>
                      <li>
                        <div class="rating-stars">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                        </div>
                        <div class="rating-progress">
                          <div></div>
                        </div>
                        <span class="sum">0</span>
                      </li>
                      <li>
                        <div class="rating-stars">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                        </div>
                        <div class="rating-progress">
                          <div></div>
                        </div>
                        <span class="sum">0</span>
                      </li>
                      <li>
                        <div class="rating-stars">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                        </div>
                        <div class="rating-progress">
                          <div></div>
                        </div>
                        <span class="sum">0</span>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- /Rating -->

                <!-- Reviews -->
                <div class="col-md-6">
                  <div id="reviews">
                    <ul class="reviews">
                      <li>
                        <div class="review-heading">
                          <h5 class="name">John</h5>
                          <p class="date">27 DEC 2018, 8:0 PM</p>
                          <div class="review-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o empty"></i>
                          </div>
                        </div>
                        <div class="review-body">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                        </div>
                      </li>
                      <li>
                        <div class="review-heading">
                          <h5 class="name">John</h5>
                          <p class="date">27 DEC 2018, 8:0 PM</p>
                          <div class="review-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o empty"></i>
                          </div>
                        </div>
                        <div class="review-body">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                        </div>
                      </li>
                      <li>
                        <div class="review-heading">
                          <h5 class="name">John</h5>
                          <p class="date">27 DEC 2018, 8:0 PM</p>
                          <div class="review-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o empty"></i>
                          </div>
                        </div>
                        <div class="review-body">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                        </div>
                      </li>
                    </ul>
                    <ul class="reviews-pagination">
                      <li class="active">1</li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                  </div>
                </div>
                <!-- /Reviews -->

                <!-- Review Form -->
                <div class="col-md-3">
                  <div id="review-form">
                    <form class="review-form">
                      <input class="input" type="text" placeholder="Your Name">
                      <input class="input" type="email" placeholder="Your Email">
                      <textarea class="input" placeholder="Your Review"></textarea>
                      <div class="input-rating">
                        <span>Your Rating: </span>
                        <div class="stars">
                          <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                          <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                          <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                          <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                          <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                        </div>
                      </div>
                      <button class="primary-btn">Submit</button>
                    </form>
                  </div>
                </div>
                <!-- /Review Form -->
              </div>
            </div>
            <!-- /tab3  -->
          </div>
          <!-- /product tab content  -->
        </div>
      </div>
      <!-- /product tab -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<?php
  }
} ?>
<!-- /SECTION -->

<?php $this->load->view("template/footer.php") ?>
<?php $this->load->view("template/js.php") ?>
