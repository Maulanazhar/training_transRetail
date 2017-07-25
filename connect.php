<?php

	$connect = mysqli_connect("localhost", "root", "", "training_trans")
		or die ("Gagal koneksi ke server".mysqli_error());
	session_start();
	if(!(isset($_SESSION['id']))){
		$_SESSION['id']="nouser";
	}
?>