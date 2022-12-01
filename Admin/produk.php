<style type="text/css">
a[id=add]{
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

a[id=add]:hover {
  background-color: #45a049;

</style>

<h2 class="text-white" style="text-align: center;width: 100%;background-color: #212529;">PRODUCT DATA</h2>
<table class="table table-bordered">
	<thead>
		<tr>
			<th width="1" style="text-align: center;">ID</th>
			<th style="text-align:center;">Product Name</th>
			<th width="1" style="text-align:center;">Product Type</th>
			<th style="text-align:center;">Product Price</th>
			<th style="text-align:center;">Product Picture</th>
			<th width="1" style="text-align:center;">Product Code</th>
			<th width="250" style="text-align:center;">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;$ambil = $koneksi -> query("SELECT * FROM produk ORDER BY nama_produk ASC"); ?>
		<?php
			while($pecah = $ambil -> fetch_assoc()){
		?>
		<tr>
			<td style="text-align:center; padding-top: 40px;"><?php echo $nomor ?></td>
			<td style="text-align:center; padding-top: 40px;"><?php echo $pecah['nama_produk']; ?></td>
			<td style="text-align:center; padding-top: 40px;"><?php echo $pecah['tipe_produk']; ?></td>
			<td style="text-align:center; padding-top: 40px;">Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
			<td style="text-align:center;"><img src="../img/<?php echo $pecah ['gambar_produk']; ?>" width='100' height='100'></td>
			<td style="text-align:center; padding-top: 40px;"><?php echo $pecah['id_produk'] ?></td>
			<td style="text-align:center; padding-top: 40px;">
				<a href="index.php?page=updateproduct&id=<?php echo $pecah['id_produk'] ?>" class="btn btn-warning">UPDATE</a>
				<a href="index.php?page=deleteproduct&id=<?php echo $pecah['id_produk'] ?>" class="btn btn-danger">DELETE</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<div class="col-lg text-center">
<a id='add' href="index.php?page=addproduct" class="btn btn-success">Add Product</a> 
</div>