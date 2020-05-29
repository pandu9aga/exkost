<body>
  <!-- HEADER -->
  <header>
    <!-- TOP HEADER -->
    <div id="top-header">
      <div class="container">
        <ul class="header-links pull-right">
          <?php
          foreach ($akun as $data) {
            $id_akun = $data->id_akun;
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
              <div class="qty"><?php echo $qtytopup; ?></div>
              <?php
              } ?></a>
              <a class="lidrop-a" href="<?php echo base_url('Riwayat_Topup'); ?>">Riwayat Topup <?php if ($qtyritop>0) {
              ?>
              <div class="qty1"><?php echo $qtyritop ?></div>
              <?php
              } ?></a>
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
              <form method="post" name="fskey" action="<?php echo base_url('Cari/keyword'); ?>">
                <input type="hidden" name="min" value="0">
                <input type="hidden" name="max" value="5000000">
                <input type="hidden" name="sort" value="4">
                <input type="hidden" name="checkall" value="checkall">
                <input class="input" type="text" name="key" placeholder="Isi Pencarian" <?php if (isset($keyword)) {
                  echo "value='".$keyword."'";
                } ?>required oninvalid="this.setCustomValidity('Masukkan kata kunci')" oninput="setCustomValidity('')">
                <button class="search-btn"><i class="fa fa-search"></i></button>
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
                  <span>Lelang</span><?php
                  $CI =& get_instance();
                  $CI->load->model('Barang_model');

                  $lim = array('status_lelang' => 'selesai','status_gagal' => '');
                  $queryk = $CI->Barang_model->jumlah_mydatalim($id_akun,$lim);
                  $lim = array('status_lelang' => 'kirim' );
                  $querydk = $CI->Barang_model->jumlah_mydatalim($id_akun,$lim);
                  $lim = array('status_lelang' => 'terima' );
                  $querykt = $CI->Barang_model->jumlah_mydatalim2($id_akun,$lim);
                  //$lim = array('status_gagal' => 'gagal','status_transfer' => 'terima' );
                  //$queryts = $CI->Barang_model->jumlah_mydatalim3($id_akun,$lim);

                  $qtyLelang = $queryk+$querydk+$querykt;//+$queryts;

                  if ($qtyLelang!=0) {
                  ?>
                  <div class="qty"><?php echo "!"; ?></div>
                  <?php
                  }
                   ?>
                </a>
                <div class="lelang-dropdown">
                  <div class="lelang-btns">
                    <a href="<?php echo base_url('Lelang'); ?>">Barang Lelang <i class="fa fa-hourglass-half"></i></a>
                  </div>
                  <div class="lelang-btnbl">
                    <a href="<?php echo base_url('Lelang/kirim'); ?>">Kirim <i class="fa fa-cube"></i><?php
                    if ($queryk!=0) {
                      ?>
                      <div class="qty"><?php echo $queryk; ?></div>
                      <?php
                    }
                    ?></a>
                  </div>
                  <div class="lelang-btns">
                    <a href="<?php echo base_url('Lelang/dikirim'); ?>">Sedang Dikirim <i class="fa fa-truck"></i><?php
                    if ($querydk!=0) {
                      ?>
                      <div class="qty"><?php echo $querydk; ?></div>
                      <?php
                    }
                    ?></a>
                  </div>
                  <div class="lelang-btnbl1">
                    <a href="<?php echo base_url('Lelang/konfirm_transfer'); ?>">Konfirm Transfer <i class="fa fa-check"></i><?php
                    if ($querykt!=0) {
                      ?>
                      <div class="qty"><?php echo $querykt; ?></div>
                      <?php
                    }
                    ?></a>
                  </div>
                  <div class="lelang-btns1">
                    <a href="<?php echo base_url('Lelang/selesai'); ?>">Telah Selesai <i class="fa fa-history"></i><?php
                    //if ($queryts!=0) {
                      ?>
                      <!--div class="qty"><?php //echo $queryts; ?></div-->
                      <?php
                    //}
                    ?></a>
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
                  <span>Cart</span><?php
                  $CI->load->model('Menang_model');

                  $qcek = 0;
                  $qcek2 = 0;

                  $qgselesai = $CI->Menang_model->getWaitsend($id_akun)->num_rows();
                  if ($qgselesai!=0) {
                    $qdselesai = $CI->Menang_model->getWaitsend($id_akun)->result();
                    foreach ($qdselesai as $qs) {
                      $qidselesai[] = $qs->id_tawaran;
                    }
                    $qcek = $CI->Menang_model->cekWin($qidselesai)->num_rows();
                  }

                  $qgselesai2 = $CI->Menang_model->getInsend($id_akun)->num_rows();
                  if ($qgselesai2!=0) {
                    $qdselesai2 = $CI->Menang_model->getInsend($id_akun)->result();
                    foreach ($qdselesai2 as $qs2) {
                      $qidselesai2[] = $qs2->id_tawaran;
                    }
                    $qcek2 = $CI->Menang_model->cekWin($qidselesai2)->num_rows();
                  }

                  $qtyMenang = $qcek+$qcek2;

                  //$qtyGagal = 0;
                  //$qgetgagal = $this->Menang_model->getGagal($id_akun)->num_rows();
                  //if ($qgetgagal!=0) {
                    //$qdgagal = $this->Menang_model->getGagal($id_akun)->result();
                    //foreach ($qdgagal as $qg) {
                      //$qqtinggi = $this->Menang_model->getHighws($qg->id_barang)->result();
                      //foreach ($qqtinggi as $qtinggi) {
                        //$qttinggi = $qtinggi->jumlah_tawaran;
                      //}
                      //if ($qg->jumlah_tawaran==$qttinggi) {
                        //$qtyGagal++;
                      //}
                    //}
                  //}

                  $qtyCart = $qtyMenang;//+$qtyGagal;
                  if ($qtyCart!=0) {
                  ?>
                  <div class="qty"><?php echo "!"; ?></div>
                  <?php
                  }
                  ?>
                </a>
                <div class="lelang-dropdown">
                  <div class="lelang-btns">
                    <a href="<?php echo base_url('Cart/berlangsung'); ?>">Berlangsung <i class="fa fa-hourglass-half"></i></a>
                  </div>
                  <div class="lelang-btnbldrop">
                    <li class="btnlidrop">
                      <a class="btnlidrop-toggle" data-toggle="btnlidrop" aria-expanded="true">Menang <i class="fa fa-trophy"></i><?php
                      if ($qtyMenang!=0) {
                      ?>
                      <div class="qty"><?php echo $qtyMenang; ?></div>
                      <?php
                      }
                      ?></a>
                      <div class="btnlidrop-content">
                        <a class="btnlidrop-a" href="<?php echo base_url('Menang/tunggu_kirim'); ?>">Tunggu Dikirim <i class="fa fa-cube"></i><?php
                        if ($qcek!=0) {
                        ?>
                        <div class="qty"><?php echo $qcek; ?></div>
                        <?php
                        }
                        ?></a>
                        <a class="btnlidrop-a" href="<?php echo base_url('Menang/dikirim'); ?>">Dikirim <i class="fa fa-truck"></i><?php
                        if ($qcek2!=0) {
                        ?>
                        <div class="qty1"><?php echo $qcek2; ?></div>
                        <?php
                        }
                        ?></a>
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
