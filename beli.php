<div class="container">
	<h2 class="text-white" style="text-align: center;margin-top: 10px;width: 100%;background-color: #212529;">PRODUCT DETAIL</h2>	
	<div class="row">
		<?php 
		$ambil = mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk='$_GET[id]'");
		$pecah = mysqli_fetch_assoc($ambil);
		?>
		<div class="col-md-6">
			<img src="img/<?php echo $pecah['gambar_produk'];?>" width='550' height='550' style="border-radius: 20px; margin-bottom: 20px;">
		</div>
		<div class="col-md-6">
			<h2><?php echo $pecah['nama_produk'] ?></h2>
			<h2>Rp. <?php echo number_format($pecah['harga_produk']); ?></h2>
			<p style="text-align:justify;"> <?php echo $pecah ['deskripsi_produk'] ?> </p>
			<hr>
			<form method="POST" enctype="multipart/form-data">
				<label style="color: gray;"><small>Product Code : <?php echo $pecah['id_produk'] ?></small></label><br>
				<label><strong>Size : XS | S | M | XL | XXL</strong></label>
				<select class="form-control" name="size" style="font-style: italic;">
					<option value="XS">XS</option>
					<option value="S">S</option>
					<option value="M">M</option>
					<option value="XL">XL</option>
					<option value="XXL">XXL</option>
				</select>
				<label><strong>Color : Midnight Black | Ebony Black</strong></label>
				<select class="form-control" name="color" style="font-style: italic;">
					<option value="Midnight Black">Midnight Black</option>
					<option value="Ebony Black">Ebony Black</option>
				</select>
				<label><strong>Amount</strong></label>
				<input class="form-control" style="width:25%;" type="number" name="jumlah" min="1" value="1">
				<button class="btn btn-success" type="submit" name="addcart" style="float: right;">Add to Cart</button>
			</form>
		</div>
	</div>
</div>


<?php 
if (isset($_POST['addcart'])) {
	if (!isset($_SESSION['akun'])) {
		echo "<script>alert('Login first before use this function');window.location='index.php';</script>";
	}else{
		$id_produk = $_GET['id'];
		$color = $_POST['color'];
		$size = $_POST['size'];
		$jumlah    = $_POST['jumlah'];
		$_SESSION['keranjang'][$id_produk] = [
			'jumlah' => $jumlah,
			'size' => $size,
			'color' => $color
		];
		echo "<script>alert('Added to cart !');window.location='index.php';</script>";
	}
}
?>