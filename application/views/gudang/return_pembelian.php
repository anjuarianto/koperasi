<?php $this->load->view('gudang/header'); ?>


<!-- Start content -->
<!-- datatable -->
<div class="card shadow mb-4 border-bottom-primary">
	<div class="card-header bg-primary d-flex justify-content-between">
		<h6 class="m-0 font-weight-bold my-auto text-white">Tabel Return Barang</h6>
	</div>
	<div class="card-body">
		<div class="row w-20">
			<span> From </span>
			<div class="form-group col-sm-2 mx-2">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-calendar"></i></div>
					</div>

					<input type="text" id="min" class="form-control form-control-sm ">
				</div>
			</div>
			<span> to </span>
			<div class="form-group col-sm-2 mx-2">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-calendar"></i></div>
					</div>
					<input type="text" id="max" class="form-control form-control-sm ">
				</div>
			</div>
		</div>

		<div class="table-responsive">
			<table class="table table-sm table-hover table-striped dataTable" id="dataTable" width="100%"
				cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
						<th>No</th>
						<th>Tanggal Return</th>
						<th>No Faktur</th>
                        <th>Memo</th>
						<th>Nama Barang</th>
						<th>Harga Beli</th>
						<th>Jumlah Barang</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($return_pembelian as $return) : ?>
					<tr data-info="stok" data-id="<?=$return->id_return_pembelian?>">
						<td></td>
						<td><?=date('d-m-Y', strtotime($return->tanggal))?></td>
						<td><?=$return->no_faktur;?></td>
						<td><?=$return->memo;?></td>
						<td><?=$return->nama_barang;?></td>
						<td>Rp <?=number_format($return->harga_beli,0,',','.');?></td>
						<td><?=$return->jumlah_barang;?></td>
						<td>Rp <?=number_format($return->jumlah_barang*$return->harga_beli,0,',','.');?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- end datatable -->


<!-- Modal Form Input Barang -->


<!-- End content -->



<?php $this->load->view('gudang/footer'); ?>
