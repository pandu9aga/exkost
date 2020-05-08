<html>
	<link href="<?php echo base_url('assets/admin/css/style.css'); ?>" rel="stylesheet">
<body class="login">
<div class="login-box">
    <h2>Account Login</h2>

		<?php
		if (isset($login)) {
			echo "<h2>Nama atau password salah </h2>";
		}
		 ?>

    <form class="" name="form_log" action="<?php echo base_url('Admin/prosesLogin'); ?>" method="post">
        <div class="user-box">
            <input type="text" name="nama" required>
            <label>Username</label>
        </div>
		    <div class="user-box">
            <input type="password" name="password" required>
            <label>Password</label>
        </div>

  </form>
	<form>
		<center><a href="#" onclick="document.forms['form_log'].submit(); return false;">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Login
        </a>
		</center>
	</form>
	<form>
		<center>
			<a href="<?php echo base_url('Admin/register'); ?>">
			<span></span>
            <span></span>
            <span></span>
            <span></span>
            Register
        	</a>
		</center>
	</form>
</div>
</body>
</html>
