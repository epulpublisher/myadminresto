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
    							<form action="<?= base_url('laporan/penjualan_print'); ?>" method="post">
    								<input type="hidden" name="date_filter" value="<?= $date_filter ?>">
    								<a class="dropdown-item"><button class="bi bi-printer-fill btn btn-success btn-sm" type="submit" value="Submit" style="border:none;width: 100%;"> Print &nbsp;&nbsp;&nbsp;&nbsp;</button></a>
    							</form>
    							<form action="<?= base_url('laporan/penjualan_pdf'); ?>" method="post">
    								<input type="hidden" name="date_filter" value="<?= $date_filter ?>">
    								<a class="dropdown-item"><button class="bi bi-file-earmark-pdf-fill btn btn-danger btn-sm" type="submit" value="Submit" style="border:none;width: 100%;"> Export ke PDF</button></a>
    							</form>
    							<form action="<?= base_url('laporan/penjualan_excel'); ?>" method="post">
    								<input type="hidden" name="date_filter" value="<?= $date_filter ?>">
    								<a class="dropdown-item"><button class="bi bi-file-earmark-spreadsheet-fill btn btn-warning btn-sm" type="submit" value="Submit" style="border:none;width: 100%;"> Export ke Excel</button></a>
    							</form>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>

    		<div class="card-box pb-10">
    			<div class="card-body">
    				<div class="col-md-4 col-sm-12">
    					<form action="<?= base_url('laporan/penjualan'); ?>" method="post">
    						<div class="form-group">
    							<label>Filter Data Berdasarkan Tanggal/Range Tanggal</label>
    							<input value="<?= $date_filter ?>" class="form-control datetimepicker-range" name="date_filter" placeholder="Klik disini untuk pilih tanggal/range tanggal" type="text" autocomplete='off' spellcheck='false' autocorrect='off'>
    							<button type="submit" class="btn btn-primary">Filter</button>
    						</div>
    					</form>
    				</div>
    			</div>
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
