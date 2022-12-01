<?php 

	$ambil = mysqli_query($koneksi, "SELECT * FROM akun WHERE id_akun = '$_GET[id]'");
	$pecah = mysqli_fetch_assoc($ambil);

	mysqli_query($koneksi,"DELETE FROM akun where id_akun = '$_GET[id]'");
	echo "<script>window.location='index.php?page=customer'</script>"

?>