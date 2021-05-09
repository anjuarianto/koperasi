<!-- header -->
<?php $this->load->view('gudang/header'); ?>
<!-- end header -->
<div class="container-fluid mb-4 p-3 shadow bg-white">
	<h1 class="h3 text-primary"><?=$judul;?></h1>
</div>

<div class="card shadow mb-4 border-bottom-primary">
	<div class="card-header py-3 bg-primary">
		<h6 class="m-0 font-weight-bold text-white">Tabel Barang</h6>
	</div>
	<div class="card-body">
	<h6 class="mb-2 font-weight-bold text-primary">Filter Tanggal</h6>
	<table border="0" cellspacing="5" cellpadding="5">
        <tbody><tr>
            <td>Tanggal Awal:</td>
            <td><input type="text" id="min" name="min"></td>
        </tr>
        <tr>
            <td>Tanggal Akhir:</td>
            <td><input type="text" id="max" name="max"></td>
        </tr>
    </tbody></table>
		<div class="table-responsive">
			<button class="btn btn-primary btn-sm mt-2 mb-4 btn-icon-split" data-toggle="modal"
				data-target="#modalInputPembelian"><span class="icon text-white-50"><i class="fas fa-plus"></i></span>
				<span class="text">Tambah Barang</span></button>
			<table class="table table-striped table-hover dataTable" id="dataTable" width="100%" cellspacing="0"
				role="grid" aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
						<th></th>
						<th>Tanggal Pembelian</th>
						<th>No Faktur</th>
						<th>PPN</th>
						<th>Jenis Pembayaran</th>
						<th>Total Harga Pembelian</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pembelian as $p) : ?>
					<tr data-info="beli" data-id="<?=$p->id_pembelian?>">
						<td></td>
						<td><?=date('d-m-Y', strtotime($p->tgl_pembelian))?></td>
						<td><?=$p->no_faktur?></td>
						<td><?=$p->ppn?> %</td>
						<td><?=$p->jenis_pembayaran?></td>
						<td>Rp. <?=number_format($p->total_harga_pembelian, 2, ',', '.')?></td>
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
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Input Pembelian</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="aksi_tambah_pembelian" method="post" id="form-body-detail">
					<div class="row">
						<div id="div-hidden-input">
						</div>
						<div class="form-group col">
							<label for="tanggal_pembelian">Tanggal Masuk</label>
							<input type="date" name="tanggal_pembelian" id="tanggal_pembelian"
								placeholder="Tanggal Masuk" class="form-control form-control-sm">
						</div>
						<div class="form-group col">
							<label for="no_faktur">No. Faktur</label>
							<div class="input-group">
								<input type="text" name="no_faktur" id="no_faktur" placeholder="Nomor Faktur"
									class="form-control form-control-sm">
							</div>
						</div>
						<div class="form-group col-2">
							<label for="ppn">PPN</label>
							<div class="input-group input-group-sm ">
								<input type="text" name="ppn" id="ppn" placeholder="PPN"
									class="form-control form-control-sm">
								<div class="input-group-append">
									<div class="input-group-text">%</div>
								</div>
							</div>
						</div>
						<div class="form-group col">
							<label for="jenis_pembayaran">Jenis Pembayaran</label>
							<select class="form-control form-control-sm" name="jenis_pembayaran" id="jenis_pembayaran"
								placeholder="Tanggal Masuk">
								<option value="Cash">Cash</option>
								<option value="Kredit">Kredit</option>
							</select>
						</div>
					</div>



					<!-- Input Setelah Ada -->
					<div class="row">
						<div class="input-group input-group-sm col-3">
							<input type="text" name="input_barang" id="input_barang"
								placeholder="Kode Barang/Nama Barang" style="z-index:1000"class="form-control typehead" data-provide="typehead" autofocus autocomplete="off">
							<div class="input-group-append">
								<button type="button" class="btn btn-success" id="btn-input-barang" onclick="checkBarang()"><i
										class="fas fa-plus"></i></button>
							</div>
						</div>
						
						<div class="col">

						</div>
					</div>
					<div class="mt-3">
						<h5 class="text-center mb-3">Daftar Detail Barang</h5>
						<div id="result">
							<table class="table table-striped table-sm table-hover dataTable">
								<thead class="thead-dark">
									<tr class="bg-info">
										<th style="width:45%">Nama Barang</th>
										<th style="width:15%">Tanggal Expired</th>
										<th style="width:10%">Qty</th>
										<th style="width:10%">Discount</th>
										<th style="width:15%">Harga</th>
										<th style="width: 5%;"></th>
									</tr>
								</thead>
								<tbody id="detail-barang">
								</tbody>
								<tfoot>
									<tr class="bg-dark text-white">
										<th colspan="4">Total</th>
										<th id="harga-total-barang" colspan="2"></th>
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


<script>
	const baseUrl = "<?=base_url()?>";

	function checkBarang() {
		const kodeBarang = $('#input_barang').val();
		$.ajax({
			type: "POST",
			url: baseUrl + "gudang/barang_kode/" + kodeBarang,
			dataType: "JSON",
			success: function (response) {
				if ($('#detail-barang').find('tr[data-id-barang="' + response.id_barang + '"]').length > 0) {
					alert('Silahkan input barang Lain');
				} else {
					if (response.kode_barang == null) {
						alert('Kode Barang tidak diketahui');
					} else {
						functionTambahBarang();
					}
				}
			}
		});
	}

	function functionTambahBarang() {
		const kodeBarang = $('#input_barang').val();
		const formatter = new Intl.NumberFormat(['ban', 'id']);


		$.ajax({
			type: "POST",
			url: baseUrl + "gudang/barang_kode/" + kodeBarang,
			dataType: "JSON",
			success: function (response) {
				// get data
				addHiddenInput(response.id_barang);
				const tbodyEl = document.getElementById('detail-barang');
				const trEl = document.createElement("TR");
				trEl.setAttribute('data-id-barang', response.id_barang);
				tbodyEl.appendChild(trEl);

				for (i = 0; i < 6; i++) {
					if (i == 0) {
						var td = document.createElement("TD");
						td.innerHTML = response.nama_barang;
						trEl.appendChild(td);

					} else if (i == 1) {
						var td = document.createElement("TD");
						td.innerHTML =
							'<input type="date" class="form-control form-control-sm" name="tanggal_expired[]">';
						trEl.appendChild(td);
					} else if (i == 2) {
						var td = document.createElement("TD");
						td.innerHTML =
							'<input type="number" class="form-control form-control-sm" min="0" name="jumlah_barang[]" onchange="ubahJumlah(this)" onkeyup="ubahJumlah(this)" value="1">';
						trEl.appendChild(td);
					} else if (i == 3) {
						var td = document.createElement("TD");
						td.innerHTML =
							'<div class="input-group input-group-sm"><input type="number" min="0" max="100" class="form-control form-control-sm" name="discount[]" onchange="ubahDiscount(this)" onkeyup="ubahDiscount(this)"><div class="input-group-append"><div class="input-group-text">%</div></div>';
						trEl.appendChild(td);
					} else if (i == 4) {
						var td = document.createElement("TD");
						td.innerHTML = 'Rp. ' + formatter.format(response.harga_jual);
						trEl.appendChild(td);
					} else if (i == 5) {
						var td = document.createElement("TD");
						td.innerHTML =
							'<button type="button" onclick="hapusBarang(this)" data-id="' + response
							.id_barang +
							'" class="btn btn-danger btn-sm btn-circle"><i class="fas fa-times"></i></button>';
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
		const valDisc = row.cells[3].children.item(0).children[0].value;
		const valQty = row.cells[2].children[0].value;
		const idBarang = row.getAttribute("data-id-barang");
		$.ajax({
			type: "POST",
			url: baseUrl + "gudang/barang_id/" + idBarang,
			dataType: "JSON",
			success: function (response) {
				// get data
				const hargaBarang = response.harga_beli;
				const totalDisc = (hargaBarang * valDisc * valQty) / 100;
				row.cells[4].innerHTML = 'Rp. ' + formatter.format((hargaBarang * valQty) - totalDisc);
				printHargaGlobal();
			}

		});
	}

	function ubahDiscount(val) {
		const formatter = new Intl.NumberFormat(['ban', 'id']);
		const row = val.parentElement.parentElement.parentElement;
		const valQty = row.cells[2].children[0].value;
		const valDisc = row.cells[3].children.item(0).children[0].value;
		console.log(valDisc)
		const idBarang = row.getAttribute("data-id-barang");
		$.ajax({
			type: "POST",
			url: baseUrl + "gudang/barang_id/" + idBarang,
			dataType: "JSON",
			success: function (response) {

				const hargaBarang = response.harga_jual;
				const totalDisc = (hargaBarang * valDisc * valQty) / 100;
				row.cells[4].innerHTML = 'Rp. ' + formatter.format((hargaBarang * valQty) - totalDisc);
				printHargaGlobal();
			}
		});
	}

	function printHargaGlobal() {
		const formatter = new Intl.NumberFormat(['ban', 'id']);
		const hargaTotalBarang = document.getElementById('harga-total-barang');
		var resHargaTotal = 0;
		const tRow = document.getElementById('detail-barang').children;
		for (i = 0; i < tRow.length; i++) {
			var totalHarga = tRow[i].children[4].innerText.replace(/\D/g, "");
			var res = parseInt(totalHarga.replace(/\D/g, ""));
			resHargaTotal += res;
		}
		hargaTotalBarang.innerHTML = 'Rp. ' + formatter.format(resHargaTotal);
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


<?php $this->load->view('gudang/footer');
