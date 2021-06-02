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

<div class="card p-2 shadow-sm border-bottom-primary">
    <div class="card-header bg-white">
        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
            <?=$profile->nama?>
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 mb-4 mb-md-0">
                <img src="<?=base_url()?>assets/img/user.png" alt="" class="img-thumbnail rounded mb-2">
                <a href="<?=base_url().$statusuri?>/edit_profile" class="btn btn-sm btn-block btn-primary"><i class="fa fa-edit"></i> Edit Profile</a>
                <!-- <a href="" class="btn btn-sm btn-block btn-primary"><i class="fa fa-lock"></i> Ubah Password</a> -->
            </div>
            <div class="col-md-10">
                <table class="table">
                    <tr>
                        <th width="200"><?=$level_user == 5 ? 'NRP' : 'Username'?></th>
                        <td><?=$profile->kode_anggota?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?=$profile->email?></td>
                    </tr>
                    <tr>
                        <th>Satuan</th>
                        <td><?=$profile->satuan?></td>
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td><?=$profile->jabatan?></td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td class="text-capitalize"><?=$role?></td>
                    </tr>
                </table>
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
    $this->load->view('anggota/footer'); 
}
?>