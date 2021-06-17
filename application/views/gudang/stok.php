<?php $this->load->view('gudang/header'); ?>


<!-- Start content -->
<!-- datatable -->
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
			<table class="table table-sm table-hover table-striped dataTable" id="dataTable" width="100%"
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

<!-- end datatable -->


<!-- Modal Form Input Barang -->

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
				<form method="post" id="form-edit">
					<div class="form-group">
						<label for="tanggal_pembelian">Tanggal Pembelian</label>
						<input type="date" class="form-control" name="tanggal_pembelian" id="tanggal_pembelian"
							placeholder="Tanggal Pembelian" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label for="nama_barang">Nama Barang</label>
						<input type="text" class="form-control" name="nama_barang" id="nama_barang"
							placeholder="Nama Barang" class="form-control" autocomplete="off">
					</div>

					<div class="form-group">
						<label for="stok_barang">Jumah Stok Barang</label>
						<input type="text" name="stok_barang" id="stok_barang" placeholder="Jumlah Stok"
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
				<button type="button" class="btn btn-danger" id="btn-edit" data-info="stok">Edit</button>
				<input type="submit" class="btn btn-primary" id="btn-submit" value="Simpan!">
				</form>
			</div>
		</div>
	</div>
</div>


<!-- End content -->



<?php $this->load->view('gudang/footer'); ?>
