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
    							<form action="<?= base_url('laporan/member_print'); ?>" method="post">
    								<input type="hidden" name="date_filter" value="<?= $date_filter ?>">
    								<a class="dropdown-item"><button class="bi bi-printer-fill btn btn-success btn-sm" type="submit" value="Submit" style="border:none;width: 100%;"> Print &nbsp;&nbsp;&nbsp;&nbsp;</button></a>
    							</form>
    							<form action="<?= base_url('laporan/member_pdf'); ?>" method="post">
    								<input type="hidden" name="date_filter" value="<?= $date_filter ?>">
    								<a class="dropdown-item"><button class="bi bi-file-earmark-pdf-fill btn btn-danger btn-sm" type="submit" value="Submit" style="border:none;width: 100%;"> Export ke PDF</button></a>
    							</form>
    							<form action="<?= base_url('laporan/member_excel'); ?>" method="post">
    								<input type="hidden" name="date_filter" value="<?= $date_filter ?>">
    								<a class="dropdown-item"><button class="bi bi-file-earmark-spreadsheet-fill btn btn-warning btn-sm" type="submit" value="Submit" style="border:none;width: 100%;"> Export ke Excel</button></a>
    							</form>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>

    		<div class="card-box pb-10">
    			<div class="pd-10">
    				<div class="col-md-4 col-sm-12">
    					<form action="<?= base_url('laporan/member'); ?>" method="post">
    						<div class="form-group">
    							<label>Filter Data Berdasarkan Tanggal/Range Tanggal Daftar</label>
    							<input value="<?= $date_filter ?>" class="form-control datetimepicker-range" name="date_filter" placeholder="Klik disini untuk pilih tanggal/range tanggal" type="text" autocomplete='off' spellcheck='false' autocorrect='off'>
    							<button type="submit" class="btn btn-primary">Filter</button>
    						</div>
    					</form>
    				</div>
    			</div>
    			<div class="pb-20">
    				<table class="table hover nowrap" id="table">
    					<thead>
    						<tr>
    							<th>No.</th>
    							<th>Banyak Memesan</th>
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
    			</div>
    		</div>
    		<!-- Export tables -->
