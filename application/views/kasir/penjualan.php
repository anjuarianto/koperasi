<!-- Start header -->
<?php $this->load->view('kasir/header');?>
<!-- End header -->

<!-- Main content -->
<div class="container-fluid mb-4 p-3 shadow bg-white">
	<h1 class="h3 text-primary"><?=$judul;?></h1>
</div>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Tabel Barang</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
		<button class="btn btn-primary mt-2 mb-4" data-toggle="modal" data-target="#modalInputPembelian"><strong>+
				Tambah
				Pembelian</strong></button>
			<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
				<tr>
					<th>Tanggal Pembelian</th>
					<th>Total Harga Pembelian</th>
					<th>Detail Pembelian</th>
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

<!-- Start footer -->
<?php $this->load->view('kasir/footer');?>
<!-- End footer -->