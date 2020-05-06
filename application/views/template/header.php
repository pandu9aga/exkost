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
              <a class="lidrop-a" href="<?php echo base_url('Pembayaran'); ?>">Pembayaran <?php if ($qtytopup>0) {
              ?>
              <div class="qty"><?php echo $qtytopup; ?></div></a>
              <?php
              } ?>
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
                    <a href="<?php echo base_url('Lelang/kirim'); ?>">Kirim <i class="fa fa-cube"></i><div class="qty">2</div></a>
                  </div>
                  <div class="lelang-btns">
                    <a href="<?php echo base_url('Lelang/dikirim'); ?>">Sedang Dikirim <i class="fa fa-truck"></i><div class="qty">9</div></a>
                  </div>
                  <div class="lelang-btnbl1">
                    <a href="<?php echo base_url('Lelang/konfirm_transfer'); ?>">Konfirm Transfer <i class="fa fa-check"></i><div class="qty">9</div></a>
                  </div>
                  <div class="lelang-btns1">
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
                <div class="lelang-dropdown">
                  <div class="lelang-btns">
                    <a href="<?php echo base_url('Cart/berlangsung'); ?>">Berlangsung <i class="fa fa-hourglass-half"></i></a>
                  </div>
                  <div class="lelang-btnbldrop">
                    <li class="btnlidrop">
                      <a class="btnlidrop-toggle" data-toggle="btnlidrop" aria-expanded="true">Menang <i class="fa fa-trophy"></i><div class="qty">2</div></a>
                      <div class="btnlidrop-content">
                        <a class="btnlidrop-a" href="<?php echo base_url('Menang/tunggu_kirim'); ?>">Tunggu Dikirim <i class="fa fa-cube"></i><div class="qty">2</div></a>
                        <a class="btnlidrop-a" href="<?php echo base_url('Menang/dikirim'); ?>">Dikirim <i class="fa fa-truck"></i><div class="qty1">2</div></a>
                        <a class="btnlidrop-a" href="<?php echo base_url('Menang/selesai'); ?>">Selesai <i class="fa fa-check"></i></a>
                      </div>
                    </li>
                  </div>
                  <div class="lelang-btns">
                    <a href="<?php echo base_url('Gagal'); ?>">Kalah <i class="fa fa-times-circle"></i></a>
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
