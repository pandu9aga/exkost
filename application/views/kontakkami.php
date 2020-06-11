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
        <h3 class="breadcrumb-header">KONTAK KAMI</h3>
        <ul class="breadcrumb-tree">
          <li><a href="Home">Home</a></li>
          <li class="active">KONTAK KAMI</li>
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
					<br/>
					<center>
						<div class="col-md-12 col-xs-6">					
							<div class="tentang-img">
								<img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="">
							</div>
						</div>
						<br/>
						<div class="col-md-12">
						<div class="newsletter">
							<p><i class="fa fa-envelope"></i> exkost.decode@gmail.com</p>
							<p><i class="fa fa-phone"></i><strong> 085536539055 </strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
						</div>
						</div>
					</center>
						
				</div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->

<?php $this->load->view("template/footer.php") ?>
<?php $this->load->view("template/js.php") ?>
