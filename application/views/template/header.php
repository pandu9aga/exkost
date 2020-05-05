<body>
  <!-- HEADER -->
  <header>
    <!-- TOP HEADER -->
    <div id="top-header">
      <div class="container">
        <ul class="header-links pull-right">
          <?php
          foreach ($akun as $data) {
          ?>
          <li class="lidrop">
            <a class="lidrop-toggle" data-toggle="lidrop" aria-expanded="true">
              <i class="fa fa-dollar"></i>
              Rp. <?php echo $data->saldo_akun; ?>
            </a>
            <div class="lidrop-content">
              <a class="lidrop-a" href="<?php echo base_url('Topup'); ?>">Topup</a>
              <a class="lidrop-a" href="<?php echo base_url('Pembayaran'); ?>">Pembayaran</a>
              <a class="lidrop-a" href="#">Riwayat Topup</a>
            </div>
          </li>
          <li class="lidrop">
            <a class="lidrop-toggle" data-toggle="lidrop" aria-expanded="true">
              <i class="fa fa-user-o"></i>
              <?php echo $data->nama_akun; ?>
            </a>
            <div class="lidrop-content">
              <a class="lidrop-a" href="<?php echo base_url('Profil'); ?>">Profil</a>
              <a class="lidrop-a" href="#">Chat</a>
            </div>
          </li>
          <li><a href="<?php echo base_url('Main/logout'); ?>"><i class="fa fa-sign-out"></i>Logout</a></li>
          <?php
          }
          ?>
        </ul>
      </div>
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
              <a href="#" class="logo">
                <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="">
              </a>
            </div>
          </div>
          <!-- /LOGO -->

          <!-- SEARCH BAR -->
          <div class="col-md-6">
            <div class="header-search">
              <form>
                <select class="input-select">
                  <option value="0">Semua</option>
                  <?php
                  $val = 1;
                  foreach ($jenis as $kategori) {
                  ?>
                  <option value="<?php echo $val; ?>"><?php echo $kategori->nama_jenis_barang; ?></option>
                  <?php
                  }
                  ?>
                </select>
                <input class="input" placeholder="Isi Pencarian">
                <button class="search-btn">Cari</button>
              </form>
            </div>
          </div>
          <!-- /SEARCH BAR -->

          <!-- ACCOUNT -->
          <div class="col-md-3 clearfix">
            <div class="header-ctn">

              <!-- Wishlist -->
              <div class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  <i class="fa fa-shopping-bag"></i>
                  <span>Lelang</span>
                  <div class="qty">2</div>
                </a>
                <div class="lelang-dropdown">
                  <div class="lelang-btns">
                    <a href="<?php echo base_url('Lelang'); ?>">Barang Lelang <i class="fa fa-hourglass-half"></i></a>
                  </div>
                  <div class="lelang-btnbl">
                    <a href="<?php echo base_url('Lelang/kirim'); ?>">Kirim <i class="fa fa-truck"></i><div class="qty">2</div></a>
                  </div>
                  <div class="lelang-btns">
                    <a href="<?php echo base_url('Lelang/selesai'); ?>">Telah Selesai <i class="fa fa-history"></i><div class="qty">9</div></a>
                  </div>
                  <div class="lelang-btnbl">
                    <a href="<?php echo base_url('Tambah_Barang'); ?>">Tambah Barang <i class="fa fa-plus-square"></i></a>
                  </div>
                </div>
              </div>
              <!-- /Wishlist -->

              <!-- Cart -->
              <div class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  <i class="fa fa-shopping-cart"></i>
                  <span>Cart</span>
                  <div class="qty">3</div>
                </a>
                <div class="cart-dropdown">
                  <div class="cart-list">
                    <div class="product-widget">
                      <div class="product-img">
                        <img src="<?php echo base_url('assets/img/product01.png'); ?>" alt="">
                      </div>
                      <div class="product-body">
                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                        <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                      </div>
                      <button class="delete"><i class="fa fa-close"></i></button>
                    </div>

                    <div class="product-widget">
                      <div class="product-img">
                        <img src="<?php echo base_url('assets/img/product02.png'); ?>" alt="">
                      </div>
                      <div class="product-body">
                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                        <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                      </div>
                      <button class="delete"><i class="fa fa-close"></i></button>
                    </div>
                  </div>
                  <div class="cart-summary">
                    <small>3 Item(s) selected</small>
                    <h5>SUBTOTAL: $2940.00</h5>
                  </div>
                  <div class="cart-btns">
                    <a href="#">View Cart</a>
                    <a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              </div>
              <!-- /Cart -->

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
