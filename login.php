<?php
session_start();

// cek cookie
if(isset($_COOKIE['login']) ) {
	if( $_COOKIE['login'] == 'true' ) {
		$_SESSION['login'] = true;
	}
}

if( isset($_SESSION["login"]) ) {
	header("Location: index.php");
	exit;
}


require 'functions.php';

if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username'");

	// cek username

	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			// set session
			$_SESSION["login"] = true;

			// cek remember me
			if( isset($_POST['remember']) ) {
				// buat cookie
				setcookie('login', 'true', time() + 60);
			}


			header("Location: index.php");
			exit;
		}
	}

	$error = true;
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>

<?php if( isset($error) ) : ?>
	<p style="color: red; font-style: italic;">username atau password anda salah</p>
<?php endif; ?>

<div class="container">
	<h3 class="text-center">LOGIN</h3>
	<form action="" method="post">
	
	<ul>
		<div class="form-group">
			<label for="username">Username</label><br>
			<input type="text" name="username" id="username">
		</div>
		<div class="form-group">
			<label for="password">Password</label><br>
			<input type="password" name="password" id="password">
		</div>
		<div class="form-group">
			<input type="checkbox" name="remember" id="remember">
			<label for="remember">Remember me</label>	
		</div>
			<button type="submit" name="login">Login</button>
			<button type="reset" class="btn btn-danger">Reset</button><br>
			<a href="registrasi.php">Register now</a>

	</ul>


	</form>	
</div>

</body>
</html>