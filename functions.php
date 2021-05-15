<?php

$conn = mysqli_connect("localhost","root","","login");


function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah terdaftar atau belum
	$result = mysqli_query($conn, "SELECT username FROM login WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('maaf username tersebut sudah terdaftar');
			 </script>";
		return false;
	}

	// cek konfirmasi password
	if( $password !== $password2) {
		echo "<script>
				alert('konfirmasi password tidak sesuai');
			 </script>";
		return false;
	}

	//enkripsi password

	$password = password_hash($password, PASSWORD_DEFAULT);

	// menambah user baru
	mysqli_query($conn, "INSERT INTO login VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);
}