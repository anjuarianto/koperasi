<!-- Start Header -->
<?php $this->load->view('admin/header'); ?>
<!-- End Header -->

<!-- Start Content -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Tabel Pembelian</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
				<tr>
					<th>Tanggal Pembelian</th>
					<th>Total Harga Pembelian</th>
					<th>Detail Pembelian</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($pembelian as $p) : ?>
				<tr>
					<td><?=$p->tgl_pembelian;?></td>
					<td><?=$p->total_harga_pembelian;?></td>
					<td><a href="<?=base_url()?>gudang/detail_pembelian/<?=$p->id_pembelian?>">Detail</a></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
		</div>
	</div>
</div>
				
	<!-- Modal Tambah Pembelian -->

	<div class="modal fade bd-example-modal-lg" id="modalInputPembelian" tabindex="-1" role="dialog"
		aria-labelledby="modalInputPembelian" aria-hidden="true">
		<div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalScrollableTitle">Input Pembelian</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="aksi_tambah_pembelian" method="post" onsubmit="validasi()" id="formPembelian">
						<div class="form-group">
							<label for="tanggal_pembelian">Tanggal Masuk</label>
							<input type="date" class="form-control" name="tanggal_pembelian" id="tanggal_pembelian"
								placeholder="Tanggal Masuk" class="form-control"
								value="<?=set_value('tanggal_pembelian')?>">
							<span style="font-size: 10px; color: red"><?=form_error('tanggal_pembelian')?></span>
						</div>
						

						<!-- Input Setelah Ada -->
						<div class="row">
							<div class="form-group col-3">
								<label for="nama_supplier">Nama Supplier</label>
								<select type="text" class="form-control" id="nama_supplier" class="form-control">
									<option value="">Pilih Nama Supplier</option>
									<?php foreach ($supplier as $s) : ?>
									<option value="<?=$s->id_supplier?>"><?=$s->nama_supplier?></option>
									<?php endforeach; ?>
								</select>
								<span style="font-size: 10px; color: red"><?=form_error('nama_supplier')?></span>
							</div>
							<div class="form-group col-4">
								<label for="nama_barang">Nama Barang</label>
								<select type="text" class="form-control" id="nama_barang" class="form-control">
									<option value="">Pilih Nama Barang</option>
								</select>
								<span style="font-size: 10px; color: red"><?=form_error('nama_barang')?></span>
							</div>
							<div class="form-group col-2">
								<label for="jumlah_barang">Jumlah Barang</label>
								<input type="text" class="form-control" name="jumlah_barang" id="jumlah_barang"
									placeholder="Jumlah Barang" class="form-control"
									value="<?=set_value('jumlah_barang')?>">
								<span style="font-size: 10px; color: red"><?=form_error('jumlah_barang')?></span>
							</div>
							<div class="form-group col-2">
								<label for="tanggal_expired">Tanggal Expired</label>
								<input type="date" class="form-control" name="tanggal_expired" id="tanggal_expired"
									placeholder="Tanggal Expired">
							</div>
							<div class="col-1">
								<label for="tes">Tambah</label>
								<button type="button" class="btn btn-success btn-block"
									onclick="functionTambahBarang()"><strong>+</strong></button>
							</div>
						</div>
						<div class="mt-3">
							<h5 class="text-center mb-3">Daftar Detail Barang</h5>
							<div id="result">
                                <table class="table table-bordered table-striped table-sm">
                                    <thead class="thead-dark">
                                        <tr class="bg-info">
                                            <th>Nama Barang</th>
                                            <th>Harga/Unit</th>
                                            <th>Jumlah Barang</th>
                                            <th>Harga Barang</th>
											<th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body-detail">
                                    </tbody>
                                    <tfoot class="bg-info">
                                        <tr>
                                            <th colspan="3">Total</th>
                                            <th id="total-harga" colspan="2"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
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