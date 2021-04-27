<?php $this->load->view('kasir/header'); ?>

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
	<script>
		var arrayBarang = <?=json_encode($barang)?>;
		var arrayAnggota = <?=json_encode($anggota)?>;
	</script>
	<script src="<?=base_url()?>assets/app.js"></script>
	<?php $this->load->view('kasir/footer'); ?>