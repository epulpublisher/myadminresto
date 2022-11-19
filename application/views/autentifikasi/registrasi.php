<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8" />
	<title>Admin Resto | <?= $judul; ?></title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/asset/vendors/images/apple-touch-icon.png" />
	<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/asset/vendors/images/favicon-32x32.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/asset/vendors/images/favicon-16x16.png" />

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/asset/vendors/styles/core.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/asset/vendors/styles/icon-font.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/asset/vendors/styles/style.css" />
	<style>
		body {
			background-image: url('<?= base_url() ?>/asset/vendors/images/bg-image1.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}

		input {
			text-align: center;
		}
	</style>
</head>

<body class="login-page">
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="<?= base_url() ?>/asset/vendors/images/login-page-imgl.png" alt="" />
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-light box-shadow border-radius-10">
						<div class="center mx-auto">
							<a href=" http://lixa.id/">
								<center><img alt="Responsive image" style="width:110px;height:50px;" src="<?= base_url() ?>/asset/vendors/images/lti-logo.png" alt=""></center>
							</a>
							<br>
						</div>
						<div class="login-title">
							<h2 class="text-center text-dark"><b>Daftar ke Admin Resto</b></h2>
						</div>
						<?= $this->session->flashdata('pesan'); ?>
						<form action="<?= base_url('autentifikasi/registrasi'); ?>" method="post">
							<div class="mb-3">
								<center>
									<h6><label class="text-dark"><b><i>Nama Lengkap</i></b></label></h6>
								</center>
								<input type="text" autocomplete="off" autocorrect="off" name="nama" id="nama" class="form-control form-control-user bg-transparent border border-dark" value="<?= set_value('nama') ?>" required>
								<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="mb-3">
								<center>
									<h6><label class="text-dark"><b><i>NIP</i></b></label></h6>
								</center>
								<input type="text" autocomplete="off" autocorrect="off" name="nip" id="nip" class="form-control form-control-user bg-transparent border border-dark" value="<?= set_value('nip') ?>" required>
								<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="mb-3">
								<center>
									<h6><label class="text-dark"><b><i>Alamat Email</i></b></label></h6>
								</center>
								<input type="text" autocomplete="off" autocorrect="off" name="email" id="email" class="form-control form-control-user bg-transparent border border-dark" value="<?= set_value('email') ?>" required>
								<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="mb-3">
								<center>
									<h6><label class="text-dark"><b><i>Kata Sandi</i></b></label></h6>
								</center>
								<input type="password" autocomplete="off" autocorrect="off" name="password1" id="password1" class="form-control form-control-user bg-transparent border border-dark" required>
								<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="mb-3">
								<center>
									<h6><label class="text-dark"><b><i>Konfirmasi Kata Sandi</i></b></label></h6>
								</center>
								<input type="password" autocomplete="off" autocorrect="off" name="password2" id="password2" class="form-control form-control-user bg-transparent border border-dark" required>
								<?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<center><button type="submit" class="btn btn-outline-dark">Daftar</button></center>
						</form>
						<hr>
						<div class="text-center">
							Sudah Punya Akun ?<a class="small" href="<?= base_url('autentifikasi'); ?>"> Masuk</a>
						</div>
						<div class="mb-1">
							<div class="center">
								<h6 class="text-center text-dark"><br>© PT Bina Sarana Resto</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- welcome modal end -->
	<!-- js -->
	<script src="<?= base_url() ?>/asset/vendors/scripts/core.js"></script>
	<script src="<?= base_url() ?>/asset/vendors/scripts/script.min.js"></script>
	<script src="<?= base_url() ?>/asset/vendors/scripts/process.js"></script>
	<script src="<?= base_url() ?>/asset/vendors/scripts/layout-settings.js"></script>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
</body>

</html>
