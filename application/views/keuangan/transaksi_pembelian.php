<?php $this->load->view('keuangan/header');?>

<!-- Start Content -->

<!-- Main content -->
<div class="card shadow mb-4 border-bottom-primary">
	<div class="card-header bg-primary">
		<h6 class="m-0 font-weight-bold text-white">Tabel Barang</h6>
	</div>
	<div class="card-body">
	<h6 class="mb-2 font-weight-bold text-primary">Filter Tanggal</h6>
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
		<div class="table-responsive">
		
			<table class="table table-striped table-sm table-hover dataTable" id="dataTable" width="100%" cellspacing="0"
				role="grid" aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
						<th></th>
						<th>Tanggal Pembelian</th>
						<th>No Faktur</th>
						<th>PPN</th>
						<th>Jenis Pembayaran</th>
						<?php if ($this->session->userdata('login_session')['level'] == 7) : ?>
						<th>Jatuh Tempo</th>
						<th>Status</th>
						<?php endif ?>
						<th>Total Harga Pembelian</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pembelian as $p) : ?>
					<tr data-info="beli" data-id="<?=$p->id_pembelian?>">
						<td></td>
						<td><?=date('d-m-Y', strtotime($p->tgl_pembelian))?></td>
						<td><?=$p->no_faktur?></td>
						<td><?=$p->ppn?> %</td>
						<td><?=$p->jenis_pembayaran?></td>
						<?php if ($this->session->userdata('login_session')['level'] == 7) : ?>
						<td><?=date('d-m-Y', strtotime($p->jatuh_tempo))?></td>
						<td><?=$p->status_kredit == 0 ? 'Belum Lunas' : 'Lunas' ?></td>
						<?php endif ?>
						<td>Rp. <?=number_format($p->total_harga_pembelian, 2, ',', '.')?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal fade" id="modalPembelian" tabindex="-1" role="dialog" aria-labelledby="modalInputBarang"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content border-bottom-primary">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Verifikasi Lunas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Verifikasi Transaksi Ini Sudah Lunas?</p>
			<div class="modal-footer">
			<a class="btn btn-primary btn-sm ml-auto my-0 btn-icon-split" id="btn-verif-lunas"><span class="icon text-white-50"><i class="fas fa-dollar-sign"></i></span>
			<span class="text">Verifikasi Lunas</span></a>
		
		
			</div>
		</div>
	</div>
</div>

<!-- End Content -->

<?php $this->load->view('keuangan/footer');?>
