<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4><span class="badge badge-pill border border-dark">Profile Saya</span></h4>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
					<div class="pd-20 card-box height-100-p">
						<div class="profile-photo">
							<img src="<?= base_url('asset/img/profile/') . $user['image']; ?>" alt="" class="avatar-photo" />
						</div>
						<h5 class="text-center h5 mb-0"><?= $user['nama']; ?></h5>
						<div class="profile-info">
							<h5 class="mb-20 h5 text-blue">Infomasi Akun</h5>
							<ul>
								<li>
									<span>NIP:</span>
									<?= $user['nip']; ?>
								</li>
								<li>
									<span>Email Address:</span>
									<?= $user['email']; ?>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
					<div class="card-box height-100-p overflow-hidden">
						<div class="profile-tab height-100-p">
							<?= $this->session->flashdata('pesan'); ?>
							<?php if (validation_errors()) { ?>
								<div class="alert alert-danger" role="alert">
									<?= validation_errors(); ?>
								</div>
							<?php } ?>
							<div class="tab height-100-p">
								<ul class="nav nav-tabs customtab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#setting" role="tab">Ubah Kata Sandi</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#timeline" role="tab">Ubah Profile</a>
									</li>
								</ul>
								<div class="tab-content">
									<!-- Timeline Tab start -->
									<div class="tab-pane fade show" id="timeline" role="tabpanel">
										<div class="pd-20">
											<div class="profile-timeline">
												<form action="<?= base_url('user/ubahProfil'); ?>" method="post" enctype="multipart/form-data">
													<ul class="profile-edit-list row">
														<li class="weight-500 col-md-6">
															<div class="form-group">
																<label>Full Name</label>
																<input class="form-control form-control-lg" type="text" name="nama" value="<?= $user['nama']; ?>" />
															</div>
															<div class="form-group">
																<label>NIP</label>
																<input class="form-control form-control-lg" type="text" name="nip" value="<?= $user['nip']; ?>" />
															</div>
															<div class="form-group">
																<label>Alamat Email</label>
																<input class="form-control form-control-lg" type="text" name="email" value="<?= $user['email']; ?>" />
															</div>
															<div class="form-group">
																<label>Photo Profil</label>
																<div class="">
																	<div class="row">
																		<div class="col-sm-12">
																			<input type="hidden" name="image_old" id="image_old" value="<?= $user['image']; ?>">
																			<div class="custom-file">
																				<input type="file" class="form-control form-control-user" id="image" name="image">
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<input type="hidden" name="id" id="id" value="<?= $user['id']; ?>">
															<div class="form-group mb-0">
																<input type="submit" class="btn btn-primary" value="Save & Update" />
															</div>
														</li>
													</ul>
												</form>
											</div>
										</div>
									</div>
									<!-- Timeline Tab End -->
									<!-- Setting Tab start -->
									<div class="tab-pane fade show active" id="setting" role="tabpanel">
										<div class="pd-20">
											<div class="profile-timeline">
												<form action="<?= base_url('user/ubahPassword'); ?>" method="post" enctype="multipart/form-data">
													<ul class="profile-edit-list row">
														<li class="weight-500 col-md-6">
															<div class="form-group">
																<label>Kata Sandi Lama</label>
																<input class="form-control form-control-lg" name="password_sekarang" type="password" required />
															</div>
															<div class="form-group">
																<label>Kata Sandi Baru</label>
																<input class="form-control form-control-lg" name="password_baru1" type="password" required />
															</div>
															<div class="form-group">
																<label>Konfirmasi Sandi Baru</label>
																<input class="form-control form-control-lg" name="password_baru2" type="password" required />
															</div>
															<div class="form-group mb-0">
																<input type="submit" class="btn btn-primary" value="Save & Update" />
															</div>
														</li>
													</ul>
												</form>
											</div>
										</div>
									</div>
									<!-- Setting Tab End -->
								</div>
							</div>
						</div>
