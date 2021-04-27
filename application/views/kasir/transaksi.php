<?php $this->load->view('kasir/header');?>


<!-- start content -->
<div class="container-fluid mt-4">
	<!-- wrapper -->
	<div class="row">



		<div class="col-xl-8 col-lg-7">

			<div class="row">
				<!-- container cari barang -->
				<div class="col">

					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Input Barang</h6>
						</div>
						<div class="card-body">
							<div class="input-group">
								<input type="text" name="kode_barang" id="kode_barang" class="form-control" placeholder="Kode Barang">
								<div class="input-group-append">
									<button class="btn btn-outline-primary" type="button" onclick="functionTambahBarang()"><i
											class="fas fa-fw fa-search"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end container cari barang -->
				<div class="col">
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Input Anggota</h6>
						</div>
						<div class="card-body">
							<div class="input-group">
								<input type="text" class="form-control" name="kode_anggota" id="kode_anggota" placeholder="Kode Anggota">
								<div class="input-group-append">
									<button class="btn btn-outline-primary" type="button" onclick="cariAnggota()"><i
											class="fas fa-fw fa-plus"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			

			<!-- start daftar barang penjualan -->

			<table class="table shadow bg-white" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
						<th>Item</th>
						<th>Harga</th>
						<th>Qty</th>
						<th>Total</th>
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

			<!-- end daftar barang penjualan -->
		</div>




		<!-- container input anggota -->
		<div class="col-xl-4 col-lg-5">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Detail Anggota</h6>
				</div>
				<div class="card-body">
					<div>Nama Anggota : <span id="detail-nama-anggota"></span></div>
					<div>Kode Anggota : <span id="detail-kode-anggota"></span></div>
				</div>
			</div>
			<div class="card shadow">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Detail Transaksi</h6>
				</div>
				<div class="card-body">
					<div class="subtotal d-flex justify-content-between text-primary font-weight-bold text-bold">
						<p class="m-0">Subtotal</p>
					</div>
					<hr>
					<div class="total d-flex justify-content-between text-primary font-weight-bold text-bold">
						<p class="m-0">Total</p>
					</div>
					<hr>
                    
					<div class="total d-flex justify-content-between mb-3 text-primary font-weight-bold text-bold">
						<select name="jenis_pembayaran" id="jenis_pembayaran" class="form-control custom-select">
							<option value="">Jenis Pembayaran</option>
							<option value="cash">Cash</option>
							<option value="voucher">Voucher</option>
							<option value="kredit">Kredit</option>
						</select>
					</div>
                    <input type="text" class="form-control mb-3" placeholder="Nominal Uang">
                    <input type="submit" value="Bayar" class="btn btn-success btn-block">
				</div>

			</div>

		</div>
		<!-- end container input anggota -->

	</div>
	<!-- end wrapper -->
</div>


<!-- end content -->

<?php $this->load->view('kasir/footer');?>
