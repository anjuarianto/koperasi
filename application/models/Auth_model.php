<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function register($data) {
        $query = $this->db->insert('tbl_user', $data);
        if($query) {
            return true;
        } else {
            return false;
        }
    }

    public function cek_kode_anggota($kode_anggota) {
        $query = $this->db->get_where('tbl_user', ['kode_anggota' => $kode_anggota]);
        return $query->num_rows();
    }

    public function get_password($kode_anggota)
    {
        $data = $this->db->get_where('tbl_user', ['kode_anggota' => $kode_anggota])->row_array();
        return $data['password'];
    }

    public function userdata($kode_anggota)
    {
        return $this->db->get_where('tbl_user', ['kode_anggota' => $kode_anggota])->row_array();

    }
}