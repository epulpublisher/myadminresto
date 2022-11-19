<!-- Begin Page Content -->
<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4><span class="badge badge-pill border border-dark">Ubah Data Menu</span></h4>
						</div>
					</div>
				</div>
			</div>
			<div class="pd-20 card-box mb-30">
				<?= $this->session->flashdata('pesan'); ?>
				<div class="pd-10">
				</div>
				<div class="pb-20">
					<?php if (validation_errors()) { ?>
						<div class="alert alert-danger" role="alert">
							<?= validation_errors(); ?>
						</div>
					<?php } ?>
					<?= $this->session->flashdata('pesan'); ?>
					<?php foreach ($menu as $b) { ?>
						<form action="<?= base_url('menu/ubahMenu'); ?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<div class="col-sm-12 col-md-10">
									<label class="col-sm-12 col-md-2 col-form-label">Nama Menu</label>
									<input type="hidden" name="id" id="id" value="<?php echo $b['id']; ?>">
									<input type="text" class="form-control form-control-user" id="nama_menu" name="nama_menu" placeholder="Masukkan Nama Menu" value="<?= $b['nama_menu']; ?>">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12 col-md-10">
									<label class="col-sm-12 col-md-2 col-form-label">Kategori</label>
									<select name="kategori" class="form-control form-control-user">
										<option value="<?php echo $b['kategori']; ?>" selected="selected"><?php echo $b['kategori']; ?></option>
										<option value="Makanan">Makanan</option>
										<option value="Minuman">Minuman</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12 col-md-10">
									<label class="col-sm-12 col-md-2 col-form-label">Harga (Rp)</label>
									<input type="text" class="form-control form-control-user" id="harga" name="harga" placeholder="Masukkan Harga" value="<?= $b['harga']; ?>">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12 col-md-10">
									<label class="col-sm-12 col-md-2 col-form-label">Promo</label>
									<select name="promo" class="form-control form-control-user">
										<option value="<?php echo $b['promo']; ?>" selected="selected"><?php echo $b['promo']; ?></option>
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12 col-md-10">
									<label class="col-sm-12 col-md-2 col-form-label">Harga Promo (Rp)</label>
									<input type="text" class="form-control form-control-user" id="harga_promo" name="harga_promo" placeholder="Masukkan Harga" value="<?= $b['harga_promo']; ?>">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12 col-md-10">
									<label class="col-sm-12 col-md-2 col-form-label">Status</label>
									<select name="status" class="form-control form-control-user">
										<option value="<?php echo $b['status']; ?>" selected="selected"><?php echo $b['status']; ?></option>
										<option value="Tersedia">Tersedia</option>
										<option value="Habis">Habis</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12 col-md-10">
									<label class="col-sm-12 col-md-2 col-form-label">Gambar</label>
									<br>
									<?php
									if (isset($b['image'])) { ?>
										<input type="hidden" name="old_pict" id="old_pict" value="<?= $b['image']; ?>">
										<picture>
											<source srcset="" type="image/svg+xml">
											<img src="<?= base_url('assets/img/upload/') . $b['image']; ?>" class="img-thumbnail" alt="...">
										</picture>
									<?php } ?>
									<br>
									<input type="file" class="form-control form-control-user" id="image" name="image">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12 col-sm-12">
									<input type="button" class="btn btn-outline-dark" value="Kembali" onclick="window.history.go(-1)">
									<input type="submit" class="btn btn-outline-primary" value="Update">
								</div>
							</div>
						</form>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
