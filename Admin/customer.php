<h2 class="text-white" style="text-align: center;width: 100%;background-color: #212529;">CUSTOMER DATA</h2>
<table class="table table-bordered">
	<thead>
		<tr>
			<th width="1" style="text-align: center;">ID</th>
			<th>Full Name</th>
			<th>Email</th>
			<th>Password</th>
			<th>User Type</th>
			<th width="250" style="text-align:center;">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;$ambil = $koneksi -> query("SELECT * FROM akun"); ?>
		<?php
			while($pecah = $ambil -> fetch_assoc()){
		?>
		<tr>
			<td style="text-align: center;"><?php echo $nomor ?></td>
			<td><?php echo $pecah['nama_lengkap']; ?></td>
			<td><?php echo $pecah['email']; ?></td>
			<td><?php echo $pecah['password'] ?></td>
			<td><?php echo $pecah['tipeuser'] ?></td>
			<td style="text-align:center;">
				<a href="index.php?page=profilecustomer&id=<?php echo $pecah['id_akun'] ?>" class="btn btn-info">PROFILE</a>
				<a href="index.php?page=deletecustomer&id=<?php echo $pecah['id_akun'] ?>" class="btn btn-danger">DELETE</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>