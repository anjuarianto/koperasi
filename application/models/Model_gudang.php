<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_gudang extends CI_Model {


	public function tambah_barang($data) {
		$this->db->insert('tbl_barang', $data);
	}

	public function profile($id) {
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('id_user', $id);
		$query = $this->db->get();

		return $query->row();
	}

	public function rak() {
		$query = $this->db->get('tbl_rak');

		return $query->result();
	}

	public function rak_id($id) {
		$this->db->where('id_rak', $id);
		$query = $this->db->get('tbl_rak');

		return $query->row();
	}

	public function rak_all() {
		
		$query = $this->db->get('tbl_rak');

		return $query->result();
	}

	public function tambah_rak($data) {
		$this->db->insert('tbl_rak', $data);
	}

	public function update_rak($id, $data) {
		$this->db->where('id_rak', $id);
		$this->db->update('tbl_rak', $data);
	}

	public function print_barang($kategori, $param) {
		if($kategori == "supplier") {
			$this->db->where('id_supplier', $param);	
		} else if($kategori == "rak") {
			$this->db->where('id_rak', $param);
		} else if($kategori == "custom") {
			
		}
		
		$this->db->select('b.id_barang, b.nama_barang, b.harga_jual');
		$this->db->from('tbl_barang as b');
			
		$query = $this->db->get();
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

	public function barang_id($id) {
		$this->db->select('b.id_barang, s.id_supplier, b.nama_barang, satuan.id_satuan, b.kode_barang,r.id_rak, harga_beli, harga_jual');
		$this->db->from('tbl_barang as b');
		$this->db->join('tbl_stok as st', 'st.id_barang = b.id_barang', 'left');
		$this->db->join('tbl_supplier as s', 's.id_supplier = b.id_supplier', 'left');
		$this->db->join('tbl_rak as r', 'r.id_rak = b.id_rak', 'left');
		$this->db->join('tbl_satuan as satuan', 'satuan.id_satuan = b.id_satuan', 'left');
		$this->db->where('b.id_barang', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function stok_barang() {
		$this->db->select('s.*, b.nama_barang');
		$this->db->from('tbl_stok as s');
		$this->db->join('tbl_barang as b', 'b.id_barang = s.id_barang', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function aksi_return_pembelian($data) {
		$this->db->insert('tbl_return_pembelian', $data);
	}

	public function return_barang($id, $data) {
		$this->db->where('id_stok', $id);
		$this->db->update('tbl_stok', $data);
	}

	public function id_barang($id) {
		$query = $this->db->get_where('tbl_barang', array('id_barang' => $id));
		return $query->row_array();
	}

	public function detail_barang() {
		$this->db->select('b.id_barang, s.nama_supplier, b.nama_barang, satuan.nama_satuan, kode_barang,r.nama_rak, harga_beli, harga_jual, (select sum(stok_barang) from tbl_stok where id_barang = st.id_barang group by id_barang) as total_stok');
		$this->db->from('tbl_barang as b');
		$this->db->join('tbl_stok as st', 'st.id_barang = b.id_barang', 'left');
		$this->db->join('tbl_supplier as s', 's.id_supplier = b.id_supplier', 'left');
		$this->db->join('tbl_rak as r', 'r.id_rak = b.id_rak', 'left');
		$this->db->join('tbl_satuan as satuan', 'satuan.id_satuan = b.id_satuan', 'left');
		$this->db->group_by('id_barang');
		$query = $this->db->get();
		return $query->result();
	}

	public function return_pembelian() {
		$this->db->select('return.*, detail.id_detail_pembelian, detail.id_barang, beli.no_faktur, barang.nama_barang, barang.harga_beli');
		$this->db->from('tbl_return_pembelian as return');
		$this->db->join('tbl_detail_pembelian as detail', 'return.id_detail_pembelian = detail.id_detail_pembelian', 'left');
		$this->db->join('tbl_barang as barang', 'barang.id_barang = detail.id_barang');
		$this->db->join('tbl_pembelian as beli', 'beli.id_pembelian = detail.id_pembelian');
		$query = $this->db->get();
		return $query->result();
	}

	public function return_pembelian_id($id) {
		$this->db->select('detail.*, beli.no_faktur, beli.id_pembelian, barang.nama_barang, barang.harga_beli');
		$this->db->from('tbl_detail_pembelian as detail');
		$this->db->join('tbl_barang as barang', 'barang.id_barang = detail.id_barang');
		$this->db->join('tbl_pembelian as beli', 'beli.id_pembelian = detail.id_pembelian');
		$this->db->where('detail.id_detail_pembelian', $id);
		$query = $this->db->get();
		return $query->row();
	}


	public function tambah_jumlah_barang($data) {
		$query = $this->db->insert('tbl_barang', $data);
	}

	public function barang_kode($input) {
		$this->db->select('b.id_barang, s.nama_supplier, b.nama_barang, satuan.nama_satuan, b.kode_barang, harga_beli, harga_jual, sum(st.stok_barang) as total_stok');
		$this->db->from('tbl_barang as b');
		$this->db->join('tbl_stok as st', 'st.id_barang = b.id_barang', 'left');
		$this->db->join('tbl_supplier as s', 's.id_supplier = b.id_supplier', 'left');
		$this->db->join('tbl_satuan as satuan', 'satuan.id_satuan = b.id_satuan', 'left');
		$this->db->where('b.kode_barang', $input);
		$query = $this->db->get();
		return $query->row();
	}



	// Satuan
	public function satuan() {
		$query = $this->db->get('tbl_satuan');
		return $query->result();
	}

	public function satuan_id($id) {
		$query = $this->db->get_where('tbl_satuan', array('id_satuan' => $id));
		return $query->row();
	}

	public function tambah_satuan($data) {
		$this->db->insert('tbl_satuan', $data);
	}

	public function update_satuan($id, $data) {
		$this->db->where('id_satuan', $id);
		$this->db->update('tbl_satuan', $data);
	}


	////////////////////////supplier
	public function supplier() {
		$query = $this->db->get('tbl_supplier');
		return $query->result();
	}

	public function supplier_id($id) {
		$query = $this->db->get_where('tbl_supplier', array('id_supplier' => $id));
		return $query->row();
	}

	public function tambah_supplier($data) {
		$this->db->insert('tbl_supplier', $data);
	}

	public function update_supplier($id, $data) {
		$this->db->where('id_supplier', $id);
		$this->db->update('tbl_supplier', $data);
	}


	/////////////////////stok
	public function stok_expired() {
		$this->db->select('s.*, b.nama_barang');
		$this->db->from('tbl_stok as s');
		$this->db->join('tbl_barang as b', 'b.id_barang = s.id_barang', 'left');
		$this->db->where('s.tanggal_expired <= NOW() + INTERVAL 30 DAY and s.tanggal_expired >= NOW()');
		$query = $this->db->get();
		return $query->result();
	}

	public function return_terakhir() {
		$this->db->select('return.*, detail.id_detail_pembelian, detail.id_barang, beli.no_faktur, barang.nama_barang, barang.harga_beli');
		$this->db->from('tbl_return_pembelian as return');
		$this->db->join('tbl_detail_pembelian as detail', 'return.id_detail_pembelian = detail.id_detail_pembelian', 'left');
		$this->db->join('tbl_barang as barang', 'barang.id_barang = detail.id_barang');
		$this->db->join('tbl_pembelian as beli', 'beli.id_pembelian = detail.id_pembelian');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}

	public function stok_akan_habis() {
		$this->db->select('s.id_stok, b.nama_barang, s.stok_barang, s.tanggal_pembelian, s.tanggal_expired, beli.no_faktur');
		$this->db->from('tbl_stok as s');
		$this->db->join('tbl_barang as b', 'b.id_barang = s.id_barang', 'left');
		$this->db->join('tbl_pembelian as beli', 'beli.id_pembelian = s.id_pembelian', 'left');
		$this->db->where('s.stok_barang <= 30');
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

	public function stok_id($id) {
		$this->db->select('s.*, b.nama_barang');
		$this->db->from('tbl_stok as s');
		$this->db->join('tbl_barang as b', 'b.id_barang = s.id_barang', 'left');
		$this->db->where('s.id_stok', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function select_stok($id_pembelian, $id_barang) {
		$this->db->select('s.*, b.nama_barang');
		$this->db->from('tbl_stok as s');
		$this->db->join('tbl_barang as b', 'b.id_barang = s.id_barang', 'left');
		$this->db->where('s.id_pembelian', $id_pembelian);
		$this->db->where('s.id_barang', $id_barang);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_stok($id, $data) {
		$this->db->where('id_stok', $id);
		$this->db->update('tbl_stok', $data);
	}

	public function tambah_stok($data) {
		$this->db->insert('tbl_stok', $data);
	}

	public function stok_return($id, $data) {
		$this->db->where('id_detail_pembelian', $id);
		$this->db->insert('tbl_detail_pembelian', $data);
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
	

	public function pembelian($id_user) {
		$this->db->select('beli.*, sum(barang.harga_beli*detail.jumlah_barang - (barang.harga_beli*detail.jumlah_barang*detail.discount/100)) + sum(barang.harga_beli*detail.jumlah_barang - (barang.harga_beli*detail.jumlah_barang*detail.discount/100))*beli.ppn/100 as total_harga_pembelian');
		$this->db->from('tbl_pembelian as beli');
		$this->db->join('tbl_detail_pembelian as detail', 'detail.id_pembelian = beli.id_pembelian');
		$this->db->join('tbl_barang as barang', 'barang.id_barang = detail.id_barang');
		$this->db->where('beli.user', $id_user);
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


	
	

	public function jumlah_transaksi() {
		$this->db->select('count(id_pembelian) as jumlah_transaksi');
		$this->db->from('tbl_pembelian');
		$query = $this->db->get()->row_array();
		return $query['jumlah_transaksi'];
	}



	// get data with id
	

	// public function pembelian_id($id) {
	// 	$query = $this->db->get_where('tbl_pembelian', array('id_pembelian' => $id));
	// 	return $query->row();
	// }

	

	

	

	public function detail_pembelian($id) {
		$this->db->select('dp.*, satuan.nama_satuan, (b.harga_beli*dp.jumlah_barang-(dp.discount*b.harga_beli*dp.jumlah_barang/100)) as harga_total_barang, b.nama_barang, b.id_barang');
		$this->db->from('tbl_detail_pembelian as dp');
		$this->db->join('tbl_barang as b', 'b.id_barang = dp.id_barang', 'left');
		$this->db->join('tbl_satuan as satuan', 'satuan.id_satuan = b.id_satuan', 'left');
		$this->db->where('dp.id_pembelian', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function detail_pembelian_id($id) {
		$this->db->select('detail.*, satuan.nama_satuan, barang.id_barang, barang.nama_barang, barang.kode_barang, supplier.nama_supplier');
		$this->db->from('tbl_detail_pembelian as detail');
		$this->db->join('tbl_barang as barang', 'barang.id_barang = detail.id_barang');
		$this->db->join('tbl_supplier as supplier', 'supplier.id_supplier = barang.id_supplier');
		$this->db->join('tbl_satuan as satuan', 'satuan.id_satuan = barang.id_satuan');
		$this->db->where('detail.id_detail_pembelian', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_detail_pembelian($id, $data) {
		$this->db->where('id_detail_pembelian', $id);
		$this->db->update('tbl_detail_pembelian', $data);
	}

	public function update_pembelian($id, $data) {
		$this->db->where('id_pembelian', $id);
		$this->db->update('tbl_pembelian', $data);
	}

	

	// insert data to database
	

	

	public function tambah_pembelian($data) {
		$this->db->insert('tbl_pembelian', $data);
	}

	public function tambah_detail_pembelian($data) {
		$this->db->insert('tbl_detail_pembelian',$data);
	}

	

	// update data
	

	

	public function update_barang($id, $data) {
		$this->db->where('id_barang', $id);
		$this->db->update('tbl_barang', $data);
	}

	

	


	

	
		

	

	
	

	
	

	

	

	
}
