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
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/asset/src/plugins/datatables/css/dataTables.bootstrap4.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/asset/src/plugins/datatables/css/responsive.bootstrap4.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/asset/vendors/styles/style.css" />
</head>

<body>
	<div class="header">
		<div class="header-left">
			<div class="menu-icon bi bi-list"></div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="<?= base_url('asset/img/profile/') . $user['image']; ?>" alt="" />
						</span>
						<span class="user-name"><?= $user['nama']; ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="<?= base_url('user'); ?>"><i class="dw dw-user1"></i> Profil</a>
						<a class="dropdown-item" href="<?= base_url('autentifikasi/logout'); ?>"><i class="dw dw-logout"></i> Keluar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
