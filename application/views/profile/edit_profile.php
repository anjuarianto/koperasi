<?php 
$level_user = $this->session->userdata('login_session')['level'];
if($level_user == 2) {
    $role = 'Gudang';
    $statusuri = 'gudang';
    $this->load->view('gudang/header'); 
} else if ($level_user == 3) {
    $role = 'Kasir';
    $statusuri = 'kasir';
    $this->load->view('kasir/header'); 
} else if ($level_user == 4 or $level_user == 6 or $level_user == 7) {
    $statusuri = 'keuangan';
    $role = 'Keuangan';
    $this->load->view('keuangan/header'); 
} else if ($level_user == 5) {
    $statusuri = 'anggota';
    $role = 'Anggota';
    $this->load->view('anggota/header'); 
}

?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Form Edit Profile User
                </h4>
            </div>
            <div class="card-body">
                <form action="<?=base_url().$statusuri?>/aksi_edit_profile/<?=$profile->id_user?>" method="post">
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="foto">Foto</label>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-3">
                                <img src="<?= base_url() ?>assets/img/user.png" alt="" class="rounded-circle shadow-sm img-thumbnail">
                            </div>
                            <div class="col-9">
                                <!-- <input type="file" name="foto" id="foto"> -->
            
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="username">Username</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user"></i></span>
                            </div>
                            <input value="<?=$profile->kode_anggota?>" name="kode_anggota" disabled id="kode_anggota" type="text" class="form-control" placeholder="Username...">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama">Nama</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user"></i></span>
                            </div>
                            <input value="<?=$profile->nama?>" name="nama" id="nama" type="text" class="form-control" placeholder="Nama Anda...">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="email">Email</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-envelope"></i></span>
                            </div>
                            <input value="<?=$profile->email?>" name="email" id="email" type="text" class="form-control" placeholder="Email...">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="no_telp">Satuan</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user"></i></span>
                            </div>
                            <input value="<?=$profile->satuan?>" name="satuan" id="satuan" type="text" class="form-control" placeholder="Satuan...">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="no_telp">Jabatan</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user"></i></span>
                            </div>
                            <input value="<?=$profile->jabatan?>" name="jabatan" id="jabatan" type="text" class="form-control" placeholder="Jabatan...">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
if($level_user == 2) {
    $this->load->view('gudang/footer'); 
} else if($level_user == 3) {
    $this->load->view('kasir/footer'); 
} else if($level_user == 4 or $level_user == 6 or $level_user == 7) {
    $this->load->view('keuangan/footer'); 
} else if($level_user == 5) {
    $this->load->view('kasir/footer'); 
} 

?>