<?php $this->load->view('kasir/header');?>


<div class="card shadow border-bottom-primary mb-4">
	<div class="card-header bg-primary">
		<h6 class="m-0 font-weight-bold text-white">Tabel Voucher</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover table-sm dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
                    <th></th>
                        <th>ID</th>
						<th>Kode Anggota</th>
						<th>Bulan</th>
						<th>Tahun</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($voucher as $s) : ?>
					<tr>
                    <td></td>
                        <td><?=$s->id_voucher;?></td>
                        <td><?=$s->kode_anggota;?></td>
						<td><?=$s->bulan;?></td>
						<td><?=$s->tahun;?></td>
						<td><?=$s->status == 0 ? 'Aktif' : 'Hangus' ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php $this->load->view('kasir/footer');?>