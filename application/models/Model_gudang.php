<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_gudang extends CI_Model {

	// Dashboard Gudang

	
	public function jumlah_total_stok() {
		$this->db->select('sum(stok_barang) as jumlah_stok');
		$this->db->from('tbl_stok');
		$query = $this->db->get();

		$result = $query->row_array();
		return $result['jumlah_stok'];
	}

	public function jumlah_transaksi() {
		$this->db->select('count(id_pembelian) as jumlah_transaksi');
		$this->db->from('tbl_pembelian');
		$query = $this->db->get()->row_array();
		return $query['jumlah_transaksi'];
	}

	public function barang()
	{
		$this->db->select('*');
		$this->db->from('tbl_barang as b');
		$this->db->join('tbl_supplier as s', 's.id_supplier = b.id_supplier');
		$query = $this->db->get();
        return $query->result();
	}

	public function stok_barang() {
		$this->db->select('b.nama_barang, s.stok_barang, s.tanggal_pembelian, s.tanggal_expired, s.tanggal_return');
		$this->db->from('tbl_stok as s');
		$this->db->join('tbl_barang as b', 'b.id_barang = s.id_barang', 'left');
		$query = $this->db->get();
		return $query->result();
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


	public function tambah_barang($data) {
		$this->db->insert('tbl_barang', $data);
	}

	public function id_barang($id) {
		$query = $this->db->get_where('tbl_barang', array('id_barang' => $id));
		return $query->row_array();
	}

	public function tambah_jumlah_barang($data) {
		$query = $this->db->insert('tbl_barang', $data);
	}
		

	public function supplier() {
		$query = $this->db->get('tbl_supplier');
		return $query->result();
	}

	public function tambah_supplier($data) {
		$this->db->insert('tbl_supplier', $data);
	}

	public function pembelian() {
		$query = $this->db->get('tbl_pembelian');
		return $query->result();
	}

	public function pembelian_id($id) {
		$query = $this->db->get_where('tbl_pembelian', array('id_pembelian' => $id));
		return $query->row();
	}
	public function tambah_pembelian($data) {
		$this->db->insert('tbl_pembelian', $data);
	}

	public function detail_pembelian($id) {
		$this->db->select('dp.jumlah_barang, dp.harga_total_barang, b.nama_barang, b.id_barang');
		$this->db->from('tbl_detail_pembelian as dp');
		$this->db->join('tbl_barang as b', 'b.id_barang = dp.id_barang', 'left');
		$this->db->where('dp.id_pembelian', $id);
		$query = $this->db->get();

		return $query->result();
	}

	public function tambah_detail_pembelian($data) {
		$this->db->insert('tbl_detail_pembelian',$data);
	}

	public function tambah_stok($data) {
		$this->db->insert('tbl_stok', $data);
	}
}
