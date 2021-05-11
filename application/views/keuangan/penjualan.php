<!-- Start header -->
<?php $this->load->view('keuangan/header');?>
<!-- End header -->

<!-- Main content -->

<div class="card border-bottom-primary mb-4">
	<div class="card-header bg-primary py-3">
		<h6 class="m-0 font-weight-bold text-white">Tabel Daftar Penjualan</h6>
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
		</div>
		<div class="table-responsive">
			<table class="table table-sm table-hover table-striped dataTable" id="dataTable" width="100%"
				cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
						<th></th>
						<th>Tanggal Pembelian</th>
						<th>No. Struk</th>
						<th>Total Harga Pembelian</th>
						<th>Voucher</th>
						<th>Nominal Uang</th>
						<th>Kembalian</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($penjualan as $p) : ?>
					<tr>
						<td></td>
						<td><?=date('d-m-Y', strtotime($p->tgl_penjualan));?></td>
						<td><?=$p->id_penjualan?></td>
						<td>Rp. <?=number_format($p->total_harga_pembelian, 2, ',', '.')?></td>
						<td><?=$p->kode_voucher ? $p->kode_voucher : 'Tidak Ada'?></td>
						<td>Rp. <?=number_format($p->nominal_uang, 2, ',','.')?></td>
						<td>Rp.
							<?=$p->kode_voucher != null ? number_format((count(explode(',', $p->kode_voucher))*100000+$p->nominal_uang)-$p->total_harga_pembelian, 2, ',','.') : number_format(0*100000+$p->nominal_uang-$p->total_harga_pembelian,2,',','.') ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- End Main content -->

<!-- Start footer -->
<?php $this->load->view('keuangan/footer');?>
<!-- End footer -->
