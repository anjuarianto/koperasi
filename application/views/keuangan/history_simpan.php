<?php $this->load->view('keuangan/header');?>

<div class="card shadow mb-4 border-bottom-primary">
	<div class="card-header bg-primary d-flex justify-content-between">
		<h6 class="m-0 font-weight-bold text-white my-auto">Detail Simpanan Anggota</h6>
		<a href="<?=base_url();?>keuangan/simpan" class="btn btn-dark btn-sm btn-icon-split"><span
				class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
			<span class="text">Kembali</span></a>
	</div>
	<div class="card-body">
		<table>
			<tr>
				<td>Nama Anggota</td>
				<td>:</td>
				<td><?=$simpanan->nama?></td>
			</tr>
			<tr>
				<td>NRP</td>
				<td>:</td>
				<td><?=$simpanan->kode_anggota?></td>
			</tr>
			<tr>
				<td>Pokok</td>
				<td>:</td>
				<td>Rp. <?=number_format($simpanan->pokok,0,',','.')?></td>
			</tr>
			<tr>
				<td>Wajib</td>
				<td>:</td>
				<td>Rp. <?=number_format($simpanan->wajib,0,',','.')?></td>
			</tr>
			<tr>
				<td>Sukarela</td>
				<td>:</td>
				<td>Rp. <?=number_format($simpanan->sukarela,0,',','.')?></td>
			</tr>
			<tr>
				<td>Saldo</td>
				<td>:</td>
				<td>Rp. <?=number_format($simpanan->saldo,0,',','.')?></td>
			</tr>
		</table>


		<div class="table-responsive">
			<table class="table table-sm table-striped table-hover dataTable" id="dataTable" width="100%"
				cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
						<th></th>
						<th>Tanggal</th>
						<th>Wajib</th>
						<th>Sukarela</th>
						<th>Saldo</th>
					</tr>
				</thead>
				<tbody><?php $total_saldo = 0 ?>
					<?php foreach ($history_simpan as $key=>$history) : ?>
                    
					<tr data-info="history_simpan" data-id="<?=$history->id_simpan?>">
						<td></td>
						<td><?=date('d-m-Y',strtotime($history->tanggal))?></td>
						<td>Rp. <?=number_format($history->wajib, 0, ',', '.')?></td>
						<td>Rp. <?=number_format($history->sukarela, 0, ',', '.')?></td>
						<td><?=$key == 0 ? 'Rp. '.number_format($total_saldo += $history->saldo+$simpanan->pokok,0,',','.') : 'Rp. '.number_format($total_saldo += $history->saldo, 0, ',', '.') ?></td>

					</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot>

				</tfoot>
			</table>
		</div>
	</div>

	<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalInputBarang"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content border-bottom-primary">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalScrollableTitle">Detail Simpanan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form-edit" method="post">
						<div class="form-group">
							<label for="kode_anggota">NRP</label>
							<div class="input-group">
								<input type="text" name="kode_anggota" id="kode_anggota" placeholder="NRP" class="form-control typeahead"
									autocomplete="off" data-provide="typeahead" required>
								<div class="input-group-append">
									<div class="input-group-text">
										<i class="fas fa-search"></i>
									</div>
								</div>
							</div>

						</div>
						<div class="form-group">
							<label for="wajib">Wajib</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										Rp.
									</div>

								</div>
								<input type="text" name="wajib" id="wajib" placeholder="Wajib" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="sukarela">Sukarela</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										Rp.
									</div>

								</div>
								<input type="text" name="sukarela" id="sukarela" placeholder="Sukarela" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="tanggal">Tanggal</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fas fa-calendar"></i></div>
								</div>
								<input type="text" name="tanggal" id="tanggal" placeholder="Tanggal Pinjaman" class="form-control"
									autocomplete="off" required>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" onclick="enableForm(this)" class="btn btn-secondary" id="btn-edit">Edit</button>
					<input type="submit" class="btn btn-primary" id="btn-submit" disabled value="Simpan!">
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('keuangan/footer'); ?>
