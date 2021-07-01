<!-- load header -->
<?php $this->load->view('gudang/header');?>
<!-- end header -->

<!-- datatable -->
<div class="card shadow mb-4 border-bottom-primary">
	<div class="card-header bg-primary d-flex justify-content-between">
		<h6 class="m-0 font-weight-bold text-white my-auto">Daftar Barang</h6>
		<button class="btn btn-dark btn-sm btn-icon-split" data-toggle="modal" data-target="#modalInputBarang"><span
				class="icon text-white-50"><i class="fas fa-plus"></i></span>
			<span class="text">Tambah Barang</span></button>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-sm table-hover table-striped dataTable" id="dataTable" width="100%"
				cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
						<th></th>
						<th>Nama Barang</th>
						<th>Rak</th>
						<th>Nama Supplier</th>
						<th>Kode Barang</th>
						<th>Harga Beli</th>
						<th>Harga Jual</th>
						<th>Stok</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($barang as $b) : ?>
					<tr data-info="barang" data-id="<?=$b->id_barang;?>">
						<td></td>
						<td><?=$b->nama_barang;?></td>
						<td><?=$b->nama_rak;?></td>
						<td><?=$b->nama_supplier;?></td>
						<td><?=$b->kode_barang;?></td>
						<td>Rp. <?=number_format($b->harga_beli, 0 , ',','.');?></td>
						<td>Rp. <?=number_format($b->harga_jual, 0 , ',','.');?></td>
						<td><?=$b->total_stok == null ? 0 : $b->total_stok?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- end datatable -->
<!-- datatable stok -->
<div class="card shadow mb-4 border-bottom-primary">
	<div class="card-header bg-primary">
		<h6 class="m-0 font-weight-bold text-white">Tabel Stok</h6>
	</div>
	<div class="card-body">
		<div class="row w-20">
			<div class="form-group col-sm-2">
				<select class="form-control form-control-sm" id="filterColumn">
					<option value="1">Tanggal Pembelian</option>
					<option value="4">Tanggal Expired</option>
				</select>
			</div>
			<span> From </span>
			<div class="form-group col-sm-2 mx-2">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-calendar"></i></div>
					</div>

					<input type="text" id="min" class="form-control form-control-sm ">
				</div>
			</div>
			<span> to </span>
			<div class="form-group col-sm-2 mx-2">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-calendar"></i></div>
					</div>
					<input type="text" id="max" class="form-control form-control-sm ">
				</div>
			</div>
		</div>

		<div class="table-responsive">
			<table class="table table-sm table-hover table-striped dataTable" id="dataTable2" width="100%"
				cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
						<th>No</th>
						<th>Tanggal Pembelian</th>
						<th>Nama Barang</th>
						<th>Stok Barang</th>
						<th>Tanggal Expired</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($stok as $s) : ?>
					<tr data-info="stok" data-id="<?=$s->id_stok?>">
						<td></td>
						<td><?=date('d-m-Y', strtotime($s->tanggal_pembelian))?></td>
						<td><?=$s->nama_barang;?></td>
						<td><?=$s->stok_barang;?></td>
						<td><?=date('d-m-Y', strtotime($s->tanggal_expired))?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal Form Input Barang -->
<div class="modal fade" id="modalInputBarang" tabindex="-1" role="dialog" aria-labelledby="modalInputBarang"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content border-bottom-primary">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Input Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?=base_url()?>gudang/aksi_tambah_barang" method="post">
					<div class="form-group">
						<label for="kode_barang">Kode Barang</label>
						<input type="text" name="kode_barang" placeholder="Kode Barang" class="form-control" autofocus required
							autocomplete="off">
					</div>
					<div class="form-group">
						<label for="nama_barang">Nama Barang</label>
						<input type="text" class="form-control" name="nama_barang" style="text-transform:uppercase" placeholder="Nama Barang"
							class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group row">
						<div class="col">
							<label for="nama_supplier">Nama Supplier</label>
							<input type="text" class="form-control typeahead" id="input_nama_supplier" autocomplete="off" data-provide="typeahead" name="nama_supplier" placeholder="Nama Supplier"
								class="form-control" autocomplete="off" required>
						</div>
						<div class="col-5 d-flex align-items-end justify-content-end mb-1">
							<label for="nama_supplier"> </label>
							<a type="button" class="btn btn-primary btn-sm btn-icon-split"
								href="<?=base_url()?>gudang/supplier/tambah_supplier"><span
									class="icon text-white-50"><i class="fas fa-plus"></i></span>
								<span class="text">Tambah Supplier</span></a>

						</div>
					</div>
					<div class="form-group">
						<label for="harga_beli">Harga Beli</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">Rp</div>
							</div>
							<input type="number" name="harga_beli" placeholder="Harga Beli" class="form-control"
							autocomplete="off" required>
						</div>
					</div>
					<div class="form-group">
						<label for="harga_jual">Harga Jual</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">Rp</div>
							</div>
							<input type="number" name="harga_jual" placeholder="Harga Jual" class="form-control" autocomplete="off" required>
						</div>
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


<!-- Modal Detail Barang -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalInputBarang"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content border-bottom-primary">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Detail Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" id="form-edit">
					<div class="form-group">
						<label for="kode_barang">Kode Barang</label>
						<input type="text" id="kode_barang" name="kode_barang" placeholder="Kode Barang"
							class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group <?=form_error('nama_barang') ? 'has-error' : null ?>">
						<label for="nama_barang">Nama Barang</label>
						<input type="text" id="nama_barang" class="form-control" name="nama_barang"
							placeholder="Nama Barang" class="form-control" autocomplete="off">
					</div>
					<div class="form-group row">
						<div class="col">
							<label for="nama_supplier">Nama Supplier</label>
							<input type="text" id="nama_supplier" class="form-control" name="nama_supplier"
								placeholder="Nama Supplier" class="form-control" 
								disabled>
							<span style="font-size: 10px; color: red"><?=form_error('nama_supplier')?></span>
						</div>
						
					</div>
					<div class="form-group">
						<label for="harga_beli">Harga Beli</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">Rp</div>
							</div>
							<input type="text" name="harga_beli" id="harga_beli" placeholder="Harga Beli"
								class="form-control" value="<?=set_value('harga_beli')?>" required autocomplete="off">
						</div>
					</div>
					<div class="form-group">
						<label for="harga_jual">Harga Jual</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">Rp</div>
							</div>
							<input type="text" name="harga_jual" id="harga_jual" placeholder="Harga Jual"
								class="form-control" autocomplete="off" required>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<a id="btn-cetak-harga" class="btn btn-secondary">Cetak Harga</a>
				<button type="button" class="btn btn-danger" data-info="barang" id="btn-edit">Edit</button>
				<input type="submit" class="btn btn-primary" id="btn-submit" value="Simpan!" disabled>
				</form>
			</div>
		</div>
	</div>
</div>



<!-- end datatable -->


<!-- Modal Form Edit Stok -->

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



<?php $this->load->view('gudang/footer');
