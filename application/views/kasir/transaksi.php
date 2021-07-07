<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?=$judul?></title>

	<!-- Custom fonts for this template-->
	<link href="<?=base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">

	<link href="<?=base_url()?>assets/vendorother/alertify/css/alertify.min.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/vendorother/alertify/css/themes/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?=base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">

	<link href="<?=base_url()?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<style>
		body {
			background: #f8f9fc;
		}
	</style>

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-dark bg-dark text-white topbar static-top">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Search -->
					<a href="<?=base_url()?>kasir/penjualan" class="btn btn-secondary mr-2 btn-sm btn-icon-split"><span
							class="icon text-white-600">
							<i class="fas fa-arrow-left"></i>
						</span><span class="text">Dashboard</span></a>
					<button class="btn btn-danger btn-sm btn-icon-split" data-toggle="modal" data-target="#modalReturnBarang"><span
							class="icon text-white-600">
							<i class="fas fa-trash"></i>
						</span><span class="text">Return Barang</span></button>
					<div id="no-struk" class="ml-3 text-white p-1 font-weight-bold">
						No. Struk <?=$no_struk ? $no_struk->id_penjualan+1 : $no_struk ?>
					</div>
					<div id="time" class="ml-auto text-white p-1 px-3 font-weight-bold">
					</div>
					<!-- Topbar Navbar -->
					<ul class="navbar-nav">
						<!-- Nav Item - Search Dropdown (Visible Only XS) -->
						<li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
								aria-labelledby="searchDropdown">
								<form class="form-inline mr-auto w-100 navbar-search">
									<div class="input-group">
										<input type="text" class="form-control bg-light border-0 small"
											placeholder="Search for..." aria-label="Search"
											aria-describedby="basic-addon2">
										<div class="input-group-append">
											<button class="btn btn-primary" type="button">
												<i class="fas fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</li>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span
									class="mr-2 d-none d-lg-inline text-white font-weight-bold small"><?=$this->session->userdata('login_session')['name'];?></span>
								<img class="img-profile rounded-circle" src="<?=base_url()?>assets/img/user.png">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
								aria-labelledby="userDropdown">
								<a class="dropdown-item" href="<?=base_url()?>kasir/profile">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Profile
								</a>
						
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->
				<!-- start content -->
				<div class="container-fluid mt-4">
					<form action="<?=base_url()?>kasir/bayar" method="post" onsubmit="return validasiBayar()" id="form-body-detail">
						<div id="div-hidden-input">
						</div>
						<!-- wrapper -->
						<div class="row">
							<div class="col-xl-9 col-lg-8">
								<div class="row">
									<!-- container cari barang -->
									<div class="col">
										<div class="card shadow mb-4 border-left-primary">
											<div class="card-body">
												<div class="d-flex justify-content-between">
													<h6>Subtotal</h6>
													<h6 class="text-primary" id="sub-total">Rp. 0</h6>
												</div>
												<div class="d-flex justify-content-between">
													<h6>Voucher</h6>
													<h6 class="text-primary" >-<span id="voucher"> Rp. 0</span></h6>
												</div>
												<hr class="bg-primary">
												<div class="grand-total d-flex justify-content-between mb-1">
													<h6>Grand Total</h6>
													<h4 class="text-primary font-weight-bold" id="grand-total">Rp. 0</h4>
												</div>
												<div class="kembalian d-flex justify-content-between">
													<h6 class="mb-0">Kembalian</h6>
													<h6 class="text-primary mb-0" id="kembalian">Rp. 0</h6>
												</div>

											</div>
										</div>
									</div>
									<div class="col-3">

										<div class="card shadow mb-4">
											<div class="card-header py-3">
												<h6 class="m-0 font-weight-bold text-primary">Input Barang</h6>
											</div>

											<div class="card-body">
												<div class="input-group">
													<input type="text" name="kode_barang" id="kode_barang"
														class="form-control typeahead" placeholder="Kode Barang"
														data-provide="typeahead" autocomplete="off" autofocus>
													<div class="input-group-append">
														<button class="btn btn-outline-primary" id="btn-barang" type="button"
															onclick="checkBarang()"><i
																class="fas fa-fw fa-search"></i></button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-3">
										<div class="card shadow mb-4">
											<div class="card-header py-3">
												<h6 class="m-0 font-weight-bold text-primary">Input Anggota</h6>
											</div>
											<div class="card-body">
												<div class="input-group">
													<input type="text" class="form-control" id="kode_anggota"
														name="kode_anggota" autocomplete="off"
														placeholder="Kode Anggota">
													<div class="input-group-append">
														<button class="btn btn-outline-primary" type="button"
															onclick="cariAnggota()"><i
																class="fas fa-fw fa-plus"></i></button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- end container cari barang -->

								</div>



								<!-- start daftar barang penjualan -->

								<table class="table table-sm shadow bg-white" id="table-detail-barang" width="100%"
									cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
									<thead class="thead-light">
										<tr>
											<th>Item</th>
											<th>Harga</th>
											<th style="width: 20%">Qty</th>
											<th>Total</th>
											<th></th>
										</tr>
									</thead>
									<tbody id="detail-barang">
									</tbody>
									<tfoot>
										<tr>
											<th colspan="3">Total</th>
											<th id="harga-total-barang">Rp. 0</th>
											<th></th>
										</tr>
									</tfoot>
								</table>

								<!-- end daftar barang penjualan -->
							</div>




							<!-- container input anggota -->
							<div class="col-xl-3 col-lg-4">


								<div class="card shadow mb-2">
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
										<div class="form-group row">
											<label for="inputPassword" class="col-4 col-form-label">Voucher</label>
											<div class="col-8">
												<div class="input-group">
													<input type="text" class="form-control" id="id-voucher"
														placeholder="Voucher">
													<div class="input-group-append">
														<button class="btn btn-outline-secondary" type="button"
															onclick="checkVoucher()"><i
																class="fas fa-fw fa-plus"></i></button>
													</div>
												</div>

											</div>
										</div>
										<div id="input-voucher" class="voucher mb-1 d-flex flex-wrap text-white">
										</div>
										<hr>
										<div
											class="total d-flex justify-content-between mb-3 text-primary font-weight-bold text-bold">
											<select name="jenis_pembayaran" id="jenis_pembayaran"
												class="form-control custom-select">
												<option value="Cash">Cash</option>
												<option value="Kredit">Kredit</option>
											</select>
										</div>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text">Rp</span>
											</div>
											<input type="text" class="form-control" onchange="printKembalian()"
												value="0" onkeyup="printKembalian()" id="nominal_uang"
												name="nominal_uang" placeholder="Nominal Uang">
										</div>
										<input type="submit" id="btn-bayar" value="Bayar (F10)" class="btn font-weight-bold btn-success btn-block">

									</div>

								</div>

							</div>
							<!-- end container input anggota -->

						</div>
					</form>
					<!-- end wrapper -->
				</div>

				<!-- Modal -->
				<div class="modal fade" id="modalBerhasil" tabindex="-1" aria-labelledby="exampleModalLabel"
					aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Notification</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body" id="modalNotification">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary">Save changes</button>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade" id="modalReturnBarang" tabindex="-1" aria-labelledby="exampleModalLabel"
					aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Return Barang</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body" id="modalNotification">
							<label for="no_struk">No. Struk</label>
							<input type="text" id="no_struk" placeholder="No Struk" class="form-control">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="button" onclick="redirectReturnBarang()" class="btn btn-primary">Go</button>
							</div>
						</div>
					</div>
				</div>

				<script>
					const baseUrl = '<?=base_url()?>';

					var timeDisplay = document.getElementById("time");

					function redirectReturnBarang() {
						const noStruk = $('#no_struk').val();
						window.location.href = baseUrl+'kasir/detail_penjualan/'+noStruk;
					}

					function validasiBayar() {
						const grandTotal = document.getElementById('grand-total').innerText;
						const nominalUang = document.getElementById('nominal_uang').value;
				
						const subTotal = document.getElementById('sub-total').innerText;
						var nilaiGrandTotal = parseInt(grandTotal.replace(/\D/g, ""));
						var nilaiNominalUang = parseInt(nominalUang.replace(/\D/g, ''), 10);
						var nilaiSubTotal = parseInt(subTotal.replace(/\D/g, ""));
						const jenisPembayaran = $('#jenis_pembayaran').val();
						if(jenisPembayaran == 'Cash') {
							if(nilaiNominalUang < nilaiGrandTotal) {
								alertify.error('Uang Kurang');
							return false;
						}

						if(nilaiSubTotal == 0) {
							alertify.error('Silahkan input barang terlebih dahulu');
							return false;
						}
						}
						
					}

					function refreshTime() {
						var dateString = moment().format('MMMM Do YYYY, h:mm:ss a');
						timeDisplay.innerHTML = dateString;
					}

					setInterval(refreshTime, 1000);

					function cariAnggota() {
						const kodeAnggota = document.getElementById('kode_anggota').value;
						const formBody = document.getElementById("form-body-detail");
						const input = document.createElement('INPUT');

						$.ajax({
							type: "POST",
							url: baseUrl + "kasir/anggota_kode/" + kodeAnggota,
							dataType: "JSON",
							success: function (response) {
								// get data
								if (response == null) {
									alertify.error('Data anggota tidak ditemukan')
								} else {
									document.getElementById('detail-kode-anggota').innerHTML =
										'<input type="hidden" name="kode_anggota" value="' + response.kode_anggota +
										'" />' + response.kode_anggota;
									document.getElementById('detail-nama-anggota').innerHTML = response.nama;
								}
							}

						});
					}

					function checkBarang() {
						const kodeBarang = $('#kode_barang').val();
						$.ajax({
							type: "POST",
							url: baseUrl + "kasir/barang_kode/" + kodeBarang,
							dataType: "JSON",
							success: function (response) {
								var findBarang = $('#detail-barang').find('tr[data-id-barang="' + response.id_barang + '"]');
								if (findBarang.length >
									0) {
									var inputVal = findBarang.find("td:eq(2)").children();
									var addValue = parseInt(inputVal.val())+1;
									inputVal.val(addValue);
									ubahJumlah(inputVal.get(0));
								} else {
									if (response.kode_barang == null) {
										alertify.error('Kode Barang tidak diketahui');
									} else {
										functionTambahBarang();
									}
								}
								$('#kode_barang').val('');
							}
						});
						
					}


					function checkVoucher() {
						const kodeVoucher = $('#id-voucher').val();
						const inputVoucher = $('#input-voucher').children();
						// if () {
							if(inputVoucher.find('input[value="'+kodeVoucher+'"]').length > 0) {
								alertify.error('Silahkan input voucher lain')
							} else {
								tambahVoucher();
							}
							$('#id-voucher').val('');
							
						// }
					}

					function tambahVoucher() {
						const formatter = new Intl.NumberFormat(['ban', 'id']);
						const kodeVoucher = $('#id-voucher').val();
						const inputVoucher = $('#input-voucher');
						const voucher = $('#voucher');

						$.ajax({
							type: "POST",
							url: baseUrl + "kasir/voucher_id/" + kodeVoucher,
							dataType: "JSON",
							success: function (response) {
								if (response == null) {
									alertify.error('Data Voucher tidak ditemukan')
								} else {
									if (response.status == 0) {
										inputVoucher.append(
											'<span style="cursor:pointer" class="bg-primary m-1 p-1" onclick="hapusVoucher(this)"><input type="hidden" name="id_voucher[]" value="' +
											kodeVoucher + '">#' + kodeVoucher + '</input></span>');
										const totalVoucher = inputVoucher.children().length * 100000;
										voucher.html('Rp. ' + formatter.format(totalVoucher));
										printGrandTotal();
									} else {
										alertify.error('Voucher Sudah Digunakan')
									}

								}
							}
						});
					}

					function hapusVoucher(nilai) {
						$(nilai).closest("span").remove();
						const formatter = new Intl.NumberFormat(['ban', 'id']);
						const inputVoucher = $('#input-voucher');
						const voucher = $('#voucher');
						const totalVoucher = inputVoucher.children().length * 100000;
						voucher.html('Rp. ' + formatter.format(totalVoucher));
						printGrandTotal();
					}

					function functionTambahBarang() {
						const kodeBarang = $('#kode_barang').val();
						const formatter = new Intl.NumberFormat(['ban', 'id']);

						$.ajax({
							type: "POST",
							url: baseUrl + "kasir/barang_kode/" + kodeBarang,
							dataType: "JSON",
							success: function (response) {
								// get data
								addHiddenInput(response.id_barang);
								const tbodyEl = document.getElementById('detail-barang');
								const trEl = document.createElement("TR");
								trEl.setAttribute('data-id-barang', response.id_barang);
								tbodyEl.appendChild(trEl);

								for (i = 0; i < 5; i++) {
									if (i == 0) {
										var td = document.createElement("TD");
										td.innerHTML = response.nama_barang;
										trEl.appendChild(td);

									} else if (i == 1) {
										var td = document.createElement("TD");
										td.innerHTML = 'Rp. ' + formatter.format(response.harga_jual);
										trEl.appendChild(td);
									} else if (i == 2) {
										var td = document.createElement("TD");
										td.innerHTML =
											'<input type="number" min="0" class="form-control form-control-sm" name="jumlah_barang[]" onchange="ubahJumlah(this)" onkeyup="ubahJumlah(this)" value="1">';
										trEl.appendChild(td);
									} else if (i == 3) {
										var td = document.createElement("TD");
										td.innerHTML = 'Rp. ' + formatter.format(response.harga_jual);
										trEl.appendChild(td);
									} else if (i == 4) {
										var td = document.createElement("TD");
										td.innerHTML =
											'<button type="button" onclick="hapusBarang(this)" data-id="' + response
											.id_barang +
											'" class="btn btn-danger btn-sm btn-circle"><i class="fas fa-trash"></i></button>';
										trEl.appendChild(td);
									}
								}
								printHargaGlobal();
							}
						});
					}


					function addHiddenInput(idBarang) {

						const divHidden = document.getElementById("div-hidden-input");
						const input = document.createElement('INPUT');
						input.setAttribute('type', 'hidden');
						input.setAttribute('name', 'id_barang[]');
						input.setAttribute('value', idBarang);
						divHidden.appendChild(input);
					}


					function ubahJumlah(value) {
						const formatter = new Intl.NumberFormat(['ban', 'id']);
						const row = value.parentElement.parentElement;
						const valQty = row.cells[2].children[0].value;
						const idBarang = row.getAttribute("data-id-barang");
						$.ajax({
							type: "POST",
							url: baseUrl + "kasir/barang_id/" + idBarang,
							dataType: "JSON",
							success: function (response) {
								// get data
								const hargaBarang = response.harga_jual;
								row.cells[3].innerHTML = 'Rp. ' + formatter.format(hargaBarang * valQty);
								printHargaGlobal();
							}
						});

					}


					function printHargaGlobal() {
						const formatter = new Intl.NumberFormat(['ban', 'id']);
						const hargaTotalBarang = document.getElementById('harga-total-barang');
						const subTotal = document.getElementById('sub-total');
						var resHargaTotal = 0;
						const tRow = document.getElementById('detail-barang').children;
						for (i = 0; i < tRow.length; i++) {
							var totalHarga = tRow[i].children[3].innerText;
							var res = parseInt(totalHarga.replace(/\D/g, ""));
							resHargaTotal += res;
						}
						subTotal.innerHTML = 'Rp. ' + formatter.format(resHargaTotal);
						hargaTotalBarang.innerHTML = 'Rp. ' + formatter.format(resHargaTotal);
						printGrandTotal()
						printKembalian()
					}

					function printKembalian() {
						const formatter = new Intl.NumberFormat(['ban', 'id']);
						const nominalUang = document.getElementById('nominal_uang').value;
						const kembalian = document.getElementById('kembalian');
						const grandTotal = document.getElementById('grand-total').innerText;
						var nilaiNominalUang = parseInt(nominalUang.replace(/\D/g, ""));
						var nilaiGrandTotal = parseInt(grandTotal.replace(/\D/g, ""));
						var nilaiKembalian = nilaiNominalUang - nilaiGrandTotal;
						if(nilaiKembalian < 0) {
							nilaiKembalian = 0;
						}
						kembalian.innerHTML = 'Rp. ' + formatter.format(nilaiKembalian);

					}

					function printGrandTotal() {
						const formatter = new Intl.NumberFormat(['ban', 'id']);
						const subTotal = document.getElementById('sub-total').innerText;
						const voucher = document.getElementById('voucher').innerText;
						const grandTotal = document.getElementById('grand-total');
						var nilaiSubTotal = parseInt(subTotal.replace(/\D/g, ""));
						var nilaiVoucher = parseInt(voucher.replace(/\D/g, ""));
						var nilaiGrandTotal = nilaiSubTotal - nilaiVoucher;
						if(nilaiGrandTotal < 0) {
							nilaiGrandTotal = 0;
						}
						grandTotal.innerHTML = 'Rp. ' + formatter.format(nilaiGrandTotal);
					}

					function hapusBarang(data) {
						$(data).closest("tr").remove();
						$('#div-hidden-input').find('input').each(function () {
							if ($(data).data('id') == $(this).val()) {
								$(this).remove();
							}
						});
						printHargaGlobal();
					}

				</script>

				<!-- end content -->
				<?php $this->load->view('kasir/footer');?>
