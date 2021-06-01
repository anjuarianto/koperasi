<!-- Start Header -->
<?php $this->load->view('admin/header'); ?>
<!-- End Header -->

<!-- Start Content -->

<!-- datatable -->
<div class="card mb-4">
	<div class="card-header bg-primary d-flex justify-content-between">
		<h6 class="m-0 font-weight-bold text-white my-auto">Tabel Log</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover table-sm dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
						<th>Tanggal</th>
						<th>Deskripsi</th>
						<th>Nama User</th>
						<th>Role</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($log as $log) : ?>
					<tr>
						<td><?=date('d-M-Y H:i:s', strtotime($log->time));?></td>
						<td><?=$log->deskripsi;?></td>
						<td><?=$log->nama;?></td>
						<td><?php 
                        if($log->level == 1) {
                            echo 'Admin';
                        } else if($log->level == 2) {
                            echo 'Gudang';
                        } else if($log->level == 3) {
                            echo 'Kasir';
                        } else if($log->level == 4) {
                            echo 'Keuangan Koperasi';
                        } else if($log->level == 5) {
                            echo 'Anggota';
                        } else if($log->level == 6) {
                            echo 'Keuangan Simpan Pinjam';
                        } else if($log->level == 7) {
                            echo 'Kredit Koperasi';
                        }?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- end datatable -->



<!-- Start Footer -->
<?php $this->load->view('admin/footer'); ?>
<!-- End Footer -->