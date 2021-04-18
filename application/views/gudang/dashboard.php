<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

	<title>Dashboard Gudang</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

	<!-- Bootstrap core CSS -->
	<link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?=base_url()?>assets/dashboard.css" rel="stylesheet">
</head>

<body>
	<?php $this->load->view('gudang/nav_gudang'); ?>

	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
		<div class="d-flex justify-content-between p-3 judul-dashboard">
			<h5 class="h2">Dashboard Gudang</h5>
		</div>

		<div class="konten row d-flex justify content-center">
			<div class="col">
				<div class="white-card">
					<div class="card-head bg-primary">
						<h6>Barang</h6>
					</div>
					<p class="text-primary">9</p>
				</div>
			</div>
			<div class="col">
				<div class="white-card">
					<div class="card-head bg-success">
						<h6>Supplier</h6>
					</div>
					<p class="text-success">9</p>
				</div>
			</div>
			<div class="col">
				<div class="white-card">
					<div class="card-head bg-warning">
						<h6>Stok</h6>
					</div>
					<p class="text-warning">9</p>
				</div>
			</div>
			<div class="col">
				<div class="white-card ">
					<div class="card-head bg-danger">
						<h6>Pembelian</h6>
					</div>
					<p class="text-danger">9</p>
				</div>
			</div>

		</div>

	</main>

	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
	</script>
	<script>
		window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')

	</script>
	<script src="../../assets/js/vendor/popper.min.js"></script>
	<script src="../../dist/js/bootstrap.min.js"></script>

	<!-- Icons -->
	<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
	<script>
		feather.replace()

	</script>


</body>

</html>
