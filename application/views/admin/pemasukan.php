<!-- Start Header -->
<?php $this->load->view('admin/header'); ?>
<!-- End Header -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Tabel Daftar Penjualan</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
				<tr>
					<th>Tanggal Penjualan</th>
					<th>Total Harga Penjualan</th>
					<th>Detail Penjualan</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($penjualan as $p) : ?>
				<tr>
					<td><?=$p->tgl_penjualan;?></td>
					<td><?=$p->harga_total_barang;?></td>
					<td><a href="<?=base_url()?>kasir/detail_pembelian/<?=$p->id_penjualan?>">Detail</a></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
		</div>
	</div>
</div>
<!-- End Main content -->

<!-- Start Footer -->
<?php $this->load->view('admin/footer'); ?>
<!-- End Footer -->