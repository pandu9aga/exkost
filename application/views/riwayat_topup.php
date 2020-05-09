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
        <h3 class="breadcrumb-header">Riwayat Topup</h3>
        <ul class="breadcrumb-tree">
          <li><a href="<?php echo base_url('Home'); ?>">Home</a></li>
          <li class="active">Riwayat Topup</li>
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

      <div class="col-md-12">
        <!-- Billing Details -->
        <div class="billing-details">
          <div class="section-title">
            <h3 class="title">Riwayat Topup</h3>
          </div>
        </div>
        <!-- /Billing Details -->

        <?php
        foreach ($topup as $list) {
        ?>

        <div class="col-md-12">
          <!-- Rating -->
          <div class="col-md-1">
            <h4><i class="fa fa-minus"></i></h4>
          </div>
          <div class="col-md-3">
            <img alt="" height="135px" width="200px" src="<?php echo base_url('assets/topup/'.$list->bukti_transfer); ?>">
          </div>
          <!-- /Rating -->
          <!-- Reviews -->
          <div class="col-md-4">
            <div id="reviews">
              <ul class="reviews">
                <li>
                  <div class="review-heading">
                    <h5 class="name">Rp. <?php echo $list->nominal; ?></h5>
                    <p class="date"><?php echo $list->waktu_topup; ?></p>
                  </div>
                  <div class="review-body">
                    <?php
                    if ($list->status_topup=="sukses") {
                    ?>
                    <h5 class="product-price">Saldo Rp. <?php echo $list->nominal; ?> berhasil ditambahkan</h5>
                    <?php
                    } elseif ($list->status_topup=="gagal") {
                    ?>
                    <h5 class="product-price">Saldo gagal ditambahkan</h5>
                    <?php
                    }?>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!-- /Reviews -->
          <!-- Review Form -->
          <div class="col-md-2">
            <?php
            if ($list->status_topup=="sukses") {
            ?>
            <a href="<?php echo base_url('Riwayat_Topup/detail_riwayat/'.$list->id_topup); ?>">
              <button class="primaryab-btn">Lihat</button>
            </a>
            <?php
            } elseif ($list->status_topup=="gagal") {
            ?>
            <a href="<?php echo base_url('Riwayat_Topup/detail_riwayat/'.$list->id_topup); ?>">
              <button class="primaryab-btn">Lihat</button>
            </a>
            <?php
            }?>
          </div>
          <div class="col-md-2">
            <?php
            //if ($list->status_topup=="sukses") {
            ?>
            <!--<button class="primarys-btn">Hapus</button>
            <?php
            //} elseif ($list->status_topup=="gagal") {
            ?>
            <button class="primarys-btn">Hapus</button>-->
            <?php
            //}?>
          </div>
          <!-- /Review Form -->
        </div>
        <div class="col-md-12">
          <?php
          foreach ($riwayatnot as $not) {
            if ($not->id_topup==$list->id_topup) {
              if ($not->status_baca=='belum') {
              ?>
              <p class="riwayat">New</p>
              <?php
              }
            }
          }
           ?>
          <br><br>
        </div>

        <?php
        }
        ?>

        <!-- Reviews -->
        <div class="col-md-12">
          <br><br>
          <div id="reviews">
            <?php
              echo $pagination;
            ?>
          </div>
        </div>
        <!-- /Reviews -->
      </div>
      <br>

    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->

<?php $this->load->view("template/footer.php") ?>
<?php $this->load->view("template/js.php") ?>
