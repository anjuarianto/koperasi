<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Pembelian</title>
	<link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
</head>

<body>
	<div class="container">
		<h1 class="text-center m-4">Daftar Pembelian</h1>
		<button class="btn btn-primary mt-2 mb-4" data-toggle="modal" data-target="#modalInputPembelian"><strong>+
				Tambah
				Pembelian</strong></button>
		<table class="table table-bordered" id="example" style="width:100%">
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
					<form action="aksi_tambah_pembelian" method="post" onsubmit="test()" id="formPembelian">
						<div class="form-group">
							<label for="tanggal_pembelian">Tanggal Masuk</label>
							<input type="date" class="form-control" name="tanggal_pembelian" id="tanggal_pembelian"
								placeholder="Tanggal Masuk" class="form-control"
								value="<?=set_value('tanggal_pembelian')?>">
							<span style="font-size: 10px; color: red"><?=form_error('tanggal_pembelian')?></span>
						</div>
                        <div class="detail-supplier">
                            <h5 class="text-center">Detail Supplier</h5>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="nama_supplier">Nama Supplier</label>
                                    <input type="text" class="form-control" name="nama_supplier" id="nama_supplier"
                                        placeholder="Nama Supplier" >
                                </div>
                                <div class="form-group col">
                                    <label for="alamat_supplier">Alamat Supplier</label>
                                    <textarea class="form-control" id="alamat_supplier" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="detail-barang">
                            <h5 class="text-center">Detail Barang</h5>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" class="form-control form-control-sm" name="nama_barang" id="nama_barang"
                                        placeholder="Nama Barang">
                                </div>
                                <div class="form-group col">
                                    <label for="kode_barang">Kode Barang</label>
                                    <input type="text" class="form-control form-control-sm" id="kode_barang" name="kode_barang" placeholder="Kode Barang">
                                </div>
                                <div class="form-group col">
                                    <label for="tanggal_expired">Tanggal Expired</label>
                                    <input type="date" class="form-control form-control-sm" id="tanggal_expired" name="tanggal_expired" placeholder="Tanggal Expired">
                                </div>
                                <div class="form-group col">
                                    <label for="jumlah_barang">Jumlah Barang</label>
                                    <input type="text" class="form-control form-control-sm" id="jumlah_barang" name="jumlah_barang" placeholder="Jumlah Barang">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="harga_beli">Harga Beli</label>
                                    <input type="text" class="form-control form-control-sm" name="harga_beli" id="harga_beli"
                                        placeholder="Harga Beli">
                                </div>
                                <div class="form-group col">
                                    <label for="harga_jual">Harga Jual</label>
                                    <input type="text" class="form-control form-control-sm" name="harga_jual" id="harga_jual"
                                        placeholder="Harga Jual">
                                </div>
                                <div class="form-group col">
                                    <label for="diskon">Diskon</label>
                                    <input type="text" class="form-control form-control-sm" name="diskon" id="diskon"
                                        placeholder="Diskon">
                                </div>
                            </div>
                            <button type="button" id="btn-tambah" class="btn btn-secondary btn-sm" onclick="functionTambahBarang()">Tambah</button>
                        </div>
                        
                        
						
						<div class="mt-3">
							<h5 class="text-center mb-3">Daftar Detail Pembelian</h5>
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
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
		integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
		integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
		integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
	</script>
	<!-- DataTable -->
	<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
	<script>
	let inputPost = [];
	let idDetail = 0;
		
		function test() {
			const formBody = document.getElementById("formPembelian");
			let hargaGlobal = 0;
			inputPost.forEach(e => {
				formBody.innerHTML += `
                <input type="hidden" name="id_barang[]" value="${e.idBarang}" />
                <input type="hidden" name="jumlah_barang[]" value="${e.jumlahBarang}" />
                <input type="hidden" name="harga_total_barang[]" value="${e.totalHarga}" />

            `;
			})
			inputPost.forEach(element => {
				hargaGlobal += element.totalHarga
			})
			formBody.innerHTML += `
                <input type="hidden" name="total_harga_pembelian" value="${hargaGlobal}" />
            `;
		}
		function printHargaGlobal() {
			const formatter = new Intl.NumberFormat(['ban', 'id']);
			let hargaGlobal = 0;
			inputPost.forEach(element => {
				hargaGlobal += element.totalHarga
			})
			
			document.getElementById("total-harga").innerHTML = "Rp " + formatter.format(hargaGlobal);
		}
        function functionTambahBarang() {
            const namaBarang = document.getElementById("nama_barang").value;
            const jumlahBarang = document.getElementById("jumlah_barang").value;
            const tbodyEl = document.getElementById('table-body-detail');
            const hargaBarang = document.getElementById("harga_beli").value;
            
            const totalHarga = parseInt(jumlahBarang)*parseInt(hargaBarang);
            const formatter = new Intl.NumberFormat(['ban', 'id']);
            console.log(namaBarang+jumlahBarang+hargaBarang+totalHarga)

            tbodyEl.innerHTML += `
                <tr>
                    <td>${namaBarang}</td>
                    <td>Rp ${formatter.format(parseInt(hargaBarang))}</td>
                    <td>${jumlahBarang}</td>
                    <td>Rp ${formatter.format(parseInt(totalHarga))}</td>
					<td><button class="btn btn-outline-light btn-danger btn-sm" onclick="functionHapus(this, ${idDetail})" type="button">x</button></td>
                </tr>
            `;
			
            clearField()
        }

		function functionHapus(e, id) {
			e.closest("tr").remove()
			var indexHapus = inputPost.indexOf(inputPost.find(data => data.idDetail == id));
			inputPost.splice(indexHapus, 1)
			
			printHargaGlobal();
		}

        function clearField() {
            document.getElementById("nama_supplier").value = "";
            document.getElementById("alamat_supplier").value = "";
            document.getElementById("nama_barang").value = "";
            document.getElementById("kode_barang").value = "";
            document.getElementById("tanggal_expired").value = "";
            document.getElementById("jumlah_barang").value = "";
            document.getElementById("harga_beli").value = "";
            document.getElementById("harga_jual").value = "";
            document.getElementById("diskon").value = "";
        }
		

		$(document).ready(function () {
			$('#example').DataTable(); 
			<?=$script?>

		});

	</script>
</body>

</html>
