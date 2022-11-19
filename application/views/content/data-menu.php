    <div class="main-container">
    	<div class="xs-pd-20-10 pd-ltr-20">
    		<div class="page-header">
    			<div class="row">
    				<div class="col-md-6 col-sm-12">
    					<div class="title">
    						<h4><span class="badge badge-pill border border-dark">Daftar Menu Yang Dijual</span></h4>
    					</div>
    				</div>
    				<div class="col-md-6 col-sm-12 text-right">
    					<div class="dropdown">
    						<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
    							Alat
    						</a>
    						<div class="dropdown-menu dropdown-menu-right">
    							<a class="dropdown-item" data-toggle="modal" data-target="#menuBaruModal">Tambah Menu</a>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>

    		<div class="card-box pb-10">
    			<?= $this->session->flashdata('pesan'); ?>
    			<?php if (validation_errors()) { ?>
    				<div class="alert alert-danger" role="alert">
    					<?= validation_errors(); ?>
    				</div>
    			<?php } ?>
    			<?= $this->session->flashdata('pesan'); ?>
    			<div class="pd-10">
    			</div>
    			<div class="pb-20">
    				<table class="table hover nowrap" id="table">
    					<thead>
    						<tr>
    							<th>No.</th>
    							<th>Nama Menu</th>
    							<th>Kategori</th>
    							<th>Status</th>
    							<th>Terjual</th>
    							<th>Gambar</th>
    							<th>Alat</th>
    							<th>Harga</th>
    							<th>Promo</th>
    							<th>Harga Promo</th>
    						</tr>
    					</thead>
    					<tbody>
    						<?php
							$b = 1;
							foreach ($menu as $a) : ?>
    							<tr>
    								<th><?= $b++; ?></th>
    								<td><?php echo $a['nama_menu']; ?></td>
    								<td><?php echo $a['kategori']; ?></td>
    								<td><?php echo $a['status']; ?></td>
    								<td><?php echo $a['terjual']; ?></td>
    								<td>
    									<picture>
    										<source srcset="" type="image/svg+xml">
    										<img src="<?= base_url('asset/img/upload/') . $a['image']; ?>" width="100" height="100" alt="...">
    									</picture>
    								</td>
    								<td>
    									<div class="dropdown">
    										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
    											<i class="dw dw-more"></i>
    										</a>
    										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
    											<a class="dropdown-item" href="<?= base_url('menu/ubahmenu/') . $a['id']; ?>" class="badge badge-info"><i class=" dw dw-edit2"></i> Ubah</a>
    											<a class="dropdown-item" href="<?= base_url('menu/hapusmenu/') . $a['id']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $a['nama_menu']; ?> ?');" class="badge badge-danger"><i class="dw dw-delete-3"></i> Hapus</a>
    										</div>
    									</div>
    								</td>
    								<td>Rp.<?php echo $a['harga']; ?></td>
    								<td><?php echo $a['promo']; ?></td>
    								<td>Rp.<?php echo $a['harga_promo']; ?></td>
    							</tr>
    						<?php endforeach; ?>
    					</tbody>
    				</table>
    			</div>
    		</div>
    		<!-- Export tables -->
    		<!-- Modal Tambah Menu-->
    		<div class="modal fade" id="menuBaruModal" tabindex="-1" role="dialog" aria-labelledby="menuBaruModalLabel" aria-hidden="true">
    			<div class="modal-dialog" role="document">
    				<div class="modal-content">
    					<div class="modal-header">
    						<h5 class="modal-title" id="bukuBaruModalLabel">Tambah Menu</h5>
    						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
    						</button>
    					</div>
    					<form action="<?= base_url('menu/index'); ?>" method="post" enctype="multipart/form-data">
    						<div class="modal-body">
    							<div class="form-group">
    								<input type="text" class="form-control form-control-user" id="nama_menu" name="nama_menu" placeholder="Masukkan Nama Menu">
    							</div>
    							<div class="form-group">
    								<select name="kategori" class="form-control form-control-user">
    									<option value="">--Pilih Kategori--</option>
    									<option value="Makanan">Makanan</option>
    									<option value="Minuman">Minuman</option>
    								</select>
    							</div>
    							<div class="form-group">
    								<input type="text" class="form-control form-control-user" id="harga" name="harga" placeholder="Masukkan Harga">
    							</div>
    							<div class="form-group">
    								<select name="promo" class="form-control form-control-user">
    									<option value="">--Promo--</option>
    									<option value="Ya">Ya</option>
    									<option value="Tidak">Tidak</option>
    								</select>
    							</div>
    							<div class="form-group">
    								<input type="text" class="form-control form-control-user" id="harga_promo" name="harga_promo" placeholder="Masukkan Harga Promo">
    							</div>
    							<div class="form-group">
    								<select name="status" class="form-control form-control-user">
    									<option value="">--Pilih Status--</option>
    									<option value="Tersedia">Tersedia</option>
    									<option value="Habis">Habis</option>
    								</select>
    							</div>
    							<div class="form-group">
    								<input type="file" class="form-control form-control-user" id="image" name="image">
    							</div>
    						</div>
    						<div class="modal-footer">
    							<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="bi bi-x-circle"></i> Batal</button>
    							<button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Tambah</button>
    						</div>
    					</form>
    				</div>
    			</div>
    		</div>
    		<!-- End of Modal Tambah Menu-->
    	</div>
