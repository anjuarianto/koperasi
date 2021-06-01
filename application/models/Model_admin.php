<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_admin extends CI_Model {

    // Model Get
    public function barang()
	{
		$this->db->select('*');
		$this->db->from('tbl_barang as b');
		$this->db->join('tbl_supplier as s', 's.id_supplier = b.id_supplier');
		$query = $this->db->get();
        return $query->result();
	}

    public function detail_barang() {
		$this->db->select('b.id_barang, s.nama_supplier, b.nama_barang, kode_barang, harga_beli, harga_jual, (select sum(stok_barang) from tbl_stok where id_barang = st.id_barang group by id_barang) as total_stok');
		$this->db->from('tbl_barang as b');
		$this->db->join('tbl_stok as st', 'st.id_barang = b.id_barang', 'left');
		$this->db->join('tbl_supplier as s', 's.id_supplier = b.id_supplier', 'left');
		$this->db->group_by('id_barang');
		$query = $this->db->get();
		return $query->result();
        
	}

    public function activity_log() {
        $this->db->select('log.*, user.nama, user.level');
        $this->db->from('tbl_log as log');
        $this->db->join('tbl_user as user', 'log.id_user = user.id_user', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function aksi_tambah_user($data) {
        $this->db->insert('tbl_user', $data);
    }

    public function supplier() {
        $query = $this->db->get('tbl_supplier');
        return $query->result();
    }

    public function anggota() {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('level', 5);
        $query = $this->db->get();
        return $query->result();
    }

    public function operator() {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('level != 5');
        $query = $this->db->get();
        return $query->result();
    }

    public function pengeluaran() {
        $query = $this->db->get('tbl_pembelian');
        return $query->result();
    }

    public function pemasukan() {
        $query = $this->db->get('tbl_penjualan');
        return $query->result();
    }

    public function voucher() {
        $this->db->select('v.*, u.nama');
        $this->db->from('tbl_voucher as v');
        $this->db->join('tbl_user as u', 'u.id_user = v.id_user');
        $query = $this->db->get();
        return $query->result();
    }

    public function input_voucher($data) {
        $this->db->insert('tbl_voucher', $data);
    }

}