<?php $this->load->view('gudang/header'); ?>


<!-- Start content -->

<div class="container-fluid mb-4 p-3 shadow bg-white">
	<h1 class="h3 text-primary"><?=$judul;?></h1>
</div>
<!-- datatable -->
<div class="card shadow mb-4 border-bottom-primary">
	<div class="card-header bg-primary py-3">
		<h6 class="m-0 font-weight-bold text-white">Tabel Stok</h6>
	</div>
	<div class="card-body">
		<div class="row mb-4 w-20">
			<div class="form-group col-sm-2">
				<select class="form-control form-control-sm" id="filterColumn">
					<option value="1">Tanggal Pembelian</option>
					<option value="4">Tanggal Expired</option>
					<option value="5">Tanggal Return</option>
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
			<table class="table table-hover table-striped dataTable" id="dataTable" width="100%" cellspacing="0"
				role="grid" aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
						<th>No</th>
						<th>Tanggal Pembelian</th>
						<th>Nama Barang</th>
						<th>Stok Barang</th>
						<th>Tanggal Expired</th>
						<th>Tanggal Return</th>
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
						<td><?=$s->tanggal_return ? date('d-m-Y', strtotime($s->tanggal_return)) : 'Kosong' ;?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- end datatable -->


<!-- Modal Form Input Barang -->

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalInputBarang"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Input Detail Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" id="form-edit">
					<div class="form-group">
						<label for="tanggal_pembelian">Tanggal Pembelian</label>
						<input type="date" class="form-control" name="tanggal_pembelian" id="tanggal_pembelian"
							placeholder="Tanggal Pembelian" class="form-control" disabled>
						<span style="font-size: 10px; color: red"><?=form_error('tanggal_pembelian')?></span>
					</div>
					<div class="form-group <?=form_error('nama_barang') ? 'has-error' : null ?>">
						<label for="nama_barang">Nama Barang</label>
						<input type="text" class="form-control" name="nama_barang" id="nama_barang"
							placeholder="Nama Barang" class="form-control" value="<?=set_value('nama_barang')?>">
						<span style="font-size: 10px; color: red"><?=form_error('nama_barang')?></span>
					</div>

					<div class="form-group">
						<label for="stok_barang">Jumah Stok Barang</label>
						<input type="text" name="stok_barang" id="stok_barang" placeholder="Jumlah Stok"
							class="form-control" value="<?=set_value('stok_barang')?>" required>
						<span style="font-size: 10px; color: red"><?=form_error('stok_barang')?></span>
					</div>
					<div class="form-group">
						<label for="harga_beli">Tanggal Expired</label>

						<input type="date" name="tanggal_expired" id="tanggal_expired" placeholder="Tanggal Expired"
							class="form-control" value="<?=set_value('tanggal_expired')?>" required>
						<span style="font-size: 10px; color: red"><?=form_error('tanggal_expired')?></span>
					</div>
					<div class="form-group">
						<label for="harga_beli">Tanggal Return</label>
						<input type="date" name="tanggal_return" id="tanggal_return" placeholder="Tanggal Return"
							class="form-control" value="<?=set_value('tanggal_return')?>">
						<span style="font-size: 10px; color: red"><?=form_error('tanggal_return')?></span>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" id="btn-edit" data-info="stok">Edit</button>
				<input type="submit" class="btn btn-primary" value="Simpan!">
				</form>
			</div>
		</div>
	</div>
</div>


<!-- End content -->



<?php $this->load->view('gudang/footer'); ?>
