<!-- NAVIGATION -->
<nav id="navigation">
  <!-- container -->
  <div class="container">
    <!-- responsive-nav -->
    <div id="responsive-nav">
      <!-- NAV -->
      <ul class="main-nav nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Top Lelang</a></li>
        <?php
        foreach ($jenlimbar as $kategolimbar) {
        ?>
        <li><a href="#"><?php echo $kategolimbar->nama_jenis_barang; ?></a></li>
        <?php
        }
        ?>
      </ul>
      <!-- /NAV -->
    </div>
    <!-- /responsive-nav -->
  </div>
  <!-- /container -->
</nav>
<!-- /NAVIGATION -->
