<?php

include 'koneksi.php';

$ambil_nama_lengkap = $_POST['nama_lengkap'];
$email	= $_POST['email'];
$no_telepon = $_POST['no_telepon'];
$ambil_password = $_POST['password'];

$nama_lengkap = htmlspecialchars($ambil_nama_lengkap);
$password = htmlspecialchars($ambil_password);

$cek = mysqli_query($koneksi,"SELECT email FROM akun");
$hasilcek = mysqli_fetch_assoc($cek);

if ($hasilcek['email']==$email) {
	echo "<script>alert('Email has been used ! please use another email');window.location='../login.php';</script>";
}else{
	$query = "INSERT INTO akun (nama_lengkap, email, no_telepon, password) VALUES ('$nama_lengkap', '$email', '$no_telepon','$password')";
	$result = mysqli_query($koneksi, $query);

	if (!$result){
		die ("Not accessible").mysqli_errno($koneksi).'-'.mysqli_error($koneksi);
	}else{
		echo "<script>alert('Registered Successfully! Please Login To Enter Website');window.location='../login.php';</script>";
	}
}

?>