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

      <div class="col-md-12">
        <!-- Billing Details -->
        <div class="billing-details">
          <div class="section-title">
            <h3 class="title">List Pembayaran</h3>
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
                    if ($list->status_topup=="belum") {
                    ?>
                    <h5 class="product-price">Belum Transfer</h5>
                    <?php
                    } elseif ($list->status_topup=="menunggu") {
                    ?>
                    <h5 class="product-price">Menunggu Konfirmasi</h5>
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
            if ($list->status_topup=="belum") {
            ?>
            <a href="<?php echo base_url('Pembayaran/pembayaran/'.$list->id_topup); ?>">
              <button class="primaryab-btn">Transfer</button>
            </a>
            <?php
            } elseif ($list->status_topup=="menunggu") {
            ?>
            <a href="<?php echo base_url('Pembayaran/pembayaran/'.$list->id_topup); ?>">
              <button class="primaryab-btn">Lihat</button>
            </a>
            <?php
            }?>
          </div>
          <div class="col-md-2">
            <button class="primarys-btn">Hapus</button>
          </div>
          <!-- /Review Form -->
        </div>
        <div class="col-md-12">
          <br><br>
        </div>

        <?php
        }
        ?>

        <!-- Reviews -->
        <div class="col-md-12">
          <br><br>
          <div id="reviews">
            <!--<ul class="reviews-pagination">
              <li class="active">1</li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>-->
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
