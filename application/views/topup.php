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
        <h3 class="breadcrumb-header">TOPUP SALDO</h3>
        <ul class="breadcrumb-tree">
          <li><a href="Home">Home</a></li>
          <li class="active">TOPUP</li>
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
  <center><h2> TOPUP SALDO ANDA DISINI</h2></center>
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <div class="col-md-4 col-xs-6">
        <div class="topup">
          <div class="topup-img">
            <img src="<?php echo base_url('assets/img/10k.png'); ?>" alt="">
          </div>
          <div class="topup-body">
            <h3>TOPUP<br><br><br></h3>
            <a href="Checkout/index/1" class="cta-btn">Beli Sekarang <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-xs-6">
        <div class="topup">
          <div class="topup-img">
            <img src="<?php echo base_url('assets/img/20k.png'); ?>" alt="">
          </div>
          <div class="topup-body">
            <h3>TOPUP<br><br><br></h3>
            <a href="Checkout/index/2" class="cta-btn">Beli Sekarang <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-xs-6">
        <div class="topup">
          <div class="topup-img">
            <img src="<?php echo base_url('assets/img/50k.png'); ?>" alt="">
          </div>
          <div class="topup-body">
            <h3>TOPUP<br><br><br></h3>
            <a href="Checkout/index/3" class="cta-btn">Beli Sekarang <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-xs-6">
        <div class="topup">
          <div class="topup-img">
            <img src="<?php echo base_url('assets/img/100k.png'); ?>" alt="">
          </div>
          <div class="topup-body">
            <h3>TOPUP<br><br><br></h3>
            <a href="Checkout/index/4" class="cta-btn">Beli Sekarang <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-xs-6">
        <div class="topup">
          <div class="topup-img">
            <img src="<?php echo base_url('assets/img/500k.png'); ?>" alt="">
          </div>
          <div class="topup-body">
            <h3>TOPUP<br><br><br></h3>
            <a href="Checkout/index/5" class="cta-btn">Beli Sekarang <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-xs-6">
        <div class="topup">
          <div class="topup-img">
            <img src="<?php echo base_url('assets/img/1000k.png'); ?>" alt="">
          </div>
          <div class="topup-body">
            <h3>TOPUP<br><br><br></h3>
            <a href="Checkout/index/6" class="cta-btn">Beli Sekarang <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->

<?php $this->load->view("template/footer.php") ?>
<?php $this->load->view("template/js.php") ?>
