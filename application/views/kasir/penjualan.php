<!-- Start header -->
<?php $this->load->view('kasir/header');?>
<!-- End header -->

<!-- Main content -->
<div class="card shadow border-bottom-primary">
	<div class="card-header bg-primary">
		<h6 class="m-0 font-weight-bold text-white">Tabel Daftar Penjualan</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover table-sm dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
				<tr>
				<th>No. Struk</th>
					<th>Tanggal Pembelian</th>
					<th>Total Harga Pembelian</th>
					<th>Voucher</th>
					<th>Nominal Uang</th>
					<th>Kembalian</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($penjualan as $p) : ?>
				<tr data-info="penjualan" data-id="<?=$p->id_penjualan?>">
				<td><?=$p->id_penjualan?></td>
					<td><?=$p->tgl_penjualan;?></td>
					<td>Rp. <?=number_format($p->total_harga_pembelian, 2, ',', '.')?></td>
					<td><?=$p->kode_voucher?></td>
					<td>Rp. <?=number_format($p->nominal_uang, 2, ',','.')?></td>
					<td>Rp. <?=$p->kode_voucher != null ? number_format((count(explode(',', $p->kode_voucher))*100000+$p->nominal_uang)-$p->total_harga_pembelian, 0, ',','.') : $p->nominal_uang-$p->total_harga_pembelian ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
		</div>
	</div>
</div>
<!-- End Main content -->

<!-- Start footer -->
<?php $this->load->view('kasir/footer');?>
<!-- End footer -->