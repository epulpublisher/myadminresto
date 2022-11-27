    <div class="main-container">
    	<div class="xs-pd-20-10 pd-ltr-20">
    		<div class="page-header">
    			<div class="row">
    				<div class="col-md-6 col-sm-12">
    					<div class="title">
    						<h4><span class="badge badge-pill border border-dark">Laporan Penjualan</span></h4>
    					</div>
    				</div>
    				<div class="col-md-6 col-sm-12 text-right">
    					<div class="dropdown">
    						<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
    							Aksi
    						</a>
    						<div class="dropdown-menu dropdown-menu-right">
    							<a class="dropdown-item" href="<?= base_url() ?>laporan/penjualan_print"><i class="bi bi-printer-fill"></i> Print</a>
    							<a class="dropdown-item" href="<?= base_url() ?>laporan/penjualan_pdf"><i class="bi bi-file-earmark-pdf-fill"></i> Export ke PDF</a>
    							<a class="dropdown-item" href="<?= base_url() ?>laporan/penjualan_excel"><i class="bi bi-file-earmark-spreadsheet-fill"></i> Export ke Excel</a>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>

    		<div class="card-box pb-10">
    			<div class="pd-10">
    				<br>
    				<center><b> Total Penghasilan : <?= rupiah($total_penghasilan['total_penghasilan']); ?> </b></center>
    			</div>
    			<div class="pb-20">
    				<table class="table hover nowrap" id="table">
    					<thead>
    						<tr>
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
    					</tbody>
    				</table>
    			</div>
    		</div>
    		<!-- Export tables -->
