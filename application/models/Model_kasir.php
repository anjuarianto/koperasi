<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kasir extends CI_Model {
    public function barang() {
        $this->db->select('*');
		$this->db->from('tbl_barang as b');
		$this->db->join('tbl_supplier as s', 's.id_supplier = b.id_supplier');
		$query = $this->db->get();
        return $query->result();
    }

    public function barang_id($id) {
        $this->db->select('*');
		$this->db->from('tbl_barang');
        $this->db->where('id_barang', $id);
		$query = $this->db->get();
        return $query->row_array();
    }

    public function detail_barang() {
		$this->db->select('b.id_barang, s.nama_supplier, b.nama_barang, kode_barang, harga_beli, harga_jual, diskon, sum(st.stok_barang) as total_stok');
		$this->db->from('tbl_barang as b');
		$this->db->join('tbl_stok as st', 'st.id_barang = b.id_barang', 'left');
		$this->db->join('tbl_supplier as s', 's.id_supplier = b.id_supplier');
		$this->db->group_by('id_barang');
		$query = $this->db->get();
		return $query->result();
	}


    public function jumlah_total_stok() {
        $this->db->select('sum(stok_barang) as jumlah_stok');
		$this->db->from('tbl_stok');
		$query = $this->db->get();
		$result = $query->row_array();
		return $result['jumlah_stok'];
    }
    

    public function supplier() {
        $query = $this->db->get('supplier');
        return $query->result();
    }

    public function anggota() {
        $this->db->select('u.kode_anggota, u.nama, u.id_user');
        $this->db->from('tbl_user as u');
        $this->db->where('u.level', 5);
        $query = $this->db->get();
        return $query->result();
    }

    public function penjualan() {
        $query = $this->db->get('tbl_penjualan');
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

    public function jumlah_transaksi() {
		$this->db->select('count(id_penjualan) as jumlah_transaksi');
		$this->db->from('tbl_penjualan');
		$query = $this->db->get()->row_array();
		return $query['jumlah_transaksi'];
	}

    public function get_stok($id_barang) {
        $this->db->select('stok_barang');
        $this->db->from('tbl_stok');
        $this->db->where('id_barang', $id_barang);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function barang_kode($input) {
		$this->db->select('b.id_barang, s.nama_supplier, b.nama_barang, b.kode_barang, harga_beli, harga_jual, sum(st.stok_barang) as total_stok');
		$this->db->from('tbl_barang as b');
		$this->db->join('tbl_stok as st', 'st.id_barang = b.id_barang', 'left');
		$this->db->join('tbl_supplier as s', 's.id_supplier = b.id_supplier');
		$this->db->where('b.kode_barang', $input);
		$query = $this->db->get();
		return $query->row();
    }

    public function anggota_kode($kode_anggota) {
        $this->db->select('u.*');
        $this->db->from('tbl_user as u');
        $this->db->where('u.level', 5);
        $this->db->where('kode_anggota', $kode_anggota);
        $query = $this->db->get();
        return $query->row();
    }

    public function barang_all() {
        $query = $this->db->get('tbl_barang');
        return $query->result();
        
    }

    public function anggota_all() {
        $this->db->select('u.*');
        $this->db->from('tbl_user as u');
        $this->db->where('u.level', 5);
        $query = $this->db->get();
        return $query->result();
    }
}
