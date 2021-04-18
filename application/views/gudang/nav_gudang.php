<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
	<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?=base_url()?>"><img src="<?=base_url()?>assets/img/logo.png"
			class="img-user mr-2" alt="">Koperasi Kopassus</a>
	<ul class="px-3 d-flex justify-content-between mb-0">
		<li class="nav-item text-nowrap top-nav">
			<div class="nav-link pr-2 pl-2 user-link">
				<img src="<?=base_url()?>assets/img/user.png" class="img-user" alt=""><span
					class="ml-2">Username213910</span>
			</div>
		</li>
		<li class="nav-item text-nowrap top-nav">
			<button type="button" class="nav-link btn btn-light pr-2 pl-2" href="#">Sign out</button>
		</li>
	</ul>
</nav>

<div class="container-fluid">
	<div class="row">
		<nav class="col-md-2 d-none d-md-block bg-light sidebar">
			<div class="sidebar-sticky">
				<ul class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link <?=$this->uri->segment(2) == '' ? 'active' : '';?>" href="<?=base_url()?>gudang">
							<span data-feather="home"></span>
							Dashboard <span class="sr-only"></span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?=$this->uri->segment(2) == 'barang' ? 'active' : '';?>" href="<?=base_url()?>gudang/barang">
							<span data-feather="shopping-cart"></span>
							Barang
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?=$this->uri->segment(2) == 'supplier' ? 'active' : '';?>" href="<?=base_url()?>gudang/supplier">
							<span data-feather="users"></span>
							Supplier
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?=$this->uri->segment(2) == 'pembelian' ? 'active' : '';?>" href="<?=base_url()?>gudang/pembelian">
							<span data-feather="file"></span>
							Pembelian
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?=$this->uri->segment(2) == 'stok' ? 'active' : '';?>" href="<?=base_url()?>gudang/stok">
							<span data-feather="layers"></span>
							Stok
						</a>
					</li>
				</ul>
		</nav>
