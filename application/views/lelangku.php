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
            <?php
            if ($tbarang->status_lelang=="berlangsung") {
            ?>
            <span class="product-available">Berlangsung</span>
            <?php
            }elseif ($tbarang->status_lelang=="selesai") {
              if ($tbarang->status_gagal=="gagal") {
              ?>
              <span class="product-available">Gagal</span>
              <?php
              }else {
              ?>
              <span class="product-available">Kirim</span>
              <?php
              }
            }elseif ($tbarang->status_lelang=="kirim") {
            ?>
            <span class="product-available">Dikirim</span>
            <?php
            }elseif ($tbarang->status_lelang=="terima") {
            ?>
            <span class="product-available">Selesai</span>
            <?php
            }
            ?>
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
              <?php
              if (isset($hbid)) {
                foreach ($hbid as $hb) {
                  $hbtawaran = $hb->jumlah_tawaran;
                  $hbakun = $hb->nama_akun;
                  $hbnotelp = $hb->no_telp_akun;
                  $hbalamat = $hb->alamat_akun;
                }
              }
              ?>
              <input class="input" type="text" name="high_bid" placeholder="Tawaran Tertinggi" value="<?php if (isset($hbid)) {
                echo $hbtawaran;
              } ?>" disabled>
            </label>
          </div>

          <?php
          if ($tbarang->status_lelang=="berlangsung") {
          ?>
          <div class="add-to-cart">
            <br>
            <button class="add-to-cart-btn"><i class="fa fa-pencil"></i> Edit</button>
            <button class="add-to-cart-btn"><i class="fa fa-close"></i> Hapus</button>
          </div>
          <?php
          } elseif ($tbarang->status_lelang=="selesai") {
            if ($tbarang->status_gagal=="gagal") {
            ?>
            <div class="add-to-cart">
              <br>
              <button class="add-to-cart-btn"><i class="fa fa-cross"></i>Gagal</button>
            </div>
            <?php
            }else {
            ?>
            <div class="add-to-cart">
              <br>
              <button class="modal-button" href="#myModal<?php echo $tbarang->id_barang; ?>"><i class="fa fa-truck"></i> Kirim</button>
            </div>
            <!-- Modal content -->
            <div id="myModal<?php echo $tbarang->id_barang;  ?>" class="modal">
              <div class="modal-content">
               <div class="modal-header">
                 <span class="close">&times;</span>
                 <h2>Kirimkan Barang</h2>
               </div>
               <div class="modal-body">
                 <p>Kirim Barang Ini Ke :</p>
                 <p>Nama : <?php echo $hbakun; ?></p>
                 <p>No Telp : <?php echo $hbnotelp; ?></p>
                 <p>Alamat : <?php echo $hbalamat; ?></p>
               </div>
               <div class="modal-footer">
                 <a href="<?php echo base_url('Lelang/proses_kirim/'.$tbarang->id_barang); ?>">
                   <button type="button" class="primarys-btn" name="button"><i class="fa fa-truck"></i> Kirim</button>
                 </a>
               </div>
              </div>
            </div>
            <?php
            }
          } elseif ($tbarang->status_lelang=="kirim") {
          ?>
          <div class="add-to-cart">
            <br>
            <button class="modal-button" href="#myModal<?php echo $tbarang->id_barang; ?>"><i class="fa fa-truck"></i> Sedang Dikirim</button>
          </div>
          <!-- Modal content -->
          <div id="myModal<?php echo $tbarang->id_barang;  ?>" class="modal">
            <div class="modal-content">
             <div class="modal-header">
               <span class="close">&times;</span>
               <h2>Barang Dikirim</h2>
             </div>
             <div class="modal-body">
               <p>Barang Ini Sedang Dikirim Ke :</p>
               <p>Nama : <?php echo $hbakun; ?></p>
               <p>No Telp : <?php echo $hbnotelp; ?></p>
               <p>Alamat : <?php echo $hbalamat; ?></p>
             </div>
            </div>
          </div>
          <?php
          } elseif ($tbarang->status_lelang=="terima") {
            if ($tbarang->status_transfer=="terima") {
            ?>
            <div class="add-to-cart">
              <br>
              <button class="modal-button" href="#myModal<?php echo $tbarang->id_barang; ?>"><i class="fa fa-check"></i> Selesai</button>
            </div>
            <!-- Modal content -->
            <div id="myModal<?php echo $tbarang->id_barang;  ?>" class="modal">
              <div class="modal-content">
               <div class="modal-header">
                 <span class="close">&times;</span>
                 <h2>Konfirmasi Transfer</h2>
               </div>
               <div class="modal-body">
                 <p>Admin Telah Mengupload Bukti Transfer</p>
                 <?php
                 $CI =& get_instance();
                 $CI->load->model('Barang_model');
                 $trans = $CI->Barang_model->getThistrans($tbarang->id_barang)->result();
                 foreach ($trans as $t) {
                   $bukti = $t->bukti_transfer;
                 }
                 ?>
                 <img src="<?php echo base_url('assets/transfer/'.$bukti); ?>" alt="" height="310" width="450">
               </div>
               <div class="modal-footer">
                 <button type="button" class="primarys-btn" name="button"><i class="fa fa-check"></i> Selamat..!!</button>
               </div>
              </div>
            </div>
            <?php
            }elseif ($tbarang->status_transfer=="kirim") {
            ?>
            <div class="add-to-cart">
              <br>
              <button class="modal-button" href="#myModal<?php echo $tbarang->id_barang; ?>"><i class="fa fa-pencil"></i> Konfirmasi</button>
            </div>
            <!-- Modal content -->
            <div id="myModal<?php echo $tbarang->id_barang;  ?>" class="modal">
              <div class="modal-content">
               <div class="modal-header">
                 <span class="close">&times;</span>
                 <h2>Konfirmasi Transfer</h2>
               </div>
               <div class="modal-body">
                 <p>Admin Telah Mengupload Bukti Transfer</p>
                 <?php
                 $CI =& get_instance();
                 $CI->load->model('Barang_model');
                 $trans = $CI->Barang_model->getThistrans($tbarang->id_barang)->result();
                 foreach ($trans as $t) {
                   $bukti = $t->bukti_transfer;
                 }
                 ?>
                 <img src="<?php echo base_url('assets/transfer/'.$bukti); ?>" alt="" height="310" width="450">
               </div>
               <div class="modal-footer">
                 <a href="<?php echo base_url('Lelang/proses_konfirmtrans/'.$tbarang->id_barang); ?>">
                   <button type="button" class="primarys-btn" name="button"><i class="fa fa-truck"></i> Konfirmasi</button>
                 </a>
               </div>
              </div>
            </div>
            <?php
            }else {
            ?>
            <div class="add-to-cart">
              <br>
              <button class="modal-button" href="#myModal<?php echo $tbarang->id_barang; ?>"><i class="fa fa-pencil"></i> Konfirmasi</button>
            </div>
            <!-- Modal content -->
            <div id="myModal<?php echo $tbarang->id_barang;  ?>" class="modal">
              <div class="modal-content">
               <div class="modal-header">
                 <span class="close">&times;</span>
                 <h2>Konfirmasi Transfer</h2>
               </div>
               <div class="modal-body">
                 <p>Admin Belum Mengupload Bukti Transfer</p>
                 <p>.</p>
                 <p>.</p>
                 <p>Harap Tunggu</p>
               </div>
               <div class="modal-footer">
               </div>
              </div>
            </div>
            <?php
            }
          }
          ?>

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
                      <p class="date">(<?php echo $totbid; ?>)</p>
                    </div>
                  </div>
                </div>
                <!-- /Rating -->

                <!-- Reviews -->
                <div class="col-md-6">
                  <div id="reviews">
                    <ul class="reviews">
                      <?php
                      if (isset($bid)) {
                        foreach ($bid as $all) {
                      ?>
                      <li>
                        <div class="review-heading">
                          <h4 class="name"><?php echo $all->nama_akun; ?></h4>
                          <!--<p class="date"><i class="fa fa-hourglass"></i> 27 DEC 2018, 8:0 PM</p>-->
                        </div>
                        <div class="review-body">
                          <p><h5>Jumlah Tawaran :</h5> Rp. <?php echo $all->jumlah_tawaran; ?></p>
                        </div>
                      </li>
                      <?php
                        }
                      }
                      ?>
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
