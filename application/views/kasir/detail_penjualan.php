<?php $this->load->view('kasir/header');?>

<?php 


?>
<div class="card shadow mb-4 border-bottom-primary ">
	<div class="card-header bg-primary d-flex justify-content-between">
		<h6 class="m-0 font-weight-bold text-white my-auto">Detail Penjualan</h6>
		<div class="div-button">
			<a href="<?=base_url();?>kasir/penjualan" class="btn btn-secondary btn-sm btn-icon-split"><span
					class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
				<span class="text">Kembali</span></a>
				<?php if($penjualan != "") : ?>
			<button class="btn btn-warning btn-sm btn-icon-split" data-toggle="modal"
				onclick="modalEditPenjualan(<?=$penjualan->id_penjualan?>, '<?=base_url()?>')"
				data-target="#modalEditPenjualan"><span class="icon text-white-50"><i class="fas fa-file"></i></span>
				<span class="text">Edit</span></button>
				<?php endif ?>
				
		</div>

	</div>
	<div class="card-body">
	<?php if($penjualan == "" ) :?>
	<h3>Tidak ada data ditemukan</h3>
	<?php else : ?>
		<table>
			<tr>
				<td>No. Struk</td>
				<td>:</td>
				<td><?=$penjualan->id_penjualan?></td>
			</tr>
			<tr>
				<td>Tanggal Penjualan</td>
				<td>:</td>
				<td><?=date('d-m-Y', strtotime($penjualan->tgl_penjualan))?></td>
			</tr>
			<tr>
				<td>Total Transaksi</td>
				<td>:</td>
				<td>Rp. <?=number_format($penjualan->total_harga_penjualan, 0, ',','.')?></td>
			</tr>
			<tr>
				<td>Nilai Voucher</td>
				<td>:</td>
				<td>Rp.
					<?= $penjualan->kode_voucher != null ? number_format(count(explode(',', $penjualan->kode_voucher))*100000, 0, ',','.') : 'Voucher Tidak Ada'?>
				</td>
			</tr>
			<tr>
				<td>Nominal Uang</td>
				<td>:</td>
				<td>Rp. <?=number_format($penjualan->nominal_uang, 0, ',','.')?></td>
			</tr>
			<tr>
				<td>Kembalian</td>
				<td>:</td>
				<td>Rp.
					<?=$penjualan->kode_voucher != null ? number_format((count(explode(',', $penjualan->kode_voucher))*100000+$penjualan->nominal_uang)-$penjualan->total_harga_penjualan, 0, ',','.') : $penjualan->nominal_uang-$penjualan->total_harga_penjualan ?>
				</td>
			</tr>
			<tr>
				<td>Jenis Pembayaran</td>
				<td>:</td>
				<td><?=$penjualan->jenis_pembayaran?></td>
			</tr>
			<tr>
				<td>Kode Voucher</td>
				<td>:</td>
				<td>
					<?php if($penjualan->kode_voucher != null) {
                    $id_voucher = explode(',', $penjualan->kode_voucher);
                    for($i=0;$i<count($id_voucher);$i++) {
                        echo '<span style="cursor:pointer" onclick="detailVoucher(this)" data-info="'.base_url().'" data-id="'.$id_voucher[$i].'" class="bg-primary m-1 p-1 text-white" >#'.$id_voucher[$i].'</span>';
                    }
                }
                
                ?>
				</td>
			</tr>
			<tr>
				<td>Operator</td>
				<td>:</td>
				<td><?=$penjualan->nama?></td>
			</tr>
		</table>


		<div class="table-responsive mt-4">
			<table class="table table-sm table-striped table-hover dataTable" id="dataTable" width="100%"
				cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
						<th></th>
						<th>Nama Barang</th>
						<th>Harga Barang</th>
						<th>Qty</th>
						<th>Harga</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($detail_penjualan as $p) : ?>
					<tr data-info="detail_penjualan" data-id="<?=$p->id_detail_penjualan?>">
						<td></td>
						<td><?=$p->nama_barang?></td>
						<td>Rp. <?=number_format($p->harga_jual, 0, ',','.')?></td>
						<td><?=$p->jumlah_barang?></td>
						<td>Rp. <?=number_format($p->harga_total_barang, 0, ',', '.')?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot>
					<tr class="table-active">
						<th colspan="4">Total</th>
						<th>Rp. <?=number_format($penjualan->total_harga_penjualan, 0, ',', '.')?></th>
					</tr>
					<tr>
						<th colspan="4">Voucher</th>
						<th>
                        Rp. <?= $penjualan->kode_voucher != null ? number_format(count(explode(',', $penjualan->kode_voucher))*100000, 0, ',','.') : '0'?>
                </th>
					</tr>
					<tr class="table-active">
						<th colspan="4">Grand Total</th>
						<th colspan="2">Rp. <?=$penjualan->kode_voucher != null ? number_format($penjualan->total_harga_penjualan-count(explode(',', $penjualan->kode_voucher))*100000, 2, ',','.') : number_format($penjualan->total_harga_penjualan,0,',','.');?></th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
	<?php endif; ?>


	<!-- Modal Detail Barang -->
	<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalInputBarang"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content border-bottom-primary">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalScrollableTitle">Penjualan | Barang</h5>
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
								class="form-control" disabled required autocomplete="off">

						</div>
				</div>
				<div class="modal-footer">
				
					<button type="button" class="btn btn-danger" onclick="enableForm(this)" id="btn-edit">Edit</button>
					<input type="submit" class="btn btn-primary" id="btn-submit" value="Simpan!" disabled>
					</form>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal Detail Barang -->
	<div class="modal fade" id="modalEditPenjualan" tabindex="-1" role="dialog" aria-labelledby="modalInputBarang"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog" role="document">
			<div class="modal-content border-bottom-primary">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalScrollableTitle">Detail Penjualan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="<?=base_url()?>kasir/update_penjualan/<?=$penjualan->id_penjualan?>" method="post" id="form-edit-penjualan">
						<div class="form-group">
							<label for="no_faktur">No. Struk</label>
							<input type="text" id="no_struk" name="no_struk" placeholder="Nomor Struk"
								class="form-control" disabled autocomplete="off">
						</div>
						<div class="form-group">
							<label for="tgl_penjualan">Tanggal Penjualan</label>
							<input type="text" id="tgl_penjualan" name="tgl_penjualan"
								placeholder="Tanggal Penjualan" disabled class="form-control" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="kode_voucher">Kode Voucher</label>
                            <input type="text" name="kode_voucher" id="kode_voucher"
								placeholder="Kode Voucher" disabled class="form-control" autocomplete="off">
						</div>
                        <div class="form-group div-kode-voucher">
                            
                            </div>
						<div class="form-group">
							<label for="jenis_pembayaran">Jenis Pembayaran</label>
							<select type="text" name="jenis_pembayaran" id="jenis_pembayaran" disabled
								placeholder="Jenis Pembayaran" class="form-control" required autocomplete="off">
								<option value="Cash">Cash</option>
								<option value="Kredit">Kredit</option>
							</select>
						</div>
                        <div class="form-group">
							<label for="harga_jual">Nominal Uang</label>
							<div class="input-group">
                            <div class="input-group-prepend">
									<div class="input-group-text">Rp.</div>
								</div>
								<input type="text" name="nominal_uang" id="nominal_uang" placeholder="Nominal Uang"
									class="form-control" autocomplete="off" disabled required>
							</div>
						</div>
				</div>
				<div class="modal-footer">
				<button class="btn btn-danger btn-sm btn-icon-split mr-auto" data-toggle="modal"
				onclick="modalEditPenjualan(<?=$penjualan->id_penjualan?>, '<?=base_url()?>')"
				data-target="#modalEditPenjualan"><span class="icon text-white-50 "><i class="fas fa-trash"></i></span>
				<span class="text">Return Transaksi</span></button>
					<button type="button" class="btn btn-danger" onclick="enableForm(this)" id="btn-edit-penjualan">Edit</button>
					<input type="submit" class="btn btn-primary" id="btn-submit-penjualan" value="Simpan!" disabled>
					</form>
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="modalDetailVoucher" tabindex="-1" role="dialog" aria-labelledby="modalInputBarang"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog" role="document">
			<div class="modal-content border-bottom-primary">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalScrollableTitle">Detail Voucher</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
						<div class="form-group">
							<label for="id_voucher">Kode Voucher</label>
							<input type="text" id="id_voucher" placeholder="Kode Voucher"
								class="form-control" disabled autocomplete="off">
						</div>
						<div class="form-group">
							<label for="nama_anggota">Nama Anggota</label>
							<input type="text" id="nama_anggota" 
								placeholder="Nama Anggota" disabled class="form-control" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="bulan">Bulan</label>
							<input type="text" id="bulan" 
								placeholder="Bulan" disabled class="form-control" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="tahun">Tahun</label>
							<input type="text" id="tahun" 
								placeholder="Tanggal Penjualan" disabled class="form-control" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="status">Status</label>
							<input type="text" id="status"
								placeholder="Status" disabled class="form-control" autocomplete="off">
						</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('kasir/footer'); ?>
