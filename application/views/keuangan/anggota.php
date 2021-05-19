<?php $this->load->view('keuangan/header');?>
<!-- datatable -->
<div class="card shadow mb-4">
	<div class="card-header bg-primary py-3">
		<h6 class="m-0 font-weight-bold text-white">Tabel Anggota</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-sm table-hover dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
					<th></th>
						<th>NRP</th>
						<th>Nama Anggota</th>
						<th>Saldo Simpan</th>
						<th>Saldo Pinjam</th>
						<th>SHU Lalu</th>
						<th>SHU</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($anggota as $a) : ?>
					<tr>
					<td></td>
						<td><?=$a->kode_anggota;?></td>
						<td><?=$a->nama;?></td>
						<td>Rp. <?=number_format($a->saldo_simpan+$a->pokok,0, ',', '.');?></td>
						<td>Rp. <?=number_format($a->saldo_pinjam,0 ,',','.');?></td>
						<td>Rp. <?=number_format($a->shu_lalu,0 ,',','.');?></td>
						<td>Rp. <?=number_format($a->shu,0 ,',','.');?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- end datatable -->
<?php $this->load->view('keuangan/footer');?>