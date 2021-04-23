<?php $this->load->view('keuangan/header');?>

<!-- Start Content -->

<!-- Main content -->
<div class="container-fluid mb-4 p-3 shadow bg-white">
	<h1 class="h3 text-primary"><?=$judul;?></h1>
</div>

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
						<th>Tanggal Pembelian</th>
						<th>Total Harga Pembelian</th>
						<th>Detail Pembelian</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pengeluaran as $p) : ?>
					<tr>
						<td><?=$p->tgl_pembelian;?></td>
						<td><?=$p->total_harga_pembelian;?></td>
						<td><a href="<?=base_url()?>kasir/detail_pembelian/<?=$p->id_pembelian?>">Detail</a></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot>
					<tr>
                        <th>Total</th>
                        <td colspan="2"></td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>


<!-- End Content -->

<?php $this->load->view('keuangan/footer');?>
