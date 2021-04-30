<?php $this->load->view('keuangan/header');?>

<div class="container-fluid mb-4 p-3 shadow bg-white">
	<h1 class="h3 text-primary"><?=$judul;?></h1>
</div>
<!-- datatable -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Tabel input SHU</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
						<th>Kode Anggota</th>
						<th>Nama Anggota</th>
                        <th>Periode</th>
                        <th>SHU</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($anggota as $a) : ?>
					<tr>
						<td><?=$a->kode_anggota;?></td>
						<td><?=$a->nama;?></td>
                        <td><?=$a->periode?></td>
                        <td><?= $a->nilai_shu == null ? '<button type="button" data-id-anggota="'.$a->id_user.'" data-nama-anggota="'.$a->nama.'" class="btn btn-primary" data-toggle="modal" onclick="inputSHU(this)" data-target="#modalSHU">Input SHU</button>' : $a->nilai_shu ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalSHU" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input SHU</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form method="post" id="form-id">
      <label for="nilai_shu" id="nama-anggota"></label>
        <input type="text" class="form-control" id="nilai_shu" name="nilai_shu" placeholder="Input SHU">
      
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Submit"/>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
function inputSHU(input) {
    const idAnggota = input.getAttribute('data-id-anggota');
    const namaAnggota = input.getAttribute('data-nama-anggota');
    const formUrl = '<?=base_url()?>keuangan/input_shu/' + idAnggota;
    const formId = document.getElementById('form-id');
    document.getElementById('nama-anggota').innerHTML = namaAnggota;
   formId.setAttribute("action", formUrl);
}
</script>
<?php $this->load->view('keuangan/footer');?>