<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_gudang extends CI_Model {

	// get all data from database
	public function tambah_barang($data) {
		$this->db->insert('tbl_barang', $data);
	}

	public function supplier() {
		$query = $this->db->get('tbl_supplier');
		return $query->result();
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
		$this->db->select('s.id_stok, b.nama_barang, s.stok_barang, s.tanggal_pembelian, s.tanggal_expired, s.tanggal_return');
		$this->db->from('tbl_stok as s');
		$this->db->join('tbl_barang as b', 'b.id_barang = s.id_barang', 'left');
		$query = $this->db->get();
		return $query->result();
	}
	public function stok_expired() {
		$this->db->select('s.id_stok, b.nama_barang, s.stok_barang, s.tanggal_pembelian, s.tanggal_expired, s.tanggal_return');
		$this->db->from('tbl_stok as s');
		$this->db->join('tbl_barang as b', 'b.id_barang = s.id_barang', 'left');
		$this->db->where('s.tanggal_expired <= NOW() + INTERVAL 30 DAY and s.tanggal_expired >= NOW()');
		$query = $this->db->get();
		return $query->result();
	}

	public function return_terakhir() {
		$this->db->select('s.id_stok, b.nama_barang, s.stok_barang, s.tanggal_pembelian, s.tanggal_expired, s.tanggal_return, beli.no_faktur');
		$this->db->from('tbl_stok as s');
		$this->db->join('tbl_barang as b', 'b.id_barang = s.id_barang', 'left');
		$this->db->join('tbl_pembelian as beli', 'beli.id_pembelian = s.id_pembelian', 'left');
		$this->db->where('s.tanggal_return is not NULL ');
		$query = $this->db->get();
		return $query->result();
	}

	public function stok_akan_habis() {
		$this->db->select('s.id_stok, b.nama_barang, s.stok_barang, s.tanggal_pembelian, s.tanggal_expired, s.tanggal_return, beli.no_faktur');
		$this->db->from('tbl_stok as s');
		$this->db->join('tbl_barang as b', 'b.id_barang = s.id_barang', 'left');
		$this->db->join('tbl_pembelian as beli', 'beli.id_pembelian = s.id_pembelian', 'left');
		$this->db->where('s.stok_barang <= 30');
		$query = $this->db->get();
		return $query->result();
	}

	public function transaksi_kredit() {
		$this->db->select('beli.*, sum(barang.harga_beli*detail.jumlah_barang - (barang.harga_beli*detail.jumlah_barang*detail.discount/100)) + sum(barang.harga_beli*detail.jumlah_barang - (barang.harga_beli*detail.jumlah_barang*detail.discount/100))*beli.ppn/100 as total_harga_pembelian');
		$this->db->from('tbl_pembelian as beli');
		$this->db->join('tbl_detail_pembelian as detail', 'detail.id_pembelian = beli.id_pembelian');
		$this->db->join('tbl_barang as barang', 'barang.id_barang = detail.id_barang');
		$this->db->where('beli.jenis_pembayaran', 'kredit');
		$this->db->group_by('beli.id_pembelian');
		$query = $this->db->get();
		return $query->result();
	}
	public function detail_barang() {
		$this->db->select('b.id_barang, s.nama_supplier, b.nama_barang, kode_barang, harga_beli, harga_jual, sum(st.stok_barang) as total_stok');
		$this->db->from('tbl_barang as b');
		$this->db->join('tbl_stok as st', 'st.id_barang = b.id_barang', 'left');
		$this->db->join('tbl_supplier as s', 's.id_supplier = b.id_supplier');
		$this->db->group_by('id_barang');
		$query = $this->db->get();
		return $query->result();
	}

	public function pembelian() {
		$this->db->select('beli.*, sum(barang.harga_beli*detail.jumlah_barang - (barang.harga_beli*detail.jumlah_barang*detail.discount/100)) + sum(barang.harga_beli*detail.jumlah_barang - (barang.harga_beli*detail.jumlah_barang*detail.discount/100))*beli.ppn/100 as total_harga_pembelian');
		$this->db->from('tbl_pembelian as beli');
		$this->db->join('tbl_detail_pembelian as detail', 'detail.id_pembelian = beli.id_pembelian');
		$this->db->join('tbl_barang as barang', 'barang.id_barang = detail.id_barang');
		$this->db->group_by('beli.id_pembelian');
		$query = $this->db->get();
		return $query->result();
	}

	public function pembelian_id($id) {
		$this->db->select('beli.*, sum(barang.harga_beli*detail.jumlah_barang - (barang.harga_beli*detail.jumlah_barang*detail.discount/100)) + sum(barang.harga_beli*detail.jumlah_barang - (barang.harga_beli*detail.jumlah_barang*detail.discount/100))*beli.ppn/100 as total_harga_pembelian, sum(barang.harga_beli*detail.jumlah_barang - (barang.harga_beli*detail.jumlah_barang*detail.discount/100)) as before_ppn ,user.nama');
		$this->db->from('tbl_pembelian as beli');
		$this->db->join('tbl_detail_pembelian as detail', 'detail.id_pembelian = beli.id_pembelian');
		$this->db->join('tbl_barang as barang', 'barang.id_barang = detail.id_barang');
		$this->db->join('tbl_user as user', 'user.id_user = beli.user');
		$this->db->where('beli.id_pembelian', $id);
		
		$query = $this->db->get();
		return $query->row();
	}



	// get value from database for dashboard
	
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



	// get data with id
	public function id_barang($id) {
		$query = $this->db->get_where('tbl_barang', array('id_barang' => $id));
		return $query->row_array();
	}

	// public function pembelian_id($id) {
	// 	$query = $this->db->get_where('tbl_pembelian', array('id_pembelian' => $id));
	// 	return $query->row();
	// }

	public function supplier_id($id) {
		$query = $this->db->get_where('tbl_supplier', array('id_supplier' => $id));
		return $query->row();
	}

	public function barang_id($id) {
		$this->db->select('b.id_barang, s.nama_supplier, b.nama_barang, b.kode_barang, b.harga_beli, b.harga_jual, sum(st.stok_barang) as total_stok');
		$this->db->from('tbl_barang as b');
		$this->db->join('tbl_stok as st', 'st.id_barang = b.id_barang', 'left');
		$this->db->join('tbl_supplier as s', 's.id_supplier = b.id_supplier');
		$this->db->where('b.id_barang', $id);
		$this->db->group_by('id_barang');
		$query = $this->db->get();
		return $query->row();
	}

	public function stok_id($id) {
		$this->db->select('s.id_stok, b.nama_barang, s.stok_barang, s.tanggal_pembelian, s.tanggal_expired, s.tanggal_return');
		$this->db->from('tbl_stok as s');
		$this->db->join('tbl_barang as b', 'b.id_barang = s.id_barang', 'left');
		$this->db->where('s.id_stok', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function detail_pembelian($id) {
		$this->db->select('dp.*, (b.harga_beli*dp.jumlah_barang-(dp.discount*b.harga_beli*dp.jumlah_barang/100)) as harga_total_barang, b.nama_barang, b.id_barang');
		$this->db->from('tbl_detail_pembelian as dp');
		$this->db->join('tbl_barang as b', 'b.id_barang = dp.id_barang', 'left');
		$this->db->where('dp.id_pembelian', $id);
		$query = $this->db->get();
		return $query->result();
	}

	

	// insert data to database
	public function tambah_jumlah_barang($data) {
		$query = $this->db->insert('tbl_barang', $data);
	}

	public function tambah_supplier($data) {
		$this->db->insert('tbl_supplier', $data);
	}

	public function tambah_pembelian($data) {
		$this->db->insert('tbl_pembelian', $data);
	}

	public function tambah_detail_pembelian($data) {
		$this->db->insert('tbl_detail_pembelian',$data);
	}

	public function tambah_stok($data) {
		$this->db->insert('tbl_stok', $data);
	}

	// update data
	public function return_barang($id, $data) {
		$this->db->where('id_stok', $id);
		$this->db->update('tbl_stok', $data);
	}

	public function update_supplier($id, $data) {
		$this->db->where('id_supplier', $id);
		$this->db->update('tbl_supplier', $data);
	}

	public function update_barang($id, $data) {
		$this->db->where('id_barang', $id);
		$this->db->update('tbl_barang', $data);
	}

	public function update_stok($id, $data) {
		$this->db->where('id_stok', $id);
		$this->db->update('tbl_stok', $data);
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


	

	
		

	

	
	

	
	

	

	

	
}
