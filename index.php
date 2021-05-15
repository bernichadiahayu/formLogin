<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>HALAMAN UTAMA</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>

	<h1>Welcome to our website</h1>


</body>
</html>

<!--username dan password untuk login, username = rasya dan password = gaga -->
