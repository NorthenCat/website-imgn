<?php 

	$ambil = $koneksi -> query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
	$pecah = $ambil -> fetch_assoc();
	$gambar = $pecah['gambar_produk'];
	if (file_exists("../img/$gambar")) {
		unlink("../img/$gambar");
	}

	$koneksi -> query("DELETE FROM produk WHERE id_produk='$_GET[id]'");

	echo "<script>alert('Product Deleted');</script>";
	echo "<script>window.location='index.php?page=product';</script>";
 ?>
