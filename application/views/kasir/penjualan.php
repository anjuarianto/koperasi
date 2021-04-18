<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Penjualan</title>
	<link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
</head>

<body>
	<div class="container">
		<h3>Data Penjualan</h3>
		<form action="<?=base_url()?>kasir/bayar" id="form-body-detail" onsubmit="validasi()" method="post">
		<div class="form-group row">
			<div class="col">
			<label for="kode_anggota">Kode Anggota</label>
			<input type="text" name="kode_anggota" id="kode_anggota" placeholder="Kode Anggota" class="form-control">
			</div>
			<div class="col-1">
			<label for="btn-cari-anggota">Cari</label>
			<button type="button" class="btn btn-secondary" onclick="cariAnggota();" id="btn-cari-anggota">+</button>
			</div>
			<div class="col-4">
				<p>Nama Anggota : <span id="detail-nama-anggota"></span></p>
				<p>Kode Anggota : <span id="detail-kode-anggota"></span></p>
			</div>
		</div>
		<div class="form-group row">
			<div class="col">
			<label for="kode_barang">Kode Barang</label>
			<input type="text" name="kode_barang" class="form-control" id="kode_barang">
			</div>
			<div class="col-2">
			<label for="kode_barang">Jumlah Barang</label>
			<input type="text" name="jumlah_barang" class="form-control" id="jumlah_barang">
			</div>
			<div class="col-1">
				<label for="btn-tambah">Tambah</label>
			<button type="button" id="btn-tambah" onclick="functionTambahBarang();" class="btn btn-secondary form-control"><strong>+</strong></button>
			</div>
			
		</div>
		<div id="detail-pembelian"></div>
		<div>
			<table class="table table-bordered table-striped tbl-sm">
				<thead>
					<tr>
						<th>Nama Barang</th>
						<th>Harga Barang</th>
						<th>Jumlah Barang</th>
						<th>Harga Total</th>
					</tr>
				</thead>
				<tbody id="detail-barang">
				</tbody>
				<tfoot>
					<tr>
						<th colspan="3">Total</th>
						<th id="harga-total-barang"></th>
					</tr>
				</tfoot>
			</table>
		</div>
		<div class="form-group row">
			<div class="col">
				<label for="jenis_pembayaran">Jenis Pembayaran</label>
				<select name="jenis_pembayaran" id="jenis_pembayaran" class="form-control">
					<option value="">Jenis Pembayaran</option>
					<option value="cash">Cash</option>
					<option value="voucher">Voucher</option>
					<option value="kredit">Kredit</option>
				</select>
			</div>
			<div class="col">
				<div style="display:none">
				<label for="kode_voucher">Kode Voucher</label>
				<input type="text" name="kode_voucher" id="kode_voucher" class="form-control" placeholder="Kode Voucher">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="nominal_uang">Nominal Uang</label>
			<input type="text" name="nominal_uang" id="nominal_uang" class="form-control" placeholder="Nominal Uang">
		</div>
		<div class="form-group">
			<input type="submit" value="Bayar" class="btn btn-lg btn-secondary">
		</div>
	</form>
	</div>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
	<script>
		var arrayBarang = <?=json_encode($barang)?>;
		var arrayAnggota = <?=json_encode($anggota)?>;
	</script>
	<script src="<?=base_url()?>assets/app.js"></script>
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
</body>

</html>
