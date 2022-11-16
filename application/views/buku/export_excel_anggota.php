<head>
	<?php
	header("Content-type: application/vhd-ms-excel");
	header("Content-Disposition: attachment; filename=$title.xls");
	header("Pragma: no-chace");
	header("Expires:0");
	?>
</head>
<h3>
	<center>Laporan Data Anggota</center>
</h3>
<br />
<table class="table-data">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Nama Anggota</th>
			<th scope="col">Alamat</th>
			<th scope="col">Email</th>
			<th scope="col">Tanggal Daftar</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		foreach ($anggota as $b) {
		?>
			<tr>
				<th scope="row"><?= $no++; ?></th>
				<td><?= $b['nama']; ?></td>
				<td><?= $b['alamat']; ?></td>
				<td><?= $b['email']; ?></td>
				<td><?= $b['tanggal_input']; ?></td>
			</tr>
		<?php
		}
		?>
	</tbody>
</table>
</body>

</html>
