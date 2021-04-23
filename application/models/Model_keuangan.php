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
        $query = $this->db->get('tbl_anggota');
        return $query->result();
    }


}