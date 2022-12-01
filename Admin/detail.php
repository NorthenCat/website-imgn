<h2 class="text-white" style="text-align: center;width: 100%;background-color: #212529;">DETAIL</h2>
	<?php 
	$ambil = $koneksi -> query("SELECT * FROM pembelian JOIN akun ON pembelian.id_akun=akun.id_akun WHERE pembelian.id_pembelian='$_GET[id]'"); 

	$detail = $ambil -> fetch_assoc();
	?>
	<div class="row" style="padding-bottom:10px;">
		<div class="col-md-4">
			<h3>Customer</h3>
			<strong>Name : <?php echo $detail['nama_lengkap']; ?></strong> <br>
			<strong>Email : <?php echo $detail['email']; ?></strong><br>
			<strong>Number : <?php echo $detail['no_telepon']; ?></strong>
		</div>
		<div class="col-md-4">
			<h3>Delivery</h3>
			<strong>City : <?php echo $detail['nama_kota'] ?></strong><br>
			<strong>Address : <?php echo $detail['alamat_pengiriman'] ?></strong><br>
			<strong>Shipping Costs : Rp. <?php echo number_format($detail['tarif']) ?></strong>
		</div>
		<div class="col-md-4">
			<h3>Purchase</h3>
			<strong>Receipt Number : <?php echo $detail['id_pembelian'] ?></strong><br>
			<strong>Purchase Date : <?php echo $detail['tanggal_pembelian']; ?></strong><br>
			<strong>Total Purchase : Rp. <?php echo number_format($detail['total_pembelian']); ?></strong>
		</div>
	</div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th width="1" style="text-align: center;">ID</th>
				<th width="150" style="text-align:center;">Product</th>
				<th width="150" style="text-align:center;">Price</th>
				<th width="1" style="text-align: center;">Size</th>
				<th width="1" style="text-align: center;">Color</th>
				<th width="1" style="text-align: center;">Total</th>
				<th width="130" style="text-align: center;">Sub Price</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$nomor=1;
			$ambil = $koneksi -> query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'");
			?>
			<?php while($pecah = $ambil -> fetch_assoc()){ ?>
				<tr>
					<td style="text-align:center;"><?php echo $nomor; ?></td>
					<td><?php echo $pecah['nama_produk'] ?></td>
					<td>Rp. <?php echo number_format($pecah['harga_produk'])?></td>
					<td><?php echo $pecah['ukuran_produk'] ?></td>
					<td><?php echo $pecah['warna_produk'] ?></td>
					<td style="text-align:center;"><?php echo $pecah['jumlah'] ?></td>
					<td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
				</tr>
				<?php $nomor++; ?>
			<?php } ?>
		</tbody>
	</table>