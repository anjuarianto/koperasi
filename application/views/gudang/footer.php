</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?=base_url()?>home/logout">Logout</a>
			</div>
		</div>
	</div>
</div>



<script src="<?=base_url()?>assets/vendor/jquery/jquery.js"></script>
<!-- Bootstrap core JavaScript-->
<script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- User custom Javascript -->
<script src="<?=base_url()?>assets/gudang.js"></script>

<!-- Typehead -->
<script src="<?=base_url()?>assets/vendorother/typeahead/typeahead.js"></script>
<script src="<?=base_url()?>assets/vendorother/alertify/alertify.js"></script>
<!-- Page level plugins -->
<script src="<?=base_url()?>assets/vendorother/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/vendorother/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/vendorother/datatables/buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>assets/vendorother/momentjs/moment.min.js"></script>
<script src="<?=base_url()?>assets/vendorother/datatables/dataTables.dateTime.min.js"></script>
<script src="<?=base_url()?>assets/vendorother/datatables/buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/vendorother/datatables/jszip/jszip.min.js"></script>
<script src="<?=base_url()?>assets/vendorother/datatables/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url()?>assets/vendorother/datatables/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url()?>assets/vendorother/datatables/buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url()?>assets/vendorother/datatables/buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url()?>assets/vendorother/datatables/buttons/js/buttons.colVis.min.js"></script>
<script src="<?=base_url()?>assets/vendorother/datatables/responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>assets/vendorother/datatables/responsive/js/responsive.bootstrap4.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?=base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?=base_url()?>assets/js/sb-admin-2.min.js"></script>
<script>
	const baseUrl = "<?=base_url()?>";
	$.fn.dataTable.ext.search.push(
		function (settings, data, dataIndex) {
			var min, max;
			var filterColumn;

			if ($('#filterColumn').length) {
				filterColumn = $('#filterColumn').val();
			} else {
				filterColumn = 1;
			}

			if (moment.utc($('#min').val(), 'DD-MM-YYYY').toDate() != "Invalid Date") {
				min = moment.utc($('#min').val(), 'DD-MM-YYYY').toDate();
			} else {
				min = null;
			}

			if (moment.utc($('#max').val(), 'DD-MM-YYYY').toDate() != "Invalid Date") {
				max = moment.utc($('#max').val(), 'DD-MM-YYYY').toDate();
			} else {
				max = null;
			}

			var date = moment.utc(data[filterColumn], 'DD-MM-YYYY');

			if (
				(min === null && max === null) ||
				(min === null && date <= max) ||
				(min <= date && max === null) ||
				(min <= date && date <= max)
			) {
				return true;
			}
			return false;
		}
	);

	$(document).ready(function () {
		$('#jenis_pembayaran').on('change', function () {
			if ($(this).val() == "Kredit") {
				$('#jatuh_tempo').show();
			} else if ($(this).val() == "Cash" || $(this).val() == "Konsiniasi") {
				$('#jatuh_tempo').hide();
			}
		});

		$('input[type=text], textarea').on('input', function () {
			this.value = this.value.toUpperCase();
		});

		$('#kategori').on('change', function () {
			$('#pilihan_kategori').html('');	
			if ($(this).val() == "all") {
				$('#container-pilihan').hide();

			} else if ($(this).val() == "rak") {
				$('#container-pilihan').show();
				// disini kasih request ajax
				$.ajax({
					type: "POST",
					url: baseUrl + "gudang/rak_all",
					dataType: "JSON",
					success: function (response) {
						// get data
						response.forEach(element => {
							$('#pilihan_kategori')
								.append('<option value="'+ element.id_rak +'">'+ element.nama_rak +'</option>')
						});
					}

				});
			} else if ($(this).val() == "supplier") {
				$('#container-pilihan').show();
				$.ajax({
					type: "POST",
					url: baseUrl + "gudang/supplier_all",
					dataType: "JSON",
					success: function (response) {
	
						response.forEach(element => {
							$('#pilihan_kategori')
								.append('<option value="'+ element.id_supplier +'">'+ element.nama_supplier +'</option>')
						});
					}
				});
			} else if ($(this).val() == "custom") {
				$('#container-pilihan').show();
			}
		});



		$('#input_barang').typeahead({
			source: function (query, process) {
				states = [];
				map = {};
				hasil = [];
				data = [];
				$.getJSON('<?=base_url()?>gudang/barang_all', function (barang) {
					$.each(barang, function (key, val) {
						data.push(val);
					});
					$.each(data, function (i, barang) {
						const hasil = barang.nama_barang + ' | ' + barang.kode_barang;
						map[hasil] = barang;
						states.push(hasil);
					});
					process(states);
				});
			},
			updater: function (item) {
				selectedItem = map[item].kode_barang;
				return selectedItem;
			}
		});

		$('#input_nama_supplier').typeahead({
			source: function (query, process) {
				states = [];
				map = {};
				hasil = [];
				data = [];
				$.getJSON('<?=base_url()?>gudang/supplier_all', function (supplier) {
					$.each(supplier, function (key, val) {
						data.push(val);
					});
					$.each(data, function (i, supplier) {
						const hasil = supplier.nama_supplier + ' | ' + supplier
							.id_supplier;
						map[hasil] = supplier;
						states.push(hasil);
					});
					process(states);
				});
			},
			updater: function (item) {
				selectedItem = map[item].id_supplier;
				return selectedItem;
			}
		});

		$('#modalInputPembelian').on('shown.bs.modal', function () {
			$('#input_barang').trigger('focus');
		});

		$('#modalInputBarang').on('shown.bs.modal', function () {
			$('#kode_barang').trigger('focus');
		});

		$('#form-body-detail').keydown(function (event) {
			if (event.keyCode == 13) {
				event.preventDefault();
				$('#btn-input-barang').click();
				return false;
			}
		});

		minDate = new DateTime($('#min'), {
			format: 'DD-MM-YYYY'
		});
		maxDate = new DateTime($('#max'), {
			format: 'DD-MM-YYYY'
		});
		tanggalExpired = new DateTime($('#tanggal_expired'));
		tanggalReturn = new DateTime($('#tanggal_return'));
		tanggalPembelian = new DateTime($('#tanggal_pembelian'));
		tanggalJatuhTempo = new DateTime($('#tanggal_jatuh_tempo'));
		$('#min, #max').on('change keyup', function () {
			table.draw();
		});
		$('#filterColumn').on('change', function () {
			table.draw();
		});

		// custom option datatable
		var table = $('#dataTable, #dataTable2').DataTable({
			// "scrollY": "30rem",
			"scrollCollapse": true,
			buttons: [{
				extend: 'collection',
				className: 'btn-icon-split btn-sm',
				text: '<span class="icon text-white-50"><i class="fas fa-file"></i></span><span class="text">Export</span>',
				buttons: [
					'copy',
					'excel',
					'csv',
					'pdf',
					'print'
				]
			}],
			dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
				"<'row'<'col-md-12'tr>>" +
				"<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
			lengthMenu: [
				[5, 10, 25, 50, 100, -1],
				[5, 10, 25, 50, 100, "All"]
			],
			columnDefs: [{

				targets: 0,
				orderable: false,
				searchable: false
			}],
			"order": [
				[1, 'asc']
			]
		});

		// order nomor automatic
		table.on('order.dt search.dt', function () {
			table.column(0, {
				search: 'applied',
				order: 'applied'
			}).nodes().each(function (cell, i) {
				cell.innerHTML = i + 1;
			});
		}).draw();


		// row clicked
		$('#dataTable tbody').on('click', 'tr', function () {
			const baseUrl = "<?=base_url()?>";
			tampilDataTable(this, baseUrl);
		});
		// edit-button clicked
		$('#btn-edit ').on('click', function () {
			enableForm(this);
		});
		$('#btn-edit-pembelian ').on('click', function () {
			enableForm(this);
		});
		table.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');
	});

</script>
</body>

</html>
