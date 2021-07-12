<!-- Start header -->
<?php $this->load->view('kasir/header');?>
<!-- End header -->

<!-- Main content -->
<div class="card shadow border-bottom-primary">
	<div class="card-header bg-primary">
		<h6 class="m-0 font-weight-bold text-white">Daftar Penjualan</h6>
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
					<table class="table table-striped table-hover table-sm dataTable" id="dataTable" width="100%"
						cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
						<thead class="thead-light">
							<tr>
								<th></th>
								<th>Tanggal</th>
								<th>No. Struk</th>
								<th>Total Harga</th>
								<th>Voucher</th>
								<th>Nominal Uang</th>
								<th>Kembalian</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($penjualan as $p) : ?>
							<tr data-info="penjualan" data-id="<?=$p->id_penjualan?>">
								<td></td>
								<td><?=date('d-m-Y', strtotime($p->tgl_penjualan));?></td>
								<td><?=$p->id_penjualan?></td>
								<td>Rp. <?=number_format($p->total_harga_pembelian, 2, ',', '.')?></td>
								<td><?=$p->kode_voucher?></td>
								<td>Rp. <?=number_format($p->nominal_uang, 2, ',','.')?></td>
								<td>Rp.
									<?=$p->kode_voucher != null ? number_format((count(explode(',', $p->kode_voucher))*100000+$p->nominal_uang)-$p->total_harga_pembelian, 0, ',','.') : $p->nominal_uang-$p->total_harga_pembelian ?>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- End Main content -->

	<!-- Start footer -->
	<?php $this->load->view('kasir/footer');?>
	<!-- End footer -->
