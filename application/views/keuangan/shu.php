<?php $this->load->view('keuangan/header');?>

<!-- datatable -->
<div class="card shadow mb-4">
	<div class="card-header bg-primary d-flex justify-content-between">
		<h6 class="my-auto font-weight-bold text-white">Tabel input SHU</h6>
    <div class="btn-group">
    <div class="form-group m-0">
      <select name="periode" class="form-control form-control-sm" id="periode">
        <option value="">Periode</option>
        <option value="2022">2022</option>
        <option value="2021">2021</option>
      </select>
    </div>
    <button class="btn btn-dark btn-sm ml-2 my-0 btn-icon-split" data-toggle="modal"
			data-target="#modalGenerate"><span class="icon text-white-50"><i class="fas fa-plus"></i></span>
			<span class="text">Generate</span></button>
      <button onclick="enableForm(this)" data-info="edit-shu" id="btn-edit-shu" type="button" class="btn btn-warning btn-sm ml-2 my-0 btn-icon-split"><span class="icon text-white-50"><i class="fas fa-file"></i></span>
			<span class="text">Edit</span></button>
      <button onclick="cancelShu()" style="display:none;" id="btn-cancel-shu" type="button" class="btn btn-danger btn-sm ml-2 my-0 btn-icon-split"><span class="icon text-white-50"><i class="fas fa-file"></i></span>
			<span class="text">Cancel</span></button>
      <button onclick="submitFormSHU()" id="btn-save-shu" disabled class="btn btn-success btn-sm ml-2 my-0 btn-icon-split"><span class="icon text-white-50"><i class="fas fa-save"></i></span>
			<span class="text">Simpan</span></button>
    
    </div>
    
	</div>
	<div class="card-body">
		<div class="table-responsive">
    <form id="form-update-shu" action="<?=base_url()?>keuangan/update_shu" method="post">
			<table class="table table-striped table-sm table-hover dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
          <th></th>
						<th>Kode Anggota</th>
						<th>Nama Anggota</th>
            <th>Periode</th>
            <th>SHU</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($anggota as $a) : ?>
					<tr>
          <td></td>
						<td><?=$a->kode_anggota;?></td>
						<td><?=$a->nama;?></td>
            <td><?=$a->periode?></td>
            <td>
            <?php if($a->nilai_shu == null) {
              echo '<input type="hidden" name="id_user[]" value="'.$a->id_user.'"><input type="hidden" name="periode[]" value="'.$a->periode.'"><input type="text" name="nilai_shu[]" autocomplete="off" class="form-control form-control-sm input-shu" disabled>';
            }  else {
              echo 'Rp. '.number_format($a->nilai_shu,0,',','.');
              
            }
            ?></td>
            
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
      </form>
		</div>
	</div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalGenerate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content border-bottom-primary">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Generate Periode</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form method="post" action="<?=base_url()?>keuangan/generate_periode">
      <label for="input_periode">Periode</label>
      <input type="text" class="form-control" id="input_periode" name="input_periode" placeholder="Periode">
      
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

</script>
<?php $this->load->view('keuangan/footer');?>