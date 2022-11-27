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
			text-decoration: underline;
		}

		h4 {
			font-family: Verdana;
			font-size: 11pt;
		}
	</style>
	<h3>
		<center>Laporan Member Bina Saran Resto</center>
	</h3>
	<br>
	<right>
		<h4>Dibuat tanggal : <?php $today = date("d F Y g:i A");
								echo $today ?></h4>
	</right>
	<br />
	<table class=" table-data">
		<thead>
			<tr bgcolor="#76FF03">
				<th>No.</th>
				<th>Jumlah Beli</th>
				<th>Nama Member</th>
				<th>No. Telepon</th>
				<th>Alamat Email</th>
				<th>Tanggal Daftar</th>
				<th>Alamat</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$b = 1;
			foreach ($laporan_member as $a) : ?>
				<tr>
					<th><?= $b++; ?></th>
					<td><?php echo $a['jumlah_beli']; ?> Kali</td>
					<td><?php echo $a['nama']; ?></td>
					<td><?php echo $a['tlp']; ?></td>
					<td><?php echo $a['email']; ?></td>
					<td><?php echo $a['tanggal_daftar']; ?></td>
					<td><?php echo $a['alamat']; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</body>
<script>
	window.print();
</script>

</html>
