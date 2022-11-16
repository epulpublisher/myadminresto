<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<style type="text/css">
		.table-data {
			width: 100%;
			border-collapse: collapse;
		}

		.table-data tr th,
		.table-data tr td {
			border: 1px solid black;
			font-size: 11pt;
			font-family: Verdana;
			padding: 10px 10px 10px 10px;
		}

		h3 {
			font-family: Verdana;
		}
	</style>
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
