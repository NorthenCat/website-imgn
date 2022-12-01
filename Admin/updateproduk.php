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

<h2 class="text-white" style="text-align: center;width: 100%;background-color: #212529;">PRODUCT DATA</h2>
<?php 
	$ambil = mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk='$_GET[id]'");
	$pecah = mysqli_fetch_assoc($ambil);
	$tipe = $pecah['tipe_produk'];
 ?>

 <form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Product Name</label>
		<input type="text" placeholder="Product Name" class="form-control" name="nama_produk" value="<?php echo $pecah['nama_produk']; ?>">
	</div>
	<div class="form-group">
		<label>Product Type</label>
		<select name="tipe_produk">
			<option value="Hoodie" <?php if ($tipe=='Hoodie') echo 'selected="selected"'?>>Hoodie</option>
			<option value="T-Shirt" <?php if ($tipe=='T-Shirt') echo 'selected="selected"'?>>T-Shirt</option>
		</select>
	</div>
	<div class="form-group">
		<label>Product Description</label>
		<textarea class="form-control" name="deskripsi_produk" ><?php echo $pecah['deskripsi_produk']; ?></textarea>
	</div>
	<div class="form-group">
		<label>Product Price (Rp)</label>
		<input type="number" placeholder="Price (Number Only)" class="form-control" name="harga_produk" value="<?php echo $pecah['harga_produk'] ?>" onkeyup="numbersOnly(this)">
	</div>
	<div class="form-group" style="padding-top:10px;">
		<img src="../img/<?php echo $pecah['gambar_produk'] ?>" width="100" height="100">
	</div>
	<div class="form-group">
		<label>Change Product Picture</label>
		<input type="file" class="form-control" name="gambar_produk" >
	</div>
	<div class="col-lg text-center" style="padding-top: 10px; padding-bottom: 10px;">
	<button class="btn btn-warning" type="submit" name="update">Update</button>
	</div>
</form>
<?php 

	if (isset($_POST['update'])) {
		$namagambar = $_FILES ['gambar_produk']['name'];
		$lokasigambar = $_FILES ['gambar_produk']['tmp_name'];

		if (!empty($lokasigambar)) {
			move_uploaded_file($lokasigambar, "../img/$namagambar");

			mysqli_query($koneksi, "UPDATE produk SET nama_produk='$_POST[nama_produk]', harga_produk='$_POST[harga_produk]', tipe_produk='$_POST[tipe_produk]', deskripsi_produk='$_POST[deskripsi_produk]', gambar_produk='$namagambar' WHERE id_produk='$_GET[id]'");
		} else{
			mysqli_query($koneksi, "UPDATE produk SET nama_produk='$_POST[nama_produk]', harga_produk='$_POST[harga_produk]', tipe_produk='$_POST[tipe_produk]',deskripsi_produk='$_POST[deskripsi_produk]' WHERE id_produk='$_GET[id]'");
		}
		echo "<script>alert('Product Updated !);</script>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?page=product'>";
	}

 ?>

