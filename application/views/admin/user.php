<!-- Start Header -->
<?php $this->load->view('admin/header'); ?>
<!-- End Header -->

<!-- Start Content -->
<div class="card mb-4">
	<div class="card-header bg-primary d-flex justify-content-between">
		<h6 class="m-0 font-weight-bold text-white my-auto">Tabel User</h6>
		<div class="div-button">
		<button class="btn btn-dark btn-icon-split btn-sm" data-toggle="modal"
				data-target="#modalInputUser"><strong><span class="icon text-white-50">
						<i class="fas fa-plus"></i>
					</span><span class="text">Tambah User</span></strong></button>
					<!-- <button class="btn btn-warning btn-icon-split btn-sm"><strong><span class="icon text-white-50">
						<i class="fas fa-file"></i>
					</span><span class="text">User Mendaftar</span></strong></button> -->
		</div>
		
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-sm table-hover table-striped dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
						<th>#</th>
						<th><?php $uri = $this->uri->total_segments(); echo $this->uri->segment($uri) == 'operator' ? 'Username' : 'NRP' ;?></th>
						<th>Nama User</th>
						<th>Role</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($user as $u) : ?>
					<tr data-id="<?=$u->id_user?>" data-info="user">
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

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalInputBarang"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog" role="document">
		<div class="modal-content border-bottom-primary">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Detail Stok</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" id="form-edit-stok">
					<div class="form-group">
						<label for="tanggal_pembelian">Tanggal Pembelian</label>
						<input type="date" class="form-control" name="tanggal_pembelian" id="tanggal_pembelian"
							placeholder="Tanggal Pembelian" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label for="nama_barang">Nama Barang</label>
						<input type="text" class="form-control" name="nama_barang_stok" id="nama_barang_stok"
							placeholder="Nama Barang" autocomplete="off">
					</div>

					<div class="form-group">
						<label for="jumlah_barang_stok">Jumah Stok Barang</label>
						<input type="text" name="jumlah_barang_stok" id="jumlah_barang_stok" placeholder="Jumlah Stok"
							class="form-control" required autocomplete="off">
					</div>
					<div class="form-group">
						<label for="harga_beli">Tanggal Expired</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-calendar"></i></div>
							</div>
							<input type="text" name="tanggal_expired" id="tanggal_expired" placeholder="Tanggal Expired"
								class="form-control" required autocomplete="off">
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" id="btn-edit-stok" data-info="stok">Edit</button>
				<input type="submit" class="btn btn-primary" id="btn-submit-stok" value="Simpan!">
				</form>
			</div>
		</div>
	</div>
</div>



<!-- Modal Form Input Barang -->

<div class="modal fade" id="modalInputUser" tabindex="-1" role="dialog" aria-labelledby="modalInputSupplier"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Input User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?=base_url()?>admin/aksi_tambah_user" method="post">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" id="username" placeholder="Username">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" name="email" id="email" placeholder="Email">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password">
					</div>
					<div class="form-group">
						<label for="satuan">Satuan</label>
						<input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan"
							class="form-control" value="<?=set_value('satuan')?>">
					</div>
					<div class="form-group">
						<label for="jabatan">Jabatan</label>
						<input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan"
							class="form-control" value="<?=set_value('jabatan')?>">
						<span style="font-size: 10px; color: red"><?=form_error('jabatan')?></span>
					</div>
					<div class="form-group">
						<label for="jabatan">Role</label>
						<select class="form-control" name="level" >
							<option value="2">Gudang</option>
							<option value="3">Kasir</option>
							<option value="4">Keuangan Koperasi</option>
							<option value="6">Keuangan Simpan Pinjam</option>
							<option value="7">Keuangan Koperasi Kredit</option>
						</select>
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
