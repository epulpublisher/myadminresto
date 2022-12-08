<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Penjualan.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
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
		font-size: 15pt;
	}

	h4 {
		font-family: Verdana;
		font-size: 11pt;
	}
</style>
<h4>
	<center><b><u>LAPORAN PENJUALAN BINA SARANA RESTO</u></b></center>
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
