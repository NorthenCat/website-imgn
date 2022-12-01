<?php 
if (!isset($_SESSION['akun'])) {
	echo "<script>alert('Login first before see your purchase history');window.location='index.php';</script>";
}
?>
<div class="container">
	<h2 class="text-white" style="text-align: center;margin-top: 10px;width: 100%;background-color: #212529;">HISTORY</h2>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th width="1" style="text-align:center;">ID</th>
				<th width="300">Date</th>
				<th width="300">Total</th>
				<th width="1" style="text-align:center;">Status</th>
				<th width="1" style="text-align:center;">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$id_akun = $_SESSION['akun']['id_akun'];
			$nomor = 1;
			$ambil = mysqli_query($koneksi,"SELECT * FROM pembelian WHERE id_akun = '$id_akun'");
			while($pecah = mysqli_fetch_assoc($ambil)){
				?>
				<tr>
					<td style="text-align:center;"><?php echo $nomor; ?></td>
					<td><?php echo $pecah['tanggal_pembelian'] ?></td>
					<td>Rp. <?php echo number_format($pecah['total_pembelian']) ?></td>
					<td style="text-transform: uppercase; text-align: center;"><b><?php echo $pecah['status_pembelian'] ?></b></td>
					<td style="text-align:center;">
						<?php if ($pecah['status_pembelian']=='pending') { ?>
							<a href="deletenota.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
						<?php } ?>
						<a href="index.php?page=note&id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-info btn-sm"><i class="fas fa-info"></i></a>
					</td>
				</tr>
				<?php $nomor++; } ?>
			</tbody>
		</table>
	</div>