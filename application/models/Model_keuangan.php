<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_keuangan extends CI_Model {
    
    
    public function pengeluaran() {
        $query = $this->db->get('tbl_pembelian');
        return $query->result();
    }

    public function pemasukan() {
        $query = $this->db->get('tbl_penjualan');
        return $query->result();
    }

    public function anggota() {
        $this->db->select('u.id_user, u.nama, u.kode_anggota');
        $this->db->from('tbl_user as u');
        $this->db->where('u.level = 5');
        $query = $this->db->get();
        return $query->result();
    }

    public function shu() {
        $this->db->select('u.id_user, u.kode_anggota, s.nilai_shu,  s.periode,u.nama, u.kode_anggota, u.level');
        $this->db->from('tbl_user as u');
        $this->db->join('tbl_shu as s', 's.id_user = u.id_user', 'left');
        $this->db->where('u.level = 5');
        $query = $this->db->get();
        return $query->result();
    }

    public function input_shu($data) {
        $this->db->insert('tbl_shu', $data);
    }


}