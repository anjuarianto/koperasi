<?php $this->load->view('gudang/header');?>

<div class="card shadow mb-4 border-bottom-primary ">
	<div class="card-header bg-primary d-flex justify-content-between">
		<h6 class="m-0 font-weight-bold text-light my-auto">Tabel Supplier</h6>
		<button class="btn btn-sm btn-dark btn-icon-split" data-toggle="modal"
				data-target="#modalInputSupplier"><span class="icon text-white-50"><i class="fas fa-plus"></i></span>
				<span class="text">Tambah Supplier</span></button>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-sm table-striped table-hover dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
						<th></th>
						<th>Nama Supplier</th>
						<th>Alamat</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($supplier as $s) : ?>
					<tr data-info="supplier" data-id="<?=$s->id_supplier?>">
						<td></td>
						<td><?=$s->nama_supplier;?></td>
						<td><?=$s->alamat;?></td>
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
		<div class="modal-content border-bottom-primary">
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
						<input type="text" class="form-control" name="nama_supplier" placeholder="Nama Supplier"
							class="form-control" required autocomplete="off">
						<span style="font-size: 10px; color: red"><?=form_error('nama_supplier')?></span>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea type="textarea" name="alamat" placeholder="Alamat" class="form-control"
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

<!-- Modal Edit Supplier -->
<div class=" modal fade " id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalInputSupplier"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="border-bottom-primary modal-content">
			<div class="modal-header ">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Detail Supplier</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" id="form-edit">
					<div class="form-group">
						<label for="nama_supplier">Nama Supplier</label>
						<input type="text" class="form-control" name="nama_supplier" id="nama_supplier"
							placeholder="Nama Supplier" class="form-control" value="<?=set_value('nama_supplier')?>"
							disabled>
						<span style="font-size: 10px; color: red"><?=form_error('nama_supplier')?></span>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea type="textarea" name="alamat" id="alamat" placeholder="Alamat" class="form-control"
							value="<?=set_value('alamat')?>" rows="5" disabled></textarea>
						<span style="font-size: 10px; color: red"><?=form_error('alamat')?></span>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" id="btn-edit" data-info="supplier">Edit</button>
				<input type="submit" class="btn btn-primary" id="btn-submit" value="Simpan!" disabled="disabled">
				</form>
			</div>
		</div>
	</div>
</div>


<!-- end footer -->
<?php $this->load->view('gudang/footer');
