<!-- start footer -->
<?php $this->load->view('kasir/header');?>
<!-- end header -->
<div class="card shadow border-bottom-primary mb-4">
	<div class="card-header bg-primary">
		<h6 class="m-0 font-weight-bold text-white">Tabel Barang</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-sm table-hover table-striped dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
					<th></th>
						<th>Nama Barang</th>
						<th>Nama Supplier</th>
						<th>Kode Barang</th>
						<th>Harga Beli</th>
						<th>Harga Jual</th>
						<th>Stok</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($barang as $b) : ?>
					<tr>
					<td></td>
						<td><?=$b->nama_barang;?></td>
						<td><?=$b->nama_supplier;?></td>
						<td><?=$b->kode_barang;?></td>
						<td>Rp. <?=$b->harga_beli;?></td>
						<td>Rp. <?=$b->harga_jual;?></td>
						<td><?=$b->total_stok == null ? 0 : $b->total_stok?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<!-- start footer -->
<?php $this->load->view('kasir/footer'); ?>
<!-- end footer -->