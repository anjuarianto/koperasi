<?php $this->load->view('keuangan/header');?>

<!-- Start Content -->

<!-- Main content -->
<div class="card shadow mb-4 border-bottom-primary">
	<div class="card-header bg-primary">
		<h6 class="m-0 font-weight-bold text-white">Tabel Pengeluaran</h6>
	</div>
	<div class="card-body">
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
			<table class="table table-sm table-striped table-hover dataTable" id="dataTable" width="100%" cellspacing="0"
				role="grid" aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
						<th></th>
						<th>Tanggal</th>
						<th>Deskripsi</th>
						<th>Total Pengeluaran</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pengeluaran as $p) : ?>
					<tr>
						<td></td>
						<td><?=date('d-m-Y', strtotime($p->tanggal))?></td>
						<td><?=$p->deskripsi_pengeluaran?></td>
						<td>Rp. <?=number_format($p->total_harga_pembelian,0,',','.')?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot>
						<tr>
							<th colspan="3">Total</th>
							<th></th>
						</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>


<!-- End Content -->

<?php $this->load->view('keuangan/footer');?>
