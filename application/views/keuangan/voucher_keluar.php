<?php $this->load->view('keuangan/header');?>

<!-- Start Content -->

<!-- Main content -->
<div class="card shadow mb-4 border-bottom-primary">
	<div class="card-header bg-primary">
		<h6 class="m-0 font-weight-bold text-white">Tabel Voucher</h6>
	</div>
	<div class="card-body">
	<h6 class="mb-2 font-weight-bold text-primary">Filter Tanggal</h6>
	<div class="row mb-0 w-20 ml-2">
			<span>From</span>
			<div class="form-group col-sm-2 mx-2">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-calendar"></i></div>
					</div>
					<input type="text" id="min" class="form-control form-control-sm ">
				</div>

			</div>
			<span>to</span>
			<div class="form-group col-sm-2 mx-2">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-calendar"></i></div>
					</div>
					<input type="text" id="max" class="form-control form-control-sm ">
				</div>

			</div>
		<div class="table-responsive">
		
			<table class="table table-striped table-sm table-hover dataTable" id="dataTable" width="100%" cellspacing="0"
				role="grid" aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
						<th></th>
						<th>Tanggal Penjualan</th>
						<th>No. Struk</th>
						<th>Kode Voucher</th>
						<th>NRP</th>
						<th>Total Voucher</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($penjualan as $p) : ?>
					<tr data-info="beli">
						<td></td>
						<td><?=date('d-m-Y', strtotime($p->tgl_penjualan))?></td>
						<td><?=$p->id_penjualan?></td>
						<td><?=$p->kode_voucher?></td>
						<td><?=$p->kode_anggota?></td>
						<td>Rp. <?=number_format(count(explode(",",$p->kode_voucher))*100000, 2, ',', '.')?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- End Content -->

<?php $this->load->view('keuangan/footer');?>
