<!-- Start header -->
<?php $this->load->view('anggota/header');?>
<!-- End header -->

<!-- Main content -->
<div class="card shadow border-bottom-primary">
	<div class="card-header bg-primary">
		<h6 class="m-0 font-weight-bold text-white">Tabel History Transaksi</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover table-sm dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
				<tr>
                <th></th>
				<th>No. Struk</th>
					<th>Tanggal</th>
					<th>Total Harga Pembelian</th>
					<th>Voucher</th>
					<th>Nominal Uang</th>
					<th>Kembalian</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($transaksi as $trans) : ?>
				<tr data-info="transaksi" data-id="<?=$trans->id_penjualan?>">
                <td></td>
				<td><?=$trans->id_penjualan?></td>
					<td><?=date('d-m-Y',strtotime($trans->tgl_penjualan));?></td>
					<td>Rp. <?=number_format($trans->total_harga_pembelian, 0, ',', '.')?></td>
					<td><?=$trans->kode_voucher?></td>
					<td>Rp. <?=number_format($trans->nominal_uang, 0, ',','.')?></td>
					<td>Rp. <?=$trans->kode_voucher != null ? number_format((count(explode(',', $trans->kode_voucher))*100000+$trans->nominal_uang)-$trans->total_harga_pembelian, 0, ',','.') : number_format($trans->nominal_uang-$trans->total_harga_pembelian, 0, ',','.') ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
		</div>
	</div>
</div>
<!-- End Main content -->

<!-- Start footer -->
<?php $this->load->view('anggota/footer');?>
<!-- End footer -->