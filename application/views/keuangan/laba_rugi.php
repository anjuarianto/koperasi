<?php $this->load->view('keuangan/header');?>


<div class="card shadow border-bottom-primary mb-4">
	<div class="card-header bg-primary">
		<h6 class="m-0 font-weight-bold text-white">Tabel Pemasukan</h6>
	</div>
	<div class="card-body">
		<div class="row mb-0 w-20 ml-2">
			<div class="table-responsive">
				<table class="table table-striped table-sm table-hover" width="100%" cellspacing="0" role="grid"
					aria-describedby="dataTable_info" style="width: 100%;">
					<thead class="thead-light">
						<tr>
							<th>No.</th>
							<th>Deskripsi</th>
							<th>Total Pemasukan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Pemasukan</td>
							<td><?php $total_pemasukan = 0;
                            foreach ($pemasukan as $p) {
                                # code...
                                $total_pemasukan += $p->total_pemasukan;
                            }
                            echo 'Rp. '.number_format($total_pemasukan,0,',','.');?></td>
						</tr>
						<tr>
							<td>2</td>
							<td>Pengeluaran</td>
							<td>Rp. <?=number_format($pengeluaran->total_harga_pembelian,0,',','.')?></td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="2">Total</th>
							<th>Rp. <?=number_format($total_pemasukan-$pengeluaran->total_harga_pembelian,0,',','.');?></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>

	<?php $this->load->view('keuangan/footer');?>
