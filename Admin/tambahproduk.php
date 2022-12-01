<style>
select {
	width: 100%;
	padding: 10px 10px;
	margin: 3px 0;
	display: inline-block;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
}
button {
	width: 100%;
	background-color: #4CAF50;
	color: white;
	padding: 14px 20px;
	margin: 8px 0;
	border: none;
	border-radius: 4px;
	cursor: pointer;
}

button:hover {
	background-color: #45a049;
}
</style>


<h2 class="text-white" style="text-align: center;width: 100%;background-color: #212529;">ADD PRODUCT</h2>	
<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Product Name</label>
		<input type="text" placeholder="Product Name" class="form-control" name="nama_produk" required>
	</div>
	<div class="form-group">
		<label>Product Type</label>
		<select name="tipe_produk">
			<option value="Hoodie">Hoodie</option>
			<option value="T-Shirt">T-Shirt</option>
		</select>
	</div>
	<div class="form-group">
		<label>Product Description</label>
		<textarea class="form-control" name="deskripsi_produk" required></textarea>
	</div>
	<div class="form-group">
		<label>Product Price (Rp)</label>
		<input type="number" placeholder="Price (Number Only)" class="form-control" name="harga_produk" onkeyup="numbersOnly(this)" required>
	</div>
	<div class="form-group">
		<label>Product Picture</label>
		<input type="file" class="form-control" name="gambar_produk" required>
	</div>
	<div class="col-lg text-center" style="padding-top: 10px; padding-bottom: 10px;">
		<button class="btn btn-primary" type="submit" name="save">Add</button>
	</div>
</form>
<?php 
if (isset($_POST['save'])) {
	$nama = $_FILES['gambar_produk']['name'];
	$lokasi = $_FILES['gambar_produk']['tmp_name'];
	move_uploaded_file($lokasi, "../img/".$nama);
	$ambil = mysqli_query($koneksi, "INSERT INTO produk (nama_produk,tipe_produk,harga_produk,deskripsi_produk,gambar_produk) VALUES ('$_POST[nama_produk]','$_POST[tipe_produk]','$_POST[harga_produk]','$_POST[deskripsi_produk]', '$nama')");

	echo "<script>alert('Product Added !);</script>";
	echo "<script>window.location='index.php?page=product';</script>";
}

?>
