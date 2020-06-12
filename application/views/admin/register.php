<html>
<head>
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/admin/assets/images/logo_min.png'); ?>">
  <title>ExKost Admin</title>
	<link href="<?php echo base_url('assets/admin/css/style.css'); ?>" rel="stylesheet">
</head>
<body class="login">
<div class="login-box">
    <h2>Register</h2>
		<?php
		if (isset($cekNama)) {
			echo "<h2>Nama ".$nama_admin." telah terdaftar</h2>";
		}
		 ?>
    <form class="" name="form_reg" action="<?php echo base_url('Admin/prosesRegister'); ?>" method="post">
        <div class="user-box">
            <input type="text" name="nama" required>
            <label>Username</label>
        </div>
		    <div class="user-box">
            <input type="password" name="password" required>
            <label>Password</label>
        </div>
        <div class="user-box">
            <input type="password" name="retypepass" required>
            <label>Konfirmasi Password</label>
        </div>

  </form>
	<form>
		<center><a href="#" onclick="document.forms['form_reg'].submit(); return false;">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Register
        </a>
		</center>
	</form>
	<form>
		<center>
			<a href="<?php echo base_url('Admin/login'); ?>">
			<span></span>
            <span></span>
            <span></span>
            <span></span>
            Login
        	</a>
		</center>
	</form>

</div>
</body>
</html>
