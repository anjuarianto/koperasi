<!-- Start Header -->
<?php $this->load->view('admin/header'); ?>
<!-- End Header -->

<!-- Start Content -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Tabel Voucher</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
		<button class="btn btn-primary mt-2 mb-4 btn-icon-split btn-sm" data-toggle="modal" data-target="#modalInputSupplier"><strong><span class="icon text-white-50">
						<i class="fas fa-plus"></i>
					</span><span class="text">Tambah Voucher</span></strong></button>
			<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
                        <th>ID</th>
						<th>Nama Voucher</th>
						<th>Nilai VOucher</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($voucher as $s) : ?>
					<tr>
                        <td><?=$s->id_voucher;?></td>
						<td><?=$s->nama_voucher;?></td>
						<td><?=$s->nilai_voucher;?></td>
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
				<form action="<?=base_url()?>admin/input_voucher" method="post">
					<div class="form-group">
						<label for="nama_voucher">Nama Voucher</label>
						<input type="text" name="nama_voucher" id="nama_voucher"
							placeholder="Nama Voucher" class="form-control" value="<?=set_value('nama_voucher')?>">
						<span style="font-size: 10px; color: red"><?=form_error('nama_voucher')?></span>
					</div>
					<div class="form-group">
						<label for="nilai_voucher">Nilai Voucher</label>
						<input type="text" name="nilai_voucher" id="nilai_voucher" placeholder="Nilai Voucher" class="form-control"
							value="<?=set_value('nilai_voucher')?>" rows="5" />
						<span style="font-size: 10px; color: red"><?=form_error('nilai_voucher')?></span>
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