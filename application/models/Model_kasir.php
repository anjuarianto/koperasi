<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kasir extends CI_Model {
    public function barang() {
        $query = $this->db->get('tbl_barang');
        return $query->result();
    }

    public function anggota() {
        $query = $this->db->get('tbl_anggota');
        return $query->result();
    }

    public function tambah_penjualan($data) {
        $query = $this->db->insert('tbl_penjualan', $data);
    }

    public function tambah_detail_penjualan($data) {
        $this->db->insert('tbl_detail_penjualan', $data);
    }

    public function update_stok($id_barang, $data) {
        $this->db->where('id_barang', $id_barang);
        $this->db->update('tbl_stok', $data);
    }

    public function get_stok($id_barang) {
        $this->db->select('stok_barang');
        $this->db->from('tbl_stok');
        $this->db->where('id_barang', $id_barang);
        $query = $this->db->get();
        return $query->row_array();
    }
}
