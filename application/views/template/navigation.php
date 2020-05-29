<!-- NAVIGATION -->
<nav id="navigation">
  <!-- container -->
  <div class="container">
    <!-- responsive-nav -->
    <div id="responsive-nav">
      <!-- NAV -->
      <form method="post" name="fnew" action="<?php echo base_url('Cari/hasil'); ?>">
        <input type="hidden" name="min" value="0">
        <input type="hidden" name="max" value="5000000">
        <input type="hidden" name="sort" value="0">
        <input type="hidden" name="checkall" value="checkall">
      </form>
      <?php
      foreach ($jenlimbar as $formlimbar) {
      ?>
      <form method="post" name="f<?php echo $formlimbar->nama_jenis_barang; ?>" action="<?php echo base_url('Cari/hasil'); ?>">
        <input type="hidden" name="min" value="0">
        <input type="hidden" name="max" value="5000000">
        <input type="hidden" name="sort" value="0">
        <input type="hidden" name="kategori[]" value="<?php echo $formlimbar->id_jenis_barang; ?>">
      </form>
      <?php
      }
       ?>
      <ul class="main-nav nav navbar-nav">
        <li class="active"><a href="<?php echo base_url('Home'); ?>">Home</a></li>
        <li><a href="#" onclick="document.forms['fnew'].submit(); return false;">New</a></li>
        <?php
        foreach ($jenlimbar as $kategolimbar) {
        ?>
        <li><a href="#" onclick="document.forms['f<?php echo $kategolimbar->nama_jenis_barang; ?>'].submit(); return false;"><?php echo $kategolimbar->nama_jenis_barang; ?></a></li>
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
