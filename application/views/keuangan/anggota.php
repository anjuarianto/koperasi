<?php $this->load->view('keuangan/header');?>
<div class="container-fluid mb-4 p-3 shadow bg-white">
	<h1 class="h3 text-primary"><?=$judul;?></h1>
</div>
<!-- datatable -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Tabel Anggota</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
					<th></th>
						<th>Kode Anggota</th>
						<th>Nama Anggota</th>
						<th>Saldo Simpan</th>
						<th>Saldo Pinjam</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($anggota as $a) : ?>
					<tr>
					<td></td>
						<td><?=$a->kode_anggota;?></td>
						<td><?=$a->nama;?></td>
						<td><?=$a->nama;?></td>
						<td><?=$a->nama;?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- end datatable -->
<?php $this->load->view('keuangan/footer');?>