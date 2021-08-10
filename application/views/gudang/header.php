<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?=$judul?></title>

	<!-- Custom fonts for this template-->
	<link href="<?=base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">
	<!-- selectpicker -->
	
	<!-- Custom styles for this template-->
	<link href="<?=base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">

	<link href="<?=base_url()?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendorother/datatables/dataTables.dateTime.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendorother/typeahead/typeahead.css">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	
	<style>
		.typeahead { z-index: 1051; }
	</style>
	
</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<div class="sidebar-brand d-flex align-items-center justify-content-center">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-home"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Koperasi Tribuana</div>
			</div>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url()?>gudang">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Gudang
			</div>
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url()?>gudang/barang">
					<i class="fas fa-fw fa-folder"></i>
					<span>Barang</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url()?>gudang/satuan">
					<i class="fas fa-fw fa-folder"></i>
					<span>Satuan</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url()?>gudang/supplier">
					<i class="fas fa-fw fa-truck"></i>
					<span>Supplier</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url()?>gudang/stok">
					<i class="fas fa-fw fa-layer-group"></i>
					<span>Stok</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url()?>gudang/rak">
					<i class="fas fa-fw fa-clipboard-list"></i>
					<span>Rak</span></a>
			</li>



			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Transaksi
			</div>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url()?>gudang/pembelian">
					<i class="fas fa-fw fa-cart-arrow-down"></i>
					<span>Pembelian</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url()?>gudang/return_barang_all">
					<i class="fas fa-fw fa-cart-arrow-down"></i>
					<span>Return Barang</span></a>
			</li>

		


			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">
			<div class="sidebar-heading">
				Transaksi
			</div>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url()?>gudang/print_harga">
					<i class="fas fa-fw fa-cart-arrow-down"></i>
					<span>Print Harga</span></a>
			</li>


			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar static-top">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - Search Dropdown (Visible Only XS) -->
						<li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
								aria-labelledby="searchDropdown">
								<form class="form-inline mr-auto w-100 navbar-search">
									<div class="input-group">
										<input type="text" class="form-control bg-light border-0 small"
											placeholder="Search for..." aria-label="Search"
											aria-describedby="basic-addon2">
										<div class="input-group-append">
											<button class="btn btn-primary" type="button">
												<i class="fas fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</li>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span
									class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$this->session->userdata('login_session')['name'];?></span>
								<img class="img-profile rounded-circle" src="<?=base_url()?>assets/img/user.png">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
								aria-labelledby="userDropdown">
								<a class="dropdown-item" href="<?=base_url()?>gudang/profile">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Profile
								</a>
							
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->
