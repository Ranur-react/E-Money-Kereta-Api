<?php
	$severname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "db_emoney_iqbal_upi";

	$conn = new mysqli($severname, $username, $password, $dbname);
	if(!$conn){
		die("koneksi gagal" . mysqli_connect_error());
	}
	//echo "koneksi berhasil";
?>