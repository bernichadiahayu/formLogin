<?php
require 'functions.php';

if ( isset($_POST["register"]) ){

	if( registrasi($_POST) > 0 ){
		echo "<script>
				alert('user baru berhasil ditambahkan');
				</script>";
	} else {
		echo mysqli_error($conn);
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>REGISTRASI</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<style>
		label {
			display: block;
		}
	</style>
</head>
<body>

<div  class="container">
	<h3>REGISTRASI</h3>

	<form action="" method="post">
		
		<ul>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" id="username">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" id="password">	
			</div>
			<div class="form-group">
				<label for="password2">Konfirmasi Password</label>
				<input type="password" name="password2" id="password2">
			</div>
			<br>
			<br>
			<button type="submit" name="register">Register your account</button>
			<a href="login.php">LOGIN</a>
		</ul>


	</form>

</div>

</body>
</html>