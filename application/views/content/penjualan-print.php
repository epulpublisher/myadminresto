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
		<center>Laporan Penjualan Bina Sarana Resto</center>
	</h3>
	<br>
	<right>
		<h4>Dibuat tanggal : <?php
								date_default_timezone_set('Asia/Jakarta');
								$today = date("d F Y h:i");
								echo $today; ?> WIB</h4>
	</right>
	<br />
	<table class=" table-data">
		<thead>
			<tr bgcolor="#76FF03">
				<th>No.</th>
				<th>Nama Menu</th>
				<th>Total Penjualan</th>
				<th>Penghasilan</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$b = 1;
			foreach ($laporan as $a) : ?>
				<tr>
					<th><?= $b++; ?></th>
					<td><?php echo $a['nama_menu']; ?></td>
					<td><?php echo $a['qty']; ?></td>
					<td><?php echo rupiah($a['total_harga']); ?></td>
				</tr>
			<?php endforeach; ?>
			<tr bgcolor="#76FF03">
				<td colspan="3">
					<center><b>Total Penghasilan</b></center>
				</td>
				<td><b><?php echo rupiah($total_penghasilan['total_penghasilan']); ?></b></td>
			</tr>
		</tbody>
	</table>
</body>
<script>
	window.print();
</script>

</html>
