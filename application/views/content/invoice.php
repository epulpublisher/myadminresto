<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Myadminresto | <?= $judul; ?></title>
	<link rel="stylesheet" href="<?= base_url() ?>assets/invoice/style.css" media="all" />
</head>

<body>
	<header class="clearfix">
		<div id="logo">
			<img src="<?= base_url() ?>assets/invoice/logo.jpg">
		</div>
		<div id="company">
			<h2 class="name">Bina Sarana Resto</h2>
			<div>Jl Kramat Raya No.98, Jakarta</div>
			<div>+62 82.111.111</div>
			<div><a href="mailto:resto@kelompok2.com">resto@kelompok2.com</a></div>
		</div>
		</div>
	</header>
	<main>
		<div id="details" class="clearfix">
			<div id="client">
				<div class="to">INVOICE KEPADA:</div>
				<h2 class="name"><?= $user['nama']; ?></h2>
				<div class="address"><?= $user['tlp']; ?></div>
				<div class="email"><a href="mailto:<?= $user['email']; ?>"><?= $user['email']; ?></a></div>
			</div>
			<div id="invoice">
				<h3>KODE PESANAN: <?= $bykode_pesanan['kode_pesanan']; ?></h3>
				<h4>NOMOR MEJA: <?= $bykode_pesanan['no_meja']; ?></h4>
				<div class="date">Tanggal Invoice: <?php $dateend = date_create($bykode_pesanan['tgl_pesanan']);
													echo date_format($dateend, "d F Y"); ?></div>
			</div>
		</div>
		<table border="0" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th class="total">NO</th>
					<th class="desc">MENU</th>
					<th class="unit">HARGA</th>
					<th class="qty">QTY</th>
					<th class="total">JUMLAH</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$b = 1;
				foreach ($dt_pesanan as $dt) {
				?>
					<tr>
						<td class="total"><?= $b++; ?></td>
						<td class="desc">
							<h3><?= $dt['nama_menu']; ?></h3>
						</td>
						<td class="unit"><?php echo rupiah($dt['harga']); ?></td>
						<td class="qty"><?= $dt['qty']; ?></td>
						<td class="total"><?php echo rupiah($dt['total_harga']); ?></td>
					</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="2"></td>
					<td colspan="2">TOTAL</td>
					<td><?php echo rupiah($bykode_pesanan['total_bayar']); ?></td>
				</tr>
			</tfoot>
		</table>
		<div id="notices2">
			<div>OPSI PEMBAYARAN:</div>
			<div class="notice">1. Via Kasir </div>
			<div class="notice">2. Via Transfer ke BCA VA: <?= $bykode_pesanan['no_va']; ?> </div>
		</div>
		<br>
		<div id="thanks">Terima Kasih</div>
		<div id="notices">
			<div>PERHATIAN :</div>
			<div class="notice">Harap melakukan pembayaran terlebih dahulu. Menu yang dipesan tidak akan diantar sebelum melakukan pembayaran.</div>
		</div>
	</main>
	<footer>
		Invoice ini dibuat otomatis oleh sistem myordersresto
	</footer>
</body>

</html>
