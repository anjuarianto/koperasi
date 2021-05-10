<?php $this->load->view('gudang/header');?>

<div class="card shadow mb-4 border-bottom-primary">
	<div class="card-header py-3 bg-primary">
		<h6 class="m-0 font-weight-bold text-white">Detail Pembelian</h6>
	</div>
	<div class="card-body">
    <a href="<?=base_url();?>gudang/pembelian" class="btn btn-secondary btn-sm mt-2 mb-4 btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
				<span class="text">Kembali</span></a>
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
			<table class="table table-sm table-striped table-hover dataTable" id="dataTable" width="100%" cellspacing="0"
				role="grid" aria-describedby="dataTable_info" style="width: 100%;">
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
<?php $this->load->view('gudang/footer'); ?>