<?php 
	session_start();
	include 'db/koneksi.php';
	mysqli_query($koneksi,"DELETE FROM pembelian_produk  WHERE id_pembelian = '$_GET[id]'");
	mysqli_query($koneksi,"DELETE FROM pembelian  WHERE id_pembelian = '$_GET[id]'");
	echo "<script>alert('Note Deleted');</script>";
	echo "<script>window.location='index.php?page=history';</script>";
 ?>