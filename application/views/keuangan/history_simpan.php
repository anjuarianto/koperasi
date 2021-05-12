<?php $this->load->view('keuangan/header');?>

<div class="card shadow mb-4 border-bottom-primary">
	<div class="card-header py-3 bg-primary">
		<h6 class="m-0 font-weight-bold text-white">Detail Pembelian</h6>
	</div>
	<div class="card-body">
		<a href="<?=base_url();?>gudang/pembelian" class="btn btn-secondary btn-sm mt-2 mb-4 btn-icon-split"><span
				class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
			<span class="text">Kembali</span></a>
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
                    
					<tr data-info="detail_pembelian" data-id="<?=$history->id_simpan?>">
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
	<?php $this->load->view('keuangan/footer'); ?>
