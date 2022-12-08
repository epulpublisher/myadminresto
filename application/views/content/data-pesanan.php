    <div class="main-container">
    	<div class="xs-pd-20-10 pd-ltr-20">
    		<div class="page-header">
    			<div class="row">
    				<div class="col-md-6 col-sm-12">
    					<div class="title">
    						<h4><span class="badge badge-pill border border-dark">Daftar Pesanan atau Order</span></h4>
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
    							<th>Tanggal</th>
    							<th>Kode Pesanan</th>
    							<th>Nama Member</th>
    							<th>No. Telepon</th>
    							<th>No. Meja</th>
    							<th>Total Bayar</th>
    							<th>Status Bayar</th>
    							<th>Status Selesai</th>
    							<th>Aksi</th>
    						</tr>
    					</thead>
    					<tbody>
    						<?php
							$b = 1;
							foreach ($menu as $a) : ?>
    							<tr>
    								<th><?= $b++; ?></th>
    								<td><?php
										$date_c = date_create($a['tgl_pesanan']);
										echo (date_format($date_c, "d/m/Y")); ?></td>
    								<td><?php echo $a['kode_pesanan']; ?></td>
    								<td><?php echo $a['nama_member']; ?></td>
    								<td><?php echo $a['tlp']; ?></td>
    								<td><?php echo $a['no_meja']; ?></td>
    								<td><?php echo rupiah($a['total_bayar']); ?></td>
    								<td><?php echo $a['status_bayar']; ?></td>
    								<td><?php echo $a['status_selesai']; ?></td>
    								<td>
    									<div class="dropdown">
    										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
    											<i class="dw dw-more"></i>
    										</a>
    										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
    											<a class="dropdown-item" href="<?= base_url() ?>pesanan/invoice/<?php echo $a['kode_pesanan']; ?>/<?php echo $a['id_member']; ?>" class="badge badge-info"><i class=" dw dw-eye"></i>Detail</a>
    											<a class="dropdown-item" id="btn-bayar" href="<?= base_url('pesanan/status_bayar/') . $a['id']; ?>"><i class=" dw dw-edit2"></i>Update Sudah Bayar</a>
    											<a class="dropdown-item" id="btn-selesai" href="<?= base_url('pesanan/status_selesai/') . $a['id']; ?>"><i class="dw dw-edit2"></i>Update Sudah Selesai</a>
    										</div>
    									</div>
    								</td>
    							</tr>
    						<?php endforeach; ?>
    					</tbody>
    				</table>
    			</div>
    		</div>
    		<!-- Export tables -->
