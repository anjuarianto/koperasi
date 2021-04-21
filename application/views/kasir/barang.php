<!-- start footer -->
<?php $this->load->view('kasir/header');?>
<!-- end header -->

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Tabel Barang</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
		<button class="btn btn-primary mt-2 mb-4" data-toggle="modal" data-target="#modalInputBarang"><strong>+
				Tambah Barang</strong></button>
			<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
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