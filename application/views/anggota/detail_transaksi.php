<?php $this->load->view('anggota/header');?>

<?php 


?>
<div class="card shadow mb-4 border-bottom-primary ">
	<div class="card-header bg-primary d-flex justify-content-between">
		<h6 class="m-0 font-weight-bold text-white my-auto">Detail Penjualan</h6>
		<div class="div-button">
			<a href="<?=base_url();?>anggota/history_transaksi" class="btn btn-secondary btn-sm btn-icon-split"><span
					class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
				<span class="text">Kembali</span></a>
				<?php if($penjualan != "") : ?>
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
						<th>Total</th>
						<th></th>
						<th></th>
						<th></th>
						<th>Rp. <?=number_format($penjualan->total_harga_penjualan, 0, ',', '.')?></th>
					</tr>
					<tr>
						<th>Voucher</th>
						<th></th>
						<th></th>
						<th></th>
						<th>
                        Rp. <?= $penjualan->kode_voucher != null ? number_format(count(explode(',', $penjualan->kode_voucher))*100000, 0, ',','.') : '0'?>
                </th>
					</tr>
					<tr class="table-active">
						<th>Grand Total</th>
						<th></th>
						<th></th>
						<th></th>
						<th>Rp. <?=$penjualan->kode_voucher != null ? number_format($penjualan->total_harga_penjualan-count(explode(',', $penjualan->kode_voucher))*100000, 2, ',','.') : number_format($penjualan->total_harga_penjualan,0,',','.');?></th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
	<?php endif; ?>



	
	<?php $this->load->view('anggota/footer'); ?>
