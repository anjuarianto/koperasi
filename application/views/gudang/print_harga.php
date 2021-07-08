<!-- Start Header -->
<?php $this->load->view('gudang/header'); ?>
<!-- End Header -->

<!-- Start Content -->
<div class="card mb-4 border-bottom-primary">
	<div class="card-header bg-primary d-flex justify-content-between">
		<h6 class="m-0 font-weight-bold text-white my-auto"><?=$judul?></h6>
	</div>
	<div class="card-body">
		<div class="container">
			<h5 class="text-md-center pb-3">Cetak Harga</h5>
			<form action="<?=base_url()?>gudang/print_view" method="post">
			<div class="row form-group">
				<label class="col-md-3 text-md-right">Kategori</label>
				<div class="col-md-9 form-group">
					<select name="kategori" class="form-control" id="kategori">
						<option class="text-secondary" selected disabled>Pilih Salah Satu</option>
						<option value="supplier">Supplier</option>
						<option value="rak">Rak</option>
						<option value="all">All</option>
						<option value="custom">Custom</option>
					</select>
				</div>
			</div>

			<div class="row form-group" id="container-pilihan">
				<label class="col-md-3 text-md-right">Item</label>
				<div class="col-md-9 form-group">
					<select name="param" class="form-control" id="pilihan_kategori"></select>
				</div>
			</div>

			<div class="row form-group">
				<div class="col-lg-9 offset-lg-3">
					<button type="submit" class="btn btn-primary btn-icon-split">
						<span class="icon">
							<i class="fa fa-print"></i>
						</span>
						<span class="text">
							Print
						</span>
					</button>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- End Content -->
<script>
const baseUrl = "<?=base_url();?>"
</script>
<!-- Start Footer -->
<?php $this->load->view('gudang/footer'); ?>
<!-- End Footer -->


