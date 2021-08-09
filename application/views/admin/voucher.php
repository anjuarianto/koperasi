<!-- Start Header -->
<?php $this->load->view('admin/header'); ?>
<!-- End Header -->

<!-- Start Content -->
<div class="card mb-4">
	<div class="card-header bg-primary d-flex justify-content-between">
		<h6 class="m-0 font-weight-bold text-white my-auto">Tabel Voucher</h6>
		<button class="btn btn-dark btn-icon-split btn-sm" data-toggle="modal" data-target="#modalInputSupplier"><strong><span class="icon text-white-50">
						<i class="fas fa-plus"></i>
					</span><span class="text">Generate Voucher</span></strong></button>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-sm table-hover dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
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


<!-- Modal Form Input Barang -->
<div class="modal fade" id="modalInputSupplier" tabindex="-1" role="dialog" aria-labelledby="modalInputSupplier"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Input Voucher</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?=base_url()?>admin/generate_voucher" method="post">
					<div class="form-group">
						<label for="nama_voucher">Bulan</label>
						<select name="bulan" id="periode-bulan"
							placeholder="Bulan" class="form-control">
							<?php $bulan = ["Januari", "Pebruari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
							
							for($i = 0; $i<count($bulan); $i++) : ?>
							<option value="<?=$bulan[$i]?>"><?=$bulan[$i]?></option>
							<?php endfor; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="tahun">Tahun</label>
						<input type="text" name="tahun" id="nilai_voucher" placeholder="Nilai Voucher" class="form-control" />
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

<!-- End Content -->

<!-- Start Footer -->
<?php $this->load->view('admin/footer'); ?>
<!-- End Footer -->