<?php $this->load->view('header'); ?>

<!-- Outer Row -->
<div class="row justify-content-center mt-3">

	<div class="col-xl-10 col-lg-12 col-md-9">

		<div class="card o-hidden border-0 shadow-lg">
			<div class="card-body p-lg-5 p-0">
				<div class="p-4">
					<div class="text-center mb-4">
						<h1 class="h4 text-gray-900">Koperasi Kopassus</h1>
						<span class="text-muted">Buat Akun</span>
					</div>
					<?= $this->session->flashdata('pesan'); ?>
					<?= form_open(base_url().'home/aksi_register', ['class' => 'user']); ?>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<input autofocus="autofocus" autocomplete="off"
									value="<?= set_value('kode_anggota'); ?>" type="text" name="kode_anggota"
									class="form-control form-control-user" placeholder="Kode Anggota">
								<?= form_error('kode_anggota', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
                        <div class="col">
                        <div class="form-group">
								<input autofocus="autofocus" autocomplete="off"
									value="<?= set_value('email'); ?>" type="text" name="email"
									class="form-control form-control-user" placeholder="Email">
								<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
							</div>
                        </div>

					</div>

					<div class="row">
						<div class="col">
							<div class="form-group">
								<input type="password" name="password" class="form-control form-control-user"
									placeholder="Password">
								<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<input type="password" name="password2" class="form-control form-control-user"
									placeholder="Konfirmasi Password">
								<?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<input value="<?= set_value('nama'); ?>" type="text" name="nama"
							class="form-control form-control-user" placeholder="Nama">
						<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<input value="<?= set_value('satuan'); ?>" type="text" name="satuan"
									class="form-control form-control-user" placeholder="Satuan">
								<?= form_error('satuan', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<input value="<?= set_value('jabatan'); ?>" type="text" name="jabatan"
									class="form-control form-control-user" placeholder="Jabatan">
								<?= form_error('jabatan', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-user btn-block">
						Daftar
					</button>
					<div class="text-center mt-4">
						<a class="small" href="<?= base_url('home') ?>">Sudah punya akun? Login</a>
					</div>
					<?= form_close(); ?>

				</div>
			</div>
		</div>

	</div>
</div>

<?php $this->load->view('footer'); ?>
