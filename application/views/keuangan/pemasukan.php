<?php $this->load->view('keuangan/header');?>

<!-- Start content -->


<div class="card shadow border-bottom-primary mb-4">
	<div class="card-header bg-primary">
		<h6 class="m-0 font-weight-bold text-white">Tabel Pemasukan</h6>
	</div>
	<div class="card-body">
	<div class="row mb-0 w-20 ml-2">
			<span>From</span>
			<div class="form-group col-sm-2 mx-2">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-calendar"></i></div>
					</div>
					<input type="text" id="min" class="form-control form-control-sm ">
				</div>

			</div>
			<span>to</span>
			<div class="form-group col-sm-2 mx-2">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-calendar"></i></div>
					</div>
					<input type="text" id="max" class="form-control form-control-sm ">
				</div>

			</div>
		<div class="table-responsive">
			<button class="btn btn-primary btn-sm ml-auto my-0 btn-icon-split" data-toggle="modal"
				data-target="#modalInputPemasukan"><span class="icon text-white-50"><i class="fas fa-plus"></i></span>
				<span class="text">Pemasukan</span></button>
			<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
					<th></th>
						<th>Tanggal</th>
						<th>Deskripsi Pemasukan</th>
						<th>Total Pemasukan</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pemasukan as $p) : ?>
					<tr data-info="pemasukan" data-id="id_pemasukan">
					<td></td>
						<td><?=date('d-m-Y', strtotime($p->tanggal));?></td>
						<td><?=$p->deskripsi_pemasukan;?></td>
						<td>Rp. <?=number_format($p->total_pemasukan,2, ',','.');?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="3">Total</th>
						<td></td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>

<div class="modal fade" id="modalInputPemasukan" tabindex="-1" role="dialog" aria-labelledby="modalInputBarang"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Input Pemasukan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?=base_url()?>keuangan/aksi_input_pemasukan" method="post" id="form-edit">
					<div class="form-group">
						<label for="tanggal">Tanggal</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-calendar"></i></div>
							</div>
							<input type="text" name="tanggal" id="tanggal"
								placeholder="Tanggal" class="form-control" required>
						</div>
					</div>
					<div class="form-group <?=form_error('nama_barang') ? 'has-error' : null ?>">
						<label for="deskripsi_pemasukan">Deskripsi Pemasukan</label>
						<select class="form-control" name="deskripsi_pemasukan">
							<option value="Contoh Deskripsi Pemasukan Satu">Contoh Deskripsi Pemasukan Satu</option>
						</select>
					</div>
					<div class="form-group">
						<label for="total_pemasukan">Total Pemasukan</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">Rp</div>
							</div>
							<input type="text" name="total_pemasukan" id="total_pemasukan"
								placeholder="Total Pemasukan" class="form-control" required>
						</div>
					</div>

			</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" id="btn-submit" value="Simpan!">
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalInputBarang"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Input Pemasukan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?=base_url()?>keuangan/aksi_input_pemasukan" method="post" id="form-edit">
					<div class="form-group">
						<label for="tanggal">Tanggal</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-calendar"></i></div>
							</div>
							<input type="text" name="tanggal" id="tanggal"
								placeholder="Tanggal" class="form-control" required>
						</div>
					</div>
					<div class="form-group <?=form_error('nama_barang') ? 'has-error' : null ?>">
						<label for="deskripsi_pemasukan">Deskripsi Pemasukan</label>
						<select class="form-control" name="deskripsi_pemasukan">
							<option value="Contoh Deskripsi Pemasukan Satu">Contoh Deskripsi Pemasukan Satu</option>
						</select>
					</div>
					<div class="form-group">
						<label for="total_pemasukan">Total Pemasukan</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">Rp</div>
							</div>
							<input type="text" name="total_pemasukan" id="total_pemasukan"
								placeholder="Total Pemasukan" class="form-control" required>
						</div>
					</div>

			</div>
			<div class="modal-footer">
			<a id="btn-cetak-harga" class="btn btn-secondary">Cetak Harga</a>
				<button type="button" class="btn btn-danger" data-info="barang" id="btn-edit">Edit</button>
				<input type="submit" class="btn btn-primary" id="btn-submit" value="Simpan!">
				</form>
			</div>
		</div>
	</div>
</div>
<!-- end content -->
<?php $this->load->view('keuangan/footer');?>
