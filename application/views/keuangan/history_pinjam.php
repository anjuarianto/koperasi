<?php $this->load->view('keuangan/header');?>

<div class="card shadow mb-4 border-bottom-primary">
	<div class="card-header py-3 bg-primary">
		<h6 class="m-0 font-weight-bold text-white">Detail Pembelian</h6>
	</div>
	<div class="card-body">
		<a href="<?=base_url();?>gudang/pembelian" class="btn btn-secondary btn-sm mt-2 mb-4 btn-icon-split"><span
				class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
			<span class="text">Kembali</span></a>
		<a href="<?=base_url();?>gudang/pembelian" class="btn btn-success btn-sm mt-2 mb-4 btn-icon-split"><span
				class="icon text-white-50"><i class="fas fa-dollar-sign"></i></span>
			<span class="text">Bayar</span></a>
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
				<td><?=$pinjaman->status?></td>
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
					<tr data-info="detail_pembelian" data-id="<?=$history->id_history_pinjam?>">
						<td></td>
						<td><?=$history->tanggal_history_pinjam?></td>
						<td><?=$history->bunga?></td>
						<td><?=$history->angsuran?></td>
						<td><?=$history->saldo?></td>

					</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot>

				</tfoot>
			</table>
		</div>

	</div>
	<?php $this->load->view('keuangan/footer'); ?>
