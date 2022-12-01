<h2 class="text-white" style="text-align: center;width: 100%;background-color: #212529;">BUYER DATA</h2>
<table class="table table-bordered">
	<thead>
		<tr>
			<th width="1" style="text-align:center;">ID</th>
			<th>Buyer Name</th>
			<th>Buy Date</th>
			<th width="1" style="text-align:center;">Receipt</th>
			<th>Total Buy</th>
			<th width="100" style="text-align:center;">Status</th>
			<th width="250" style="text-align:center;">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;$ambil = $koneksi -> query("SELECT * FROM pembelian JOIN akun ON pembelian.id_akun=akun.id_akun ORDER BY id_pembelian ASC"); ?>
		<?php
			while($pecah = $ambil -> fetch_assoc()){
		?>
		<tr>
			<td style="text-align:center;"><?php echo $nomor ?></td>
			<td><?php echo $pecah['nama_lengkap']; ?></td>
			<td><?php echo $pecah['tanggal_pembelian']; ?></td>
			<td style="text-align:center;"><?php echo $pecah['id_pembelian'] ?></td>
			<td>Rp. <?php echo number_format($pecah['total_pembelian'])?></td>
			<td style="text-transform:uppercase; text-align: center;"><b><?php echo $pecah['status_pembelian']?></b></td>
			<td style="text-align:center;">
				<a href="index.php?page=detail&id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-primary">DETAIL</a>
				<?php if ($pecah["status_pembelian"]=="pending"){?>
					<a href="index.php?page=status&id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-success">PAID</a>
				<?php } ?>
				
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>