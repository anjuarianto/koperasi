<!-- start footer -->
<?php $this->load->view('keuangan/header');?>
<!-- end header -->
<div class="card shadow border-bottom-primary mb-4">
	<div class="card-header bg-primary">
		<h6 class="m-0 font-weight-bold text-white">Daftar Belanja Anggota</h6>
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
						<th>Tanggal Penjualan</th>
						<th>Kode Anggota</th>
						<th>Nama Anggota</th>
						<th>Cash</th>
						<th>Kredit</th>
						<th>Voucher</th>
						<th>Total Penjualan</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($belanja as $b) : ?>
					<tr>
						<td></td>
						<td><?=date('d-m-Y', strtotime($b['tgl_penjualan']))?></td>
						<td><?=$b['kode_anggota']?></td>
						<td><?=$b['nama']?></td>
						<td>Rp.<?php $total_cash=0?> <?php foreach ($total_jenis_transaksi as $cash) {
							if($cash['kode_anggota'] == $b['kode_anggota']) {
							
								if($cash['jenis_pembayaran'] == 'Cash') {
									$total_cash += $cash['total'];
								}
							}
						}?><?=$total_cash;?></td>
						<td>Rp. <?php $total_kredit=0?> <?php foreach ($total_jenis_transaksi as $kredit) {
							if($kredit['kode_anggota'] == $b['kode_anggota']) {
								if($kredit['jenis_pembayaran'] == 'Kredit') {
									$total_kredit += $kredit['total'];
								}
							}
						}?><?=$total_kredit;?></td>
						<td>Rp. <?php $total_voucher = 0?><?php foreach ($voucher_anggota as $voucher) {
							if($voucher['kode_anggota'] == $b['kode_anggota']) {
								$total_voucher = count(explode(',', $voucher['kode_voucher']))*100000;
							}
						} echo $total_voucher?></td>
						<td>Rp. <?=$b['total_harga_pembelian'] ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<!-- start footer -->
<?php $this->load->view('keuangan/footer'); ?>
<!-- end footer -->
