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
		$this->db->select('b.id_barang, s.nama_supplier, b.nama_barang, kode_barang, harga_beli, harga_jual, diskon, sum(st.stok_barang) as total_stok');
		$this->db->from('tbl_barang as b');
		$this->db->join('tbl_stok as st', 'st.id_barang = b.id_barang', 'left');
		$this->db->join('tbl_supplier as s', 's.id_supplier = b.id_supplier');
		$this->db->group_by('id_barang');
		$query = $this->db->get();
		return $query->result();
	}

    public function supplier() {
        $query = $this->db->get('tbl_supplier');
        return $query->result();
    }

    public function user() {
        $query = $this->db->get('tbl_user');
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
        $query = $this->db->get('tbl_voucher');
        return $query->result();
    }

}