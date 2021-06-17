<?php $this->load->view('gudang/header');?>

<div class="card shadow mb-4 border-bottom-primary ">
	<div class="card-header bg-primary d-flex justify-content-between">
		<h6 class="m-0 font-weight-bold text-white my-auto">Detail Pembelian</h6>
		<div class="div-button">
			<a href="<?=base_url();?>gudang/pembelian" class="btn btn-secondary btn-sm btn-icon-split"><span
					class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
				<span class="text">Kembali</span></a>
			<button class="btn btn-warning btn-sm btn-icon-split" data-toggle="modal"
				onclick="modalEditPembelian(<?=$pembelian->id_pembelian?>, '<?=base_url()?>')"
				data-target="#modalEditPembelian"><span class="icon text-white-50"><i class="fas fa-file"></i></span>
				<span class="text">Edit</span></button>
		</div>

	</div>
	<div class="card-body">

		<table>
			<tr>
				<td>No. Faktur</td>
				<td>:</td>
				<td><?=$pembelian->no_faktur?></td>
			</tr>
			<tr>
				<td>Tanggal Pembelian</td>
				<td>:</td>
				<td><?=date('d-m-Y', strtotime($pembelian->tgl_pembelian))?></td>
			</tr>
			<tr>
				<td>PPN</td>
				<td>:</td>
				<td><?=$pembelian->ppn?> %</td>
			</tr>
			<tr>
				<td>Jenis Pembayaran</td>
				<td>:</td>
				<td><?=$pembelian->jenis_pembayaran?></td>
			</tr>
			<tr>
				<td>Operator</td>
				<td>:</td>
				<td><?=$pembelian->nama?></td>
			</tr>
		</table>


		<div class="table-responsive">
			<table class="table table-sm table-striped table-hover dataTable" id="dataTable" width="100%"
				cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
						<th></th>
						<th>Nama Barang</th>
						<th>Qty</th>
						<th>Discount</th>
						<th>Harga</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($detail_pembelian as $p) : ?>
					<tr data-info="detail_pembelian" data-id="<?=$p->id_detail_pembelian?>">
						<td></td>
						<td><?=$p->nama_barang?></td>
						<td><?=$p->jumlah_barang?></td>
						<td><?=$p->discount?> %</td>
						<td>Rp. <?=number_format($p->harga_total_barang, 0, ',', '.')?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot>
					<tr class="table-active">
						<th colspan="4">Total</th>
						<th>Rp. <?=number_format($pembelian->before_ppn, 0, ',', '.')?></th>
					</tr>
					<tr>
						<th colspan="4">PPN</th>
						<th><?=$pembelian->ppn;?> %</th>
					</tr>
					<tr class="table-active">
						<th colspan="4">Grand Total</th>
						<th>Rp. <?=number_format($pembelian->total_harga_pembelian, 0, ',','.');?></th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>


	<!-- Modal Detail Barang -->
	<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalInputBarang"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content border-bottom-primary">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalScrollableTitle">Pembelian | Barang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" id="form-edit">
						<div class="form-group">
							<label for="kode_barang">Kode Barang</label>
							<input type="text" id="kode_barang" name="kode_barang" placeholder="Kode Barang"
								class="form-control" autocomplete="off" disabled>
						</div>
						<div class="form-group <?=form_error('nama_barang') ? 'has-error' : null ?>">
							<label for="nama_barang">Nama Barang</label>
							<input type="text" id="nama_barang" class="form-control" name="nama_barang"
								placeholder="Nama Barang" class="form-control" autocomplete="off" disabled>
						</div>
						<div class="form-group row">
							<div class="col">
								<label for="nama_supplier">Nama Supplier</label>
								<input type="text" id="nama_supplier" class="form-control" name="nama_supplier"
									placeholder="Nama Supplier" class="form-control" disabled>
								<span style="font-size: 10px; color: red"><?=form_error('nama_supplier')?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="harga_beli">QTY</label>

							<input type="text" name="jumlah_barang" id="jumlah_barang" placeholder="Jumlah Barang"
								class="form-control" required autocomplete="off">

						</div>
						<div class="form-group">
							<label for="harga_jual">Discount</label>
							<div class="input-group">
								<input type="text" name="discount" id="discount" placeholder="Discount"
									class="form-control" autocomplete="off" required>
								<div class="input-group-append">
									<div class="input-group-text">%</div>
								</div>
							</div>
						</div>
				</div>
				<div class="modal-footer d-flex justify-content-between">
				<div>
				<button type="button" class="btn btn-warning btn-sm btn-icon-split" id="btn-return" onclick="modalReturn(this, '<?=base_url()?>')"><span class="icon text-white-50"><i
								class="fas fa-file"></i></span>
						<span class="text">Return Barang</span></button>
					<button type="button" class="btn btn-sm btn-danger btn-icon-split" id="btn-edit"><span class="icon text-white-50"><i
								class="fas fa-file"></i></span>
						<span class="text">Edit</span></button>
				</div>
					
					<input type="submit" class="btn btn-primary" id="btn-submit" value="Simpan!" disabled>
					</form>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal Detail Barang -->
	<div class="modal fade" id="modalEditPembelian" tabindex="-1" role="dialog" aria-labelledby="modalInputBarang"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog" role="document">
			<div class="modal-content border-bottom-primary">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalScrollableTitle">Detail Pembelian</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" id="form-edit-pembelian">
						<div class="form-group">
							<label for="no_faktur">No. Faktur</label>
							<input type="text" id="no_faktur" name="no_faktur" placeholder="Nomor Faktur"
								class="form-control" disabled autocomplete="off">
						</div>
						<div class="form-group">
							<label for="tanggal_pembelian">Tanggal Pembelian</label>
							<input type="text" id="tanggal_pembelian" name="tgl_pembelian"
								placeholder="Tanggal Pembelian" disabled class="form-control" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="ppn">PPN</label>
							<div class="input-group">
								<input type="text" name="ppn" id="ppn" disabled placeholder="PPN" class="form-control"
									autocomplete="off" required>
								<div class="input-group-append">
									<div class="input-group-text">%</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="jenis_pembayaran">Jenis Pembayaran</label>
							<select type="text" name="jenis_pembayaran" id="jenis_pembayaran" disabled
								placeholder="Jenis Pembayaran" class="form-control" required autocomplete="off">
								<option value="Cash">Cash</option>
								<option value="Kredit">Kredit</option>
							</select>
						</div>
				</div>
				<div class="modal-footer">

					<button type="button" class="btn btn-danger btn-split-icon" id="btn-edit-pembelian">Edit</button>
					<input type="submit" class="btn btn-primary" id="btn-submit-pembelian" value="Simpan!" disabled>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modalReturn" tabindex="-1" role="dialog" aria-labelledby="modalInputBarang"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Input Return Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" id="form-return">
					<div class="form-group">
						<label for="tanggal_return">Tanggal</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-calendar"></i></div>
							</div>
							<input type="text" class="form-control" name="tanggal_return" id="tanggal_return"
								placeholder="Tanggal Return" class="form-control" autocomplete="off">
						</div>
					</div>
					<div class="row">
					<div class="form-group col">
						<label for="no_faktur_return">No Faktur</label>
                        <input type="text" class="form-control" name="no_faktur_return" id="no_faktur_return"
							placeholder="Nomor Faktur" class="form-control" autocomplete="off" disabled>
							
					</div>
					<div class="form-group col">
						<label for="nama_barang_return">Nama Barang</label>
						<input type="text" name="nama_barang_return" id="nama_barang_return" placeholder="Nama Barang"
							class="form-control" required disabled autocomplete="off">
					</div>
					</div>

					<div class="row">
					<div class="form-group col">
						<label for="harga_beli_return">Harga Beli</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">Rp</div>
							</div>
							<input type="text" name="harga_beli_return" id="harga_beli_return" placeholder="Harga Beli"
								class="form-control" required disabled autocomplete="off">
						</div>
					</div>
					<div class="form-group col">
						<label for="jumlah_barang_return">Jumlah Barang</label>
						<input type="text" name="jumlah_barang_return" id="jumlah_barang_return" placeholder="Jumlah Barang"
							class="form-control" disabled autocomplete="off">
					</div>
					
					</div>
					
					
					<div class="form-group">
						<label for="jumlah_return">Jumlah Return</label>
						<input type="text" name="jumlah_return" id="jumlah_return" placeholder="Jumlah Barang"
							class="form-control" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="memo">Memo</label>
						<input type="text" name="memo" id="memo" placeholder="Memo"
							class="form-control" autocomplete="off">
					</div>
			</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" id="btn-submit-return" value="Simpan!">
				</form>
			</div>
		</div>
	</div>
</div>

	<?php $this->load->view('gudang/footer'); ?>
