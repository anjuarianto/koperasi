<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kasir extends CI_Model {
    public function barang()
	{
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
		$this->db->select('b.id_barang, s.nama_supplier, b.nama_barang, kode_barang, harga_beli, harga_jual, sum(st.stok_barang) as total_stok');
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

    public function voucher() {
        $this->db->select('v.*, u.kode_anggota');
        $this->db->from('tbl_voucher as v');
        $this->db->join('tbl_user as u', 'u.id_user = v.id_user');
        $query = $this->db->get();
        return $query->result();
    }

    public function belanja_anggota() {
        $this->db->select('jual.*, user.nama, sum(detail.jumlah_barang*barang.harga_jual) as total_harga_pembelian');
        $this->db->from('tbl_penjualan as jual');
        $this->db->join('tbl_detail_penjualan as detail', 'jual.id_penjualan = detail.id_penjualan');
        $this->db->join('tbl_barang as barang', 'barang.id_barang = detail.id_barang');
        $this->db->join('tbl_user user', 'user.kode_anggota = jual.kode_anggota', 'left');
        $this->db->group_by('jual.kode_anggota');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function total_jenis_transaksi() {
        $this->db->select('jual.kode_anggota, jual.jenis_pembayaran, sum(detail.jumlah_barang*barang.harga_jual) as total');
        $this->db->from('tbl_penjualan jual');
        $this->db->join('tbl_detail_penjualan detail', 'detail.id_penjualan = jual.id_penjualan', 'left');
        $this->db->join('tbl_barang barang', 'detail.id_barang = barang.id_barang', 'left');
        $this->db->group_by('jual.id_penjualan');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function profile($id) {
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('id_user', $id);
		$query = $this->db->get();

		return $query->row();
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

    public function penjualan($id_user) {
        $this->db->select('jual.*, sum(detail.jumlah_barang*barang.harga_jual) as total_harga_pembelian');
        $this->db->from('tbl_penjualan as jual');
        $this->db->join('tbl_detail_penjualan as detail', 'jual.id_penjualan = detail.id_penjualan');
        $this->db->join('tbl_barang as barang', 'barang.id_barang = detail.id_barang');
        $this->db->where('jual.user', $id_user);
        $this->db->group_by('id_penjualan');
        $query = $this->db->get();
        return $query->result();
    }

    public function penjualan_id($id) {
        $this->db->select('jual.*, user.nama, sum(detail.jumlah_barang*barang.harga_jual) as total_harga_penjualan');
        $this->db->from('tbl_penjualan as jual');
        $this->db->join('tbl_detail_penjualan as detail', 'jual.id_penjualan = detail.id_penjualan');
        $this->db->join('tbl_barang as barang', 'barang.id_barang = detail.id_barang');
        $this->db->join('tbl_user as user', 'user.id_user = jual.user');
        $this->db->where('jual.id_penjualan', $id);
        $this->db->group_by('id_penjualan');
        $query = $this->db->get();
        return $query->row();
    }

    public function detail_penjualan($id) {
        $this->db->select('detail.*, barang.id_barang, barang.nama_barang, barang.kode_barang, barang.harga_jual, (barang.harga_jual*detail.jumlah_barang) as harga_total_barang');
        $this->db->from('tbl_detail_penjualan as detail');
        $this->db->join('tbl_barang as barang', 'barang.id_barang = detail.id_barang', 'left');
        $this->db->where('detail.id_penjualan', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function detail_penjualan_id($id) {
        $this->db->select('detail.*, barang.id_barang, supplier.nama_supplier, barang.nama_barang, barang.kode_barang, barang.harga_jual, (barang.harga_jual*detail.jumlah_barang) as harga_total_barang');
        $this->db->from('tbl_detail_penjualan as detail');
        $this->db->join('tbl_barang as barang', 'barang.id_barang = detail.id_barang', 'left');
        $this->db->join('tbl_supplier as supplier', 'supplier.id_supplier = barang.id_supplier', 'left');
        $this->db->where('detail.id_detail_penjualan', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function voucher_id($id) {
        $this->db->select('voucher.*, user.nama, user.kode_anggota');
        $this->db->from('tbl_voucher as voucher');
        $this->db->join('tbl_user as user', 'user.id_user = voucher.id_user', 'left');
        $this->db->where('voucher.id_voucher', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function voucher_keluar() {
        $this->db->select('jual.id_penjualan, jual.tgl_penjualan, jual.kode_anggota, jual.kode_voucher');
        $this->db->from('tbl_penjualan as jual');
        $this->db->join('tbl_detail_penjualan as detail', 'jual.id_penjualan = detail.id_penjualan');
        $this->db->join('tbl_barang as barang', 'barang.id_barang = detail.id_barang');
        $this->db->group_by('id_penjualan');
        $this->db->where('kode_voucher IS NOT NULL');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambah_penjualan($data) {
        $query = $this->db->insert('tbl_penjualan', $data);
    }

    public function tambah_detail_penjualan($data) {
        $this->db->insert('tbl_detail_penjualan', $data);
    }

    public function update_stok($id_stok, $data) {
        $this->db->where('id_stok', $id_stok);
        $this->db->update('tbl_stok', $data);
    }

    public function jumlah_transaksi() {
		$this->db->select('count(id_penjualan) as jumlah_transaksi');
		$this->db->from('tbl_penjualan');
		$query = $this->db->get()->row_array();
		return $query['jumlah_transaksi'];
	}

    public function get_voucher($id) {
        $this->db->select('kode_voucher');
        $this->db->from('tbl_penjualan');
        $this->db->where('id_penjualan', $id);
        $query = $this->db->get();
        return $query->row()->kode_voucher;
    }

    public function get_stok($id_barang) {
        $this->db->select('id_stok, stok_barang');
        $this->db->from('tbl_stok');
        $this->db->where('id_barang', $id_barang);
        $this->db->order_by('tanggal_pembelian', 'desc');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function barang_kode($input) {
		$this->db->select('b.id_barang, s.nama_supplier, b.nama_barang, b.kode_barang, harga_beli, harga_jual, (st.stok_barang) as total_stok');
		$this->db->from('tbl_barang as b');
		$this->db->join('tbl_stok as st', 'st.id_barang = b.id_barang', 'left');
		$this->db->join('tbl_supplier as s', 's.id_supplier = b.id_supplier', 'left');
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

    public function update_detail_penjualan($id, $data) {
        $this->db->where('id_detail_penjualan', $id);
        $this->db->update('tbl_detail_penjualan', $data);
    }

    public function update_voucher($id_voucher, $data) {
        $this->db->where('id_voucher', $id_voucher);
        $this->db->update('tbl_voucher', $data);
    }

    public function update_penjualan($id, $data) {
        $this->db->where('id_penjualan', $id);
        $this->db->update('tbl_penjualan', $data);
    }

    public function last_penjualan() {
        return $this->db->get('tbl_penjualan')->last_row();
        
    }
}
