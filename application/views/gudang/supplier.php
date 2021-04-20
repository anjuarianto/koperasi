<?php $this->load->view('gudang/header');?>

<div class="container-fluid mb-4 p-3 shadow bg-white">
	<h1 class="h3 text-primary"><?=$judul;?></h1>
</div>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Tabel Barang</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
		<button class="btn btn-primary mt-2 mb-4" data-toggle="modal" data-target="#modalInputSupplier"><strong>+
				Tambah
				Supplier</strong></button>
			<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
						<th>Nama Supplier</th>
						<th>Alamat</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($supplier as $s) : ?>
					<tr>
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


<!-- end footer -->
<?php $this->load->view('gudang/footer');
