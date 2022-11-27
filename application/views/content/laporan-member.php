    <div class="main-container">
    	<div class="xs-pd-20-10 pd-ltr-20">
    		<div class="page-header">
    			<div class="row">
    				<div class="col-md-6 col-sm-12">
    					<div class="title">
    						<h4><span class="badge badge-pill border border-dark">Laporan Member</span></h4>
    					</div>
    				</div>
    				<div class="col-md-6 col-sm-12 text-right">
    					<div class="dropdown">
    						<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
    							Aksi
    						</a>
    						<div class="dropdown-menu dropdown-menu-right">
    							<a class="dropdown-item" href="<?= base_url() ?>laporan/member_print"><i class="bi bi-printer-fill"></i> Print</a>
    							<a class="dropdown-item" href="<?= base_url() ?>laporan/member_pdf"><i class="bi bi-file-earmark-pdf-fill"></i> Export ke PDF</a>
    							<a class="dropdown-item" href="<?= base_url() ?>laporan/member_excel"><i class="bi bi-file-earmark-spreadsheet-fill"></i> Export ke Excel</a>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>

    		<div class="card-box pb-10">
    			<div class="pd-10">
    			</div>
    			<div class="pb-20">
    				<table class="table hover nowrap" id="table">
    					<thead>
    						<tr>
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
    			</div>
    		</div>
    		<!-- Export tables -->
