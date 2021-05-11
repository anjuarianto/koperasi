<?php $this->load->view('keuangan/header');?>



<div class="card shadow border-bottom-primary mb-4">
	<div class="card-header m-0 bg-primary">
		<h6 class="m-0 font-weight-bold text-white">Tabel Daftar Pemasukan</h6>
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
				<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
					aria-describedby="dataTable_info" style="width: 100%;">
					<thead class="thead-light">
						<tr>
							<th></th>
							<th>Tanggal</th>
							<th>Deskripsi</th>
							<th>Total Harga Penjualan</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($pemasukan as $p) : ?>
						<tr>
							<td></td>
							<td><?=date('d-m-Y', strtotime($p->tanggal));?></td>
							<td><?=$p->deskripsi_pemasukan;?></td>
							<td>Rp. <?=number_format($p->total_pemasukan, 2, ',', '.')?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>



	<?php $this->load->view('keuangan/footer');?>
