<?php $this->load->view('keuangan/header');?>
<?php $saldo = $pinjaman->pinjaman?>
<div class="card shadow mb-4 border-bottom-primary">
	<div class="card-header bg-primary d-flex justify-content-between">
		<h6 class="my-auto font-weight-bold text-white">Detail Pembelian</h6>
		<div class="btn-group">
		<a href="<?=base_url();?>keuangan/pinjam" class="btn btn-dark btn-sm ml-1 btn-icon-split"><span
				class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
			<span class="text">Kembali</span></a>
		<button class="btn btn-success btn-sm ml-1 btn-icon-split" data-toggle="modal" data-target="#modalHistoryPinjam"><span
				class="icon text-white-50"><i class="fas fa-dollar-sign"></i></span>
			<span class="text">Bayar</span></button>
			<?php if($pinjaman->status == 0) : ?>
			<a href="<?=base_url()?>keuangan/aksi_pinjam_lunas/<?=$pinjaman->id_pinjam?>" onclick="return confirm('Ubah status menjadi lunas?')" class="btn btn-warning btn-sm ml-1 btn-icon-split"><span
				class="icon text-white-50"><i class="fas fa-dollar-sign"></i></span>
			<span class="text">Lunas</span></a>
			<?php endif ?>
		</div>
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
					<tr data-info="history_pinjam" data-id="<?=$history->id_history_pinjam?>">
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

	<div class="modal fade" id="modalHistoryPinjam" tabindex="-1" role="dialog" aria-labelledby="modalInputBarang"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content border-bottom-primary">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Bayar Cicilan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?=base_url()?>keuangan/aksi_bayar_pinjam/<?=$pinjaman->id_pinjam?>" method="post">
				<div class="form-group">
						<label for="tanggal_history_pinjam">Tanggal</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-calendar"></i></div>
							</div>
							<input type="text" name="tanggal_history_pinjam" id="tanggal" placeholder="Tanggal" class="form-control" autocomplete="off" required>
						</div>
					</div>
					<div class="form-group">
						<label for="angsuran">Angsuran</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">Rp. </div>
							</div>
							<input type="text" name="angsuran" placeholder="Nilai Angsuran" class="form-control" autocomplete="off" required>
						</div>
					</div>
                    
					<div class="form-group">
						<label for="bunga">Bunga</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">Rp. </div>
							</div>
							<input type="text" name="bunga" placeholder="Nilai Bunga" class="form-control" autocomplete="off" required>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<input type="submit" class="btn btn-primary" value="Simpan!">
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalInputBarang"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content border-bottom-primary">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Detail Pinjaman</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?=base_url()?>keuangan/update_history_pinjam/<?=$pinjaman->id_pinjam?>" id="form-edit" method="post">
				<div class="form-group">
						<label for="tanggal_history_pinjam">Tanggal</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-calendar"></i></div>
							</div>
							<input type="text" name="tanggal_history_pinjam" id="tanggal_pinjam" placeholder="Tanggal" class="form-control" autocomplete="off" required>
						</div>
					</div>
					<div class="form-group">
						<label for="angsuran">Angsuran</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">Rp. </div>
							</div>
							<input type="text" name="angsuran" id="angsuran" placeholder="Nilai Angsuran" class="form-control" autocomplete="off" required>
						</div>
					</div>
                    
					<div class="form-group">
						<label for="bunga">Bunga</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">Rp. </div>
							</div>
							<input type="text" name="bunga" id="bunga" placeholder="Nilai Bunga" class="form-control" autocomplete="off" required>
						</div>
					</div>
			</div>
			<div class="modal-footer">

				<button type="button" id="btn-edit" class="btn btn-danger">Edit</button>
				<input type="submit" class="btn btn-primary" id="btn-submit" disabled value="Simpan!">
				</form>
			</div>
		</div>
	</div>
</div>

	<?php $this->load->view('keuangan/footer'); ?>
