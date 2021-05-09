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
<!-- Bootstrap core JavaScript-->
<script src="<?=base_url()?>assets/vendor/jquery/jquery.js"></script>
<!-- Bootstrap core JavaScript-->
<script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- User custom Javascript -->
<script src="<?=base_url()?>assets/gudang.js"></script>

<!-- Typehead -->
<script src="<?=base_url()?>assets/vendorother/typeahead/typeahead.js"></script>
<!-- Page level plugins -->
<script src="<?=base_url()?>assets/vendorother/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/vendorother/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/vendorother/datatables/buttons/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.0.3/js/dataTables.dateTime.min.js"></script>
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
	$(document).ready(function () {
		$('#dataTable').DataTable();
		$('#modalInputSupplier').modal('show');
		$('#kode_barang').typeahead({

			source: function (query, process) {
				states = [];
				map = {};
				hasil = [];
				data = [];
				console.log('test')
				$.getJSON('<?=base_url()?>kasir/barang_all', function (barang) {
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

		$('#kode_anggota').typeahead({

			source: function (query, process) {
				states = [];
				map = {};
				hasil = [];
				data = [];
				console.log('test')
				$.getJSON('<?=base_url()?>kasir/anggota_all', function (anggota) {
					$.each(anggota, function (key, val) {
						data.push(val);
					});
					$.each(data, function (i, anggota) {
						const hasil = anggota.nama + ' | ' + anggota.kode_anggota;
						map[hasil] = anggota;
						states.push(hasil);
					});
					process(states);
				});
			},
			updater: function (item) {
				selectedItem = map[item].kode_anggota;
				return selectedItem;
			}
		});
	});

</script>
</body>

</html>
