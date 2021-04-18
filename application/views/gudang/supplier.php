<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Data Table -->
	<link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
	<link href="<?=base_url()?>assets/dashboard.css" rel="stylesheet">
	<title>Daftar Supplier</title>
</head>

<body>
	<?php $this->load->view('gudang/nav_gudang'); ?>
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
		<div class="container bg-white pt-1 shadow-sm">
			<h1 class="text-center m-4">Daftar Supplier</h1>
			<button class="btn btn-primary mt-2 mb-4" data-toggle="modal" data-target="#modalInputSupplier"><strong>+
					Tambah
					Supplier</strong></button>
			<table class="table table-bordered" id="example" style="width:100%">
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
	</main>

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
								placeholder="Nama Supplier" class="form-control"
								value="<?=set_value('nama_supplier')?>">
							<span style="font-size: 10px; color: red"><?=form_error('nama_supplier')?></span>
						</div>
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<textarea type="textarea" name="alamat" id="alamat" placeholder="Alamat"
								class="form-control" value="<?=set_value('alamat')?>" rows="5"></textarea>
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

	<!-- Modal Form Update Barang -->
	<div class="modal fade" id="modalUpdateBarang" tabindex="-1" role="dialog" aria-labelledby="modalUpdateBarang"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalScrollableTitle">Ubah Barang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?=base_url();?>index.php/barang/ubah_aksi" method="post"
						enctype="multipart/form-data">
						<input type="hidden" id="id_barang" name="id_barang" value="<?=set_value('id_barang')?>">
						<div class="form-group <?=form_error('nama_barang') ? 'has-error' : null ?>">
							<label for="nama_barang">Nama Barang</label>
							<input type="text" name="nama_barang" id="nama_barang" placeholder="Nama Barang..."
								class="form-control" value="<?=set_value('nama_barang')?>" required>
							<span style="font-size: 10px; color: red"><?=form_error('nama_barang')?></span>
						</div>
						<div class="form-group <?=form_error('nama_vendor') ? 'has-error' : null ?>">
							<label for="nama_vendor">Nama Barang</label>
							<input type="text" name="nama_vendor" id="nama_vendor" placeholder="Nama Vendor..."
								class="form-control" value="<?=set_value('nama_vendor')?>" required>
							<span style="font-size: 10px; color: red"><?=form_error('nama_vendor')?></span>
						</div>
						<div class="form-group">
							<label for="nama_barang">Foto Barang</label>
							<input type="file" name="foto_barang" id="foto_barang" placeholder="Foto Barang.."
								class="form-control" value="" accept=".png, .jpg, .jpeg">
							<span style="font-size: 10px; color: red"><?=form_error('foto_barang')?></span>
						</div>
						<div class="form-group">
							<label for="nama_barang">Harga Beli</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">Rp</div>
								</div>
								<input type="text" name="harga_beli" id="harga_beli" placeholder="Harga Beli.."
									class="form-control" value="<?=set_value('harga_beli')?>" required>
							</div>
							<span style="font-size: 10px; color: red"><?=form_error('harga_beli')?></span>
						</div>
						<div class="form-group">
							<label for="nama_barang">Harga Jual</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">Rp</div>
								</div>
								<input type="text" name="harga_jual" id="harga_jual" placeholder="Harga Jual.."
									class="form-control" value="<?=set_value('harga_jual')?>" required>
							</div>
							<span style="font-size: 10px; color: red"><?=form_error('harga_jual')?></span>
						</div>
						<div class="form-group">
							<label for="nama_barang">Stok</label>
							<input type="text" name="stok" id="stok" placeholder="Stok" class="form-control"
								value="<?=set_value('stok')?>" required>
							<span style="font-size: 10px; color: red"><?=form_error('stok')?></span>
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

	<!-- js for bootstrap -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
		integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
		integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
		integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
	</script>
	<!-- DataTable -->
	<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$(document).ready(function () {
			$('#example').DataTable(); 
			<?=$script?>

		});

	</script>
	<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
	<script>
		feather.replace()

	</script>



</body>

</html>
