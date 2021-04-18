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
</head>

<body>
<?php $this->load->view('gudang/nav_gudang');?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
	<div class="container bg-white p-1 mb-3 d-flex justify-content-between shadow-sm">
		<h3 class="text-center m-3">Daftar Detail Barang</h3>
		<button class="btn btn-primary btn-sm h-25 mb-auto mt-auto mr-2" data-toggle="modal" data-target="#modalInputBarang"><strong>+ Tambah
				Barang</strong></button>
	</div>
	<div class="container bg-white p-1 mb-3 shadow-sm">
		
		<table class="table table-bordered" id="example" style="width:100%">
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
</main>

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
			<?=$script?>;
		});

	</script>
	<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
	<script>
		feather.replace()

	</script>



</body>

</html>
