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
        <h3 class="breadcrumb-header">Menang</h3>
        <ul class="breadcrumb-tree">
          <li><a href="<?php echo base_url('Home'); ?>">Home</a></li>
          <li class="active">Selesai</li>
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
            <h3 class="title">Selesai</h3>
          </div>
        </div>
        <!-- /Billing Details -->

        <?php
        foreach ($cart as $list) {
        ?>

        <div class="col-md-12">
          <!-- Rating -->
          <div class="col-md-1">
            <h4><i class="fa fa-minus"></i></h4>
          </div>
          <div class="col-md-3">
            <img alt="" height="135px" width="200px" src="<?php echo base_url('assets/barang/'.$list->nama_gambar_barang); ?>">
          </div>
          <!-- /Rating -->
          <!-- Reviews -->
          <div class="col-md-4">
            <div id="reviews">
              <ul class="reviews">
                <li>
                  <div class="review-heading">
                    <h5 class="name"><?php echo $list->nama_barang; ?></h5>
                    <h5 class="date">Tawaran Anda</h5>
                    <p class="date">Rp. <?php echo $list->jumlah_tawaran; ?></p>
                  </div>
                  <div class="review-body">
                    <h5 class="product-pricer"><i class="fa fa-check"></i>Selesai</h5>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!-- /Reviews -->
          <!-- Review Form -->
          <div class="col-md-2">
            <a href="<?php echo base_url('Barang/index/'.$list->id_barang); ?>">
              <button class="primaryab-btn">Lihat</button>
            </a>
          </div>
          <div class="col-md-2">
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
