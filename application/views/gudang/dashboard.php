<!-- load header -->
<?php $this->load->view('gudang/header');?>
<!-- end header -->

<!-- Begin Page Content -->
<div class="container-fluid mb-4 p-3 shadow bg-white">

	<!-- Page Heading -->
	<h1 class="h3 text-primary">Dashboard Gudang</h1>


</div>

<div class="container-fluid">
	<div class="row">
		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								Barang</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?=$barang?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-folder fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								Supplier</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?=$supplier?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Transaksi
							</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=$jumlah_transaksi?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
								Stok</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?=$stok?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header bg-warning py-3">
                <h6 class="m-0 font-weight-bold text-white text-center">Stok Akan Expired</h6>
            </div>
            <div class="table-responsive">
                <table class="table mb-0 text-center table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Jumlah Stok</th>
                            <th>Tanggal Expired</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php if($stok_expired)  :?>
                        <?php
                            foreach ($stok_expired as $ex) : ?>
                                <tr>
                                    <td><?= $ex->nama_barang ?></td>
                                    <td><?= $ex->stok_barang ?></td>
                                    <td><?= $ex->tanggal_expired ?></td>
                                </tr>
                            <?php endforeach; ?>
							<?php else : ?>
                            <tr>
                                <td colspan="3" class="text-center">
                                    Tidak ada data barang akan expired
                                </td>
                            </tr>
							<?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header bg-success py-3">
                <h6 class="m-0 font-weight-bold text-white text-center">Transaksi Pembayaran Kredit</h6>
            </div>
            <div class="table-responsive">
                <table class="table mb-0 table-sm table-striped text-center">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>No Faktur</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php if($transaksi_kredit) : ?>
                        <?php foreach ($transaksi_kredit as $kredit) : ?>
                            <tr>
                                <td><strong><?= $kredit->tgl_pembelian ?></strong></td>
                                <td><?= $kredit->no_faktur ?></td>
                                <td><span class="badge badge-success"><?= $kredit->total_harga_pembelian ?></span></td>
                            </tr>
                        <?php endforeach; ?>
						<?php else : ?>
                            <tr>
                                <td colspan="3" class="text-center">
                                    Tidak ada transaksi kredit
                                </td>
                            </tr>
							<?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
	</row>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php $this->load->view('gudang/footer');