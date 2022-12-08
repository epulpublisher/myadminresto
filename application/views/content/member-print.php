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
	<h4>
		<center><b><u>LAPORAN MEMBER BINA SARANA RESTO</u></b></center>
	</h4>
	<h4>
		<center>Periode : <?= $date_filter ?></center>
	</h4>
	<br>
	<right>
		<h4>Dibuat tanggal : <?php
								date_default_timezone_set('Asia/Jakarta');
								$today = date("d/m/Y G:i:s");
								echo $today; ?> WIB</h4>
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
					<td><?php
						$date_c = date_create($a['tanggal_daftar']);
						echo (date_format($date_c, "d/m/Y")); ?></td>
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
