<!-- Start Header -->
<?php $this->load->view('admin/header'); ?>
<!-- End Header -->

<!-- Start Content -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Tabel User</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
		<button class="btn btn-primary mt-2 mb-4" data-toggle="modal" data-target="#modalInputSupplier"><strong>+
				Tambah
				User</strong></button>
			<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
                        <th>#</th>
						<th>Username</th>
						<th>Nama User</th>
                        <th>Role</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($user as $u) : ?>
					<tr>
						<td><?=$u->id_user;?></td>
						<td><?=$u->username;?></td>
						<td><?=$u->nama;?></td>
						<td>
                        <?php if($u->level == '1') {
                            echo "Admin";
                        } else if($u->level == '2') {
                            echo "Operator";
                        } else if($u->level == '3') {
                            echo "Kasir";
                        } else if($u->level == '4') {
                            echo "Keuangan";
                        } else {
                            echo "Anggota Koperasi";
                        }
                        ?>
                        </td>
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
				<h5 class="modal-title" id="exampleModalScrollableTitle">Input Supplier</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?=base_url()?>gudang/aksi_tambah_supplier" method="post">
					<div class="form-group">
						<label for="nama_supplier">Nama Supplier</label>
						<input type="text" class="form-control" name="nama_supplier" id="nama_supplier"
							placeholder="Nama Supplier" class="form-control" value="<?=set_value('nama_supplier')?>">
						<span style="font-size: 10px; color: red"><?=form_error('nama_supplier')?></span>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea type="textarea" name="alamat" id="alamat" placeholder="Alamat" class="form-control"
							value="<?=set_value('alamat')?>" rows="5"></textarea>
						<span style="font-size: 10px; color: red"><?=form_error('alamat')?></span>
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


<!-- Start Footer -->
<?php $this->load->view('admin/footer'); ?>
<!-- End Footer -->