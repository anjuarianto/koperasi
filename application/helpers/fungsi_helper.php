<?php

function cek_login()
{
    $ci = get_instance();
    if (!$ci->session->has_userdata('login_session')) {
        set_pesan('Silahkan login.');
        redirect('home');
    }
}

function buat_log($pesan, $id_user) {
    $ci = get_instance();
    $data = array(
        'deskripsi' => $pesan,
        'id_user' => $id_user,
    );
    $ci->db->insert('tbl_log', $data);
}

function is_operator()
{
    $ci = get_instance();
    if ($ci->session->userdata('login_session')['level'] != '2') {
        redirect('errors/notfound');
    }
}

function is_kasir()
{
    $ci = get_instance();
    if ($ci->session->userdata('login_session')['level'] != '3') {
        redirect('errors/notfound');
    }
}

function is_keuangan() {
    $ci = get_instance();
    $level = $ci->session->userdata('login_session')['level'];
    if (!($level == '6' or $level == '7' or $level == '4') ) {
        redirect('errors/notfound');
    } 
}

function is_admin()
{
    $ci = get_instance();
    if($ci->session->userdata('login_session')['level'] != '1') {
        redirect('errors/notfound');
    }
}

function is_anggota() {
    $ci = get_instance();
    if($ci->session->userdata('login_session')['level'] != '5') {
        redirect('errors/notfound');
    }
}

function set_pesan($pesan, $tipe = true)
{
    $ci = get_instance();
    if ($tipe) {
        $ci->session->set_flashdata('pesan', $pesan);
    } else {
        $ci->session->set_flashdata('pesan', $pesan);
    }
}

function userdata($field)
{
    $ci = get_instance();
    $ci->load->model('Admin_model', 'admin');

    $userId = $ci->session->userdata('login_session')['user'];
    return $ci->admin->get('user', ['id_user' => $userId])[$field];
}

function output_json($data)
{
    $ci = get_instance();
    $data = json_encode($data);
    $ci->output->set_content_type('application/json')->set_output($data);
}
