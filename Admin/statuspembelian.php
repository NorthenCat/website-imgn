<?php 

	$statuspembelian = "paid";
	$ambil = mysqli_query($koneksi,"UPDATE pembelian SET status_pembelian= '$statuspembelian' WHERE id_pembelian = '$_GET[id]'");
 	echo "<script>window.location='index.php?page=buyer';</script>";
 ?>