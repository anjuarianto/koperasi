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
			<button class="btn btn-primary mt-2 mb-4 btn-icon-split btn-sm" data-toggle="modal"
				data-target="#modalInputUser"><strong><span class="icon text-white-50">
						<i class="fas fa-plus"></i>
					</span><span class="text">Tambah User</span></strong></button>
			<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
						<th>#</th>
						<th>NRP</th>
						<th>Nama User</th>
						<th>Role</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($user as $u) : ?>
					<tr>
						<td><?=$u->id_user;?></td>
						<td><?=$u->kode_anggota;?></td>
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

<div class="modal fade" id="modalInputUser" tabindex="-1" role="dialog" aria-labelledby="modalInputSupplier"
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
						<label for="nama">Nama</label>
						<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap"
							class="form-control" value="<?=set_value('nama')?>">
						<span style="font-size: 10px; color: red"><?=form_error('nama')?></span>
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" id="username" placeholder="Username"
							class="form-control" value="<?=set_value('username')?>">
						<span style="font-size: 10px; color: red"><?=form_error('username')?></span>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" name="email" id="email" placeholder="Email"
							class="form-control" value="<?=set_value('email')?>">
						<span style="font-size: 10px; color: red"><?=form_error('email')?></span>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password"
							class="form-control" value="<?=set_value('password')?>">
						<span style="font-size: 10px; color: red"><?=form_error('password')?></span>
					</div>
					<div class="form-group">
						<label for="satuan">Satuan</label>
						<input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan"
							class="form-control" value="<?=set_value('satuan')?>">
						<span style="font-size: 10px; color: red"><?=form_error('satuan')?></span>
					</div>
					<div class="form-group">
						<label for="jabatan">Jabatan</label>
						<input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan"
							class="form-control" value="<?=set_value('jabatan')?>">
						<span style="font-size: 10px; color: red"><?=form_error('jabatan')?></span>
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
