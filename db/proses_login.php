<?php 
session_start();

include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$data = mysqli_query($koneksi,"SELECT * FROM akun WHERE email='$email' and password='$password'");

$cek = mysqli_num_rows($data);

if($cek > 0){
 
	$data = mysqli_fetch_assoc($data);
	
	if($data['tipeuser']=="admin"){
		$akun = $data;
		$_SESSION['nama_lengkap'] = $akun['nama_lengkap'];
		$_SESSION['tipeuser'] = $akun['tipeuser'];
		$_SESSION['akun'] = $akun;
		echo "<script>alert('You login as Admin !');window.location='../Admin/index.php';</script>"; 
	}elseif($data['tipeuser']=="pengguna"){
		$akun = $data;
		$_SESSION['nama_lengkap'] = $akun['nama_lengkap'];
		$_SESSION['tipeuser'] = $akun['tipeuser'];
		$_SESSION['akun'] = $akun;
		echo "<script>alert('Successfully login!');window.location='../index.php';</script>"; 
	}

}else{
	echo "<script>alert('Username / Password Salah ! Silahkan Cek Kembali');window.location='../login.php';</script>"; 
}
?>