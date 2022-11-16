<div class="left-side-bar ">
	<div class="brand-logo">
		<a href="index.html">
			<img alt="Responsive image" style="width:110px;height:50px;" src="<?= base_url() ?>/asset/vendors/images/lti-logo.png" alt="" class="dark-logo" />
			<img alt="Responsive image" style="width:110px;height:50px;" src="<?= base_url() ?>/asset/vendors/images/lti-logo.png" alt="" class="light-logo" />
		</a>
		<div class="close-sidebar" data-toggle="left-sidebar-close">
			<i class="ion-close-round"></i>
		</div>
	</div>
	<div class="menu-block customscroll">
		<div class="sidebar-menu">
			<ul id="accordion-menu">
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="micon bi bi-house"></span><span class="mtext">Dashboard</span>
					</a>
					<ul class="submenu">
						<li><a href="<?= base_url() ?>/">Products Overview</a></li>
						<li><a href="<?= base_url() ?>/wty">Warranty Overview</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="micon icon-copy bi bi-arrow-down-square"></span><span class="mtext">Incoming Products</span>
					</a>
					<ul class="submenu">
						<li><a href="<?= base_url() ?>/stock">List Stock</a></li>
						<li><a href="<?= base_url() ?>/all-productin">List Incoming Products</a></li>
						<li><a href="<?= base_url() ?>/docproductin">Data & Documents</a></li>
						<li><a href="<?= base_url() ?>/c-productin">Input Data</a></li>
						<li><a href="<?= base_url() ?>/import-in">Import Data</a></li>
						<li><a href="<?= base_url() ?>/r-productin">Edit Data</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="micon icon-copy bi bi-arrow-up-square"></span><span class="mtext">Outgoing Products</span>
					</a>
					<ul class="submenu">
						<li><a href="<?= base_url() ?>/all-productout">List Outgoing Products</a></li>
						<li><a href="<?= base_url() ?>/docproductout">Data & Documents</a></li>
						<li><a href="<?= base_url() ?>/c-productout">Input Data</a></li>
						<li><a href="<?= base_url() ?>/import-out">Import Data</a></li>
						<li><a href="<?= base_url() ?>/r-productout">Edit Data</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="micon bi bi-calendar4-week"></span><span class="mtext">Extend Warranty</span>
					</a>
					<ul class="submenu">
						<li><a href="<?= base_url() ?>/viewxwty">List Extended Warranty</a></li>
						<li><a href="<?= base_url() ?>/xwty">Input Extend Warranty</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="mobile-menu-overlay"></div>
