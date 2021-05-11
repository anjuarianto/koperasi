<?php $this->load->view('keuangan/header'); ?>


<div class="container-fluid mb-4 p-3 shadow bg-white">
	<h1 class="h3 text-primary"><?=$judul;?></h1>
</div>

<div class="card shadow mb-4">
	<div class="card-header bg-primary py-3">
		<h6 class="m-0 font-weight-bold text-white">Data Pinjaman</h6>
	</div>
	<div class="card-body">
            <div class="table-responsive">
			<button class="btn btn-primary btn-sm mt-2 mb-4 btn-icon-split" data-toggle="modal" data-target="#modalInputBarang"><span class="icon text-white-50"><i class="fas fa-plus"></i></span>
				<span class="text">Input Simpanan</span></button>
			<table class="table table-hover table-striped dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
				aria-describedby="dataTable_info" style="width: 100%;">
				<thead class="thead-light">
					<tr>
					<th></th>
						<th>Nama Anggota</th>
                        <th>Pokok</th>
						<th>Wajib</th>
						<th>Sukarela</th>
						<th>Saldo</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($simpanan_anggota as $s) : ?>
					<tr data-info="simpan" data-id="<?=$s->id_user;?>">
					<td></td>
						<td><?=$s->nama;?></td>
						<td>Rp. <?=number_format($s->pokok,0,',','.');?></td>
					
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
	</div>
</div>


<div class="modal fade" id="modalInputPinjaman" tabindex="-1" role="dialog" aria-labelledby="modalInputBarang"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Input Pinjaman</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?=base_url()?>keuangan/aksi_tambah_pinjam" method="post">
					<div class="form-group">
						<label for="kode_anggota">NRP</label>
                        <div class="input-group">
                        <input type="text" name="kode_anggota" placeholder="NRP" class="form-control typeahead" autocomplete="off" data-provide="typeahead" required>
                        <div class="input-group-append">
                        <button type="button" class="btn btn-outline-primary" id="btn-input-barang" onclick="checkBarang()"><i
										class="fas fa-search"></i></button>
                        </div>
                        </div>
						
					</div>
					<div class="form-group">
						<label for="nilai_pinjaman">Nilai Pinjaman</label>
						<input type="text" class="form-control" name="nilai_pinjaman" placeholder="Nilai Pinjaman"
							class="form-control">
					</div>
                    <div class="form-group">
						<label for="tanggal_pinjaman">Tanggal Pinjaman</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-calendar"></i></div>
							</div>
							<input type="text" name="harga_beli" placeholder="Tanggal Pinjaman" class="form-control" autocomplete="off" required>
						</div>
					</div>
					<div class="form-group">
						<label for="tanggal_jatuh_tempo">Tanggal Jatuh Tempo</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-calendar"></i></div>
							</div>
							<input type="text" name="tanggal_jatuh_tempo" placeholder="Tanggal Jatuh Tempo" class="form-control" autocomplete="off" required>
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




<?php $this->load->view('keuangan/footer'); ?>