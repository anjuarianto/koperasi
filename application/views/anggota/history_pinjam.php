<?php $this->load->view('anggota/header');?>
<?php $saldo = $pinjaman->pinjaman?>
<div class="card shadow mb-4 border-bottom-primary">
	<div class="card-header py-3 bg-primary">
		<h6 class="m-0 font-weight-bold text-white">Detail Pembelian</h6>
	</div>
	<div class="card-body">
		<table>
			<tr>
				<td>Nama Anggota</td>
				<td>:</td>
				<td><?=$pinjaman->nama?></td>
			</tr>
			<tr>
				<td>NRP</td>
				<td>:</td>
				<td><?=$pinjaman->kode_anggota?></td>
			</tr>
			<tr>
				<td>Tanggal Pinjaman</td>
				<td>:</td>
				<td><?=date('d-m-Y', strtotime($pinjaman->tanggal_pinjam))?></td>
			</tr>
			<tr>
				<td>Tanggal Jatuh Tempo</td>
				<td>:</td>
				<td><?=date('d-m-Y', strtotime($pinjaman->jatuh_tempo))?></td>
			</tr>
			<tr>
				<td>Total Pinjaman</td>
				<td>:</td>
				<td>Rp. <?=number_format($pinjaman->pinjaman,0,',','.')?></td>
			</tr>
			<tr>
				<td>Status</td>
				<td>:</td>
				<td><?=$pinjaman->status == 0? 'Belum Lunas': 'Lunas'?></td>
			</tr>
		</table>


		<div class="table-responsive">
			<table class="table table-sm table-striped table-hover dataTable" id="dataTable" width="100%"
				cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
						<th></th>
						<th>Tanggal</th>
						<th>Bunga</th>
						<th>Angsuran</th>
						<th>Saldo</th>

					</tr>
				</thead>
				<tbody>
					<?php foreach ($history_pinjam as $history) : ?>
					<tr>
						<td></td>
						<td><?=date('d-m-Y', strtotime($history->tanggal_history_pinjam))?></td>
						<td>Rp. <?=number_format($history->bunga,0, ',','.')?></td>
						<td>Rp. <?=number_format($history->angsuran,0, ',','.')?></td>
						<td>Rp. <?php echo number_format($saldo -= $history->angsuran, 0, ',', '.')?></td>

					</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot>

				</tfoot>
			</table>
		</div>
	</div>


	<?php $this->load->view('anggota/footer'); ?>
