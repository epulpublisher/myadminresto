<div class="main-container">
	<div class="xs-pd-20-10 pd-ltr-20">
		<div class="title pb-20">
			<h2 class="h3 mb-0">Ringkasan</h2>
		</div>
		<div class="row pb-10">
			<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
				<div class="card-box height-100-p widget-style3">
					<div class="d-flex flex-wrap">
						<div class="widget-data">
							<div class="weight-700 font-24 text-dark"><?= $jml_member; ?></div>
							<div class="font-14 text-secondary weight-500">
								Jumlah Member
							</div>
						</div>
						<div class="widget-icon">
							<div class="icon" data-color="#00eccf">
								<i class="icon-copy fa fa-users"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
				<div class="card-box height-100-p widget-style3">
					<div class="d-flex flex-wrap">
						<div class="widget-data">
							<div class="weight-700 font-24 text-dark"><?= $jml_menu; ?></div>
							<div class="font-14 text-secondary weight-500">
								Jumlah Menu
							</div>
						</div>
						<div class="widget-icon">
							<div class="icon" data-color="#ff5b5b">
								<span class="icon-copy fa fa-cutlery"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
				<div class="card-box height-100-p widget-style3">
					<div class="d-flex flex-wrap">
						<div class="widget-data">
							<div class="weight-700 font-24 text-dark"><?= $jml_pesanan; ?></div>
							<div class="font-14 text-secondary weight-500">
								Jumlah Pesanan
							</div>
						</div>
						<div class="widget-icon">
							<div class="icon">
								<i class="icon-copy fa fa-shopping-cart" aria-hidden="true"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
				<div class="card-box height-100-p widget-style3">
					<div class="d-flex flex-wrap">
						<div class="widget-data">
							<div class="weight-700 font-24 text-dark"><?php echo rupiah($total_penghasilan['total_penghasilan']); ?></div>
							<div class="font-14 text-secondary weight-500">Jumlah Penghasilan</div>
						</div>
						<div class="widget-icon">
							<div class="icon" data-color="#09cc06">
								<i class="icon-copy fa fa-money" aria-hidden="true"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 mb-20">
				<div class="card-box min-height-200px pd-20 mb-20" data-bgcolor="#63CA53">
					<div class="d-flex justify-content-between pb-20 text-white">
						<div class="icon h1 text-white">
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<!-- <i class="icon-copy fa fa-stethoscope" aria-hidden="true"></i> -->
						</div>
						<div class="font-14 text-right">
							<div class="font-18">Terjual</div>
							<div class="font-20"> <?php if (isset($best_seller['jumlah'])) {
														echo $best_seller['jumlah'];
													} ?></div>
						</div>
					</div>
					<div class="d-flex justify-content-between align-items-end">
						<div class="text-white">
							<div class="font-14">Menu Dengan Penjualan Tertinggi</div>
							<div class="font-24 weight-500"><?php if (isset($best_seller['nama_menu'])) {
																echo $best_seller['nama_menu'];
															} ?></div>
						</div>
						<div class="max-width-150">
							<div id="appointment-chart"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 mb-20">
				<div class="card-box min-height-200px pd-20" data-bgcolor="#EE4F42">
					<div class="d-flex justify-content-between pb-20 text-white">
						<div class="icon h1 text-white">
							<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
						</div>
						<div class="font-14 text-right">
							<div class="font-18">Terjual</div>
							<div class="font-20"> <?php if (isset($low_seller['jumlah'])) {
														echo $low_seller['jumlah'];
													} ?></div>
						</div>
					</div>
					<div class="d-flex justify-content-between align-items-end">
						<div class="text-white">
							<div class="font-14">Menu Dengan Penjualan Terendah</div>
							<div class="font-24 weight-500"><?php if (isset($low_seller['nama_menu'])) {
																echo $low_seller['nama_menu'];
															} ?></div>
						</div>
						<div class="max-width-150">
							<div id="surgery-chart"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
