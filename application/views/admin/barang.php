<!-- Start Header -->
<?php $this->load->view('admin/header'); ?>
<!-- End Header -->

<!-- Start Content -->

<!-- datatable -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Tabel Barang</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
		<button class="btn btn-primary mt-2 mb-4" data-toggle="modal" data-target="#modalInputBarang"><strong>+
				Tambah Barang</strong></button>
			<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
						<th>Nama Barang</th>
						<th>Nama Supplier</th>
						<th>Kode Barang</th>
						<th>Harga Beli</th>
						<th>Harga Jual</th>
						<th>Stok</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($barang as $b) : ?>
					<tr>
						<td><?=$b->nama_barang;?></td>
						<td><?=$b->nama_supplier;?></td>
						<td><?=$b->kode_barang;?></td>
						<td>Rp. <?=$b->harga_beli;?></td>
						<td>Rp. <?=$b->harga_jual;?></td>
						<td><?=$b->total_stok == null ? 0 : $b->total_stok?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- end datatable -->


<!-- Modal Form Input Barang -->

<div class="modal fade" id="modalInputBarang" tabindex="-1" role="dialog" aria-labelledby="modalInputBarang"
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
				<form action="<?=base_url()?>gudang/aksi_tambah_barang" method="post">
					<div class="form-group <?=form_error('nama_barang') ? 'has-error' : null ?>">
						<label for="nama_barang">Nama Barang</label>
						<input type="text" class="form-control" name="nama_barang" id="nama_barang"
							placeholder="Nama Barang" class="form-control" value="<?=set_value('nama_barang')?>">
						<span style="font-size: 10px; color: red"><?=form_error('nama_barang')?></span>
					</div>
					<div class="form-group row">
						<div class="col">
							<label for="nama_supplier">Nama Supplier</label>
							<select name="nama_supplier" id="nama_supplier" class="form-control custom-select">
								<option selected disabled value="">Pilih Nama Supplier</option>
								<?php foreach($supplier as $s) :?>
								<option value="<?=$s->id_supplier?>"><?=$s->nama_supplier?></option>
								<?php endforeach ?>
							</select>
							<span style="font-size: 10px; color: red"><?=form_error('nama_supplier')?></span>
						</div>
						<div class="col-4">
							<label for="btn-tambah-supplier">Tambah Supplier</label>
							<a type="button" class="btn btn-primary"
								href="<?=base_url()?>gudang/supplier/tambah_supplier">Tambah</a>
						</div>
					</div>
					<div class="form-group">
						<label for="kode_barang">Kode Barang</label>
						<input type="text" name="kode_barang" id="kode_barang" placeholder="Kode Barang"
							class="form-control" value="<?=set_value('kode_barang')?>" required>
						<span style="font-size: 10px; color: red"><?=form_error('kode_barang')?></span>
					</div>
					<div class="form-group">
						<label for="harga_beli">Harga Beli</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">Rp</div>
							</div>
							<input type="text" name="harga_beli" id="harga_beli" placeholder="Harga Beli"
								class="form-control" value="<?=set_value('harga_beli')?>" required>
						</div>
						<span style="font-size: 10px; color: red"><?=form_error('harga_beli')?></span>
					</div>
					<div class="form-group">
						<label for="harga_jual">Harga Jual</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">Rp</div>
							</div>
							<input type="text" name="harga_jual" id="harga_jual" placeholder="Harga Jual"
								class="form-control" required>
						</div>
						<span style="font-size: 10px; color: red"><?=form_error('harga_jual')?></span>
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