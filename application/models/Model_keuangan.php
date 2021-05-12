<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_keuangan extends CI_Model {
    
    
    public function pengeluaran() {
		$this->db->select('beli.tgl_pembelian as tanggal, "Transaksi Pembelian Barang" as deskripsi_pengeluaran, (sum(barang.harga_beli*detail.jumlah_barang - (barang.harga_beli*detail.jumlah_barang*detail.discount/100)) + sum(barang.harga_beli*detail.jumlah_barang - (barang.harga_beli*detail.jumlah_barang*detail.discount/100))*beli.ppn/100) as total_harga_pembelian');
		$this->db->from('tbl_pembelian as beli');
		$this->db->join('tbl_detail_pembelian as detail', 'detail.id_pembelian = beli.id_pembelian');
		$this->db->join('tbl_barang as barang', 'barang.id_barang = detail.id_barang');
		$this->db->group_by('tanggal');
		$query = $this->db->get();
		return $query->result();
	}

    public function pemasukan() {
        $query = $this->db->get('tbl_pemasukan');
        return $query->result();
    }

    public function penjualan() {
        $this->db->select('jual.*, sum(detail.jumlah_barang*barang.harga_jual) as total_harga_pembelian');
        $this->db->from('tbl_penjualan as jual');
        $this->db->join('tbl_detail_penjualan as detail', 'jual.id_penjualan = detail.id_penjualan');
        $this->db->join('tbl_barang as barang', 'barang.id_barang = detail.id_barang');
        $this->db->group_by('id_penjualan');
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

    public function pembelian_kredit() {
		$this->db->select('beli.*, sum(barang.harga_beli*detail.jumlah_barang - (barang.harga_beli*detail.jumlah_barang*detail.discount/100)) + sum(barang.harga_beli*detail.jumlah_barang - (barang.harga_beli*detail.jumlah_barang*detail.discount/100))*beli.ppn/100 as total_harga_pembelian');
		$this->db->from('tbl_pembelian as beli');
		$this->db->join('tbl_detail_pembelian as detail', 'detail.id_pembelian = beli.id_pembelian');
		$this->db->join('tbl_barang as barang', 'barang.id_barang = detail.id_barang');
        $this->db->where('jenis_pembayaran', 'Kredit');
		$this->db->group_by('beli.id_pembelian');
		$query = $this->db->get();
		return $query->result();
	}

    public function pemasukan_global() {
        $this->db->select('masuk.tanggal, masuk.deskripsi_pemasukan, masuk.total_pemasukan');
        $this->db->from('tbl_pemasukan as masuk');
        $query1 = $this->db->get_compiled_select();
        
        $this->db->select('jual.tgl_penjualan as tanggal, "Total Penjualan" as deskripsi_pemasukan, sum(detail.jumlah_barang*barang.harga_jual) as total_pemasukan');
        $this->db->from('tbl_penjualan as jual');
        $this->db->join('tbl_detail_penjualan as detail', 'jual.id_penjualan = detail.id_penjualan');
        $this->db->join('tbl_barang as barang', 'barang.id_barang = detail.id_barang');
        $this->db->group_by('jual.tgl_penjualan');
        $query2 = $this->db->get_compiled_select();
        
        return $data['values'] = $this->db->query($query1." UNION ".$query2)->result();
    }

    public function anggota() {
        $this->db->select('user.id_user, user.nama, user.kode_anggota, user.satuan, user.pokok+sum(simpan.wajib+simpan.sukarela) as saldo_simpan, (select saldo from tbl_history_pinjam where id_pinjam = pinjam.id_pinjam order by tanggal_history_pinjam desc limit 1) as saldo_pinjam');
        $this->db->from('tbl_user as user');
        $this->db->join('tbl_simpan as simpan', 'simpan.id_user = user.id_user', 'left');
        $this->db->join('tbl_pinjam as pinjam', 'pinjam.id_user = user.id_user', 'left');
        $this->db->where('user.level = 5');
        $this->db->group_by('user.id_user');
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

    public function history_simpan($id) {
        $this->db->select('simpan.*, (simpan.sukarela+simpan.wajib) as saldo');
        $this->db->from('tbl_simpan as simpan');
        $this->db->join('tbl_user as user', 'simpan.id_user = user.id_user');
        $this->db->where('simpan.id_user', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function simpanan_anggota_id($id) {
        $this->db->select('user.id_user, user.nama, user.kode_anggota, user.satuan,user.pokok, sum(simpan.wajib) as wajib, sum(simpan.sukarela) as sukarela, user.pokok+sum(simpan.wajib+simpan.sukarela) as saldo');
        $this->db->from('tbl_user as user');
        $this->db->join('tbl_simpan as simpan', 'user.id_user = simpan.id_user', 'left');
        $this->db->where('simpan.id_user', $id);
        $this->db->group_by('simpan.id_user');
        $query = $this->db->get();
        return $query->row();
    }

    public function aksi_simpanan($data) {
        $this->db->insert('tbl_simpan', $data);
    }

    public function get_id_user($kode_anggota) {
        $this->db->select('id_user');
        $this->db->from('tbl_user');
        $this->db->where('kode_anggota', $kode_anggota);
        $query = $this->db->get();
        return $query->row()->id_user;
    }

    public function simpanan_anggota() {
        $this->db->select('user.id_user, user.nama, user.kode_anggota, user.satuan,user.pokok, sum(simpan.wajib) as wajib, sum(simpan.sukarela) as sukarela, user.pokok+sum(simpan.wajib+simpan.sukarela) as saldo');
        $this->db->from('tbl_user as user');
        $this->db->join('tbl_simpan as simpan', 'user.id_user = simpan.id_user', 'left');
        $this->db->where('user.level = 5');
        $this->db->group_by('user.id_user');
        $query = $this->db->get();
        return $query->result();
    }

    public function pinjaman_anggota() {
        $this->db->select('user.id_user, user.kode_anggota, user.nama, pinjam.*');
        $this->db->from('tbl_user as user');
        $this->db->join('tbl_pinjam as pinjam', 'user.id_user = pinjam.id_user');
        $this->db->where('user.level = 5');
        $query = $this->db->get();
        return $query->result();
    }

    public function aksi_input_pemasukan($data) {
        $this->db->insert('tbl_pemasukan', $data);
    }

    public function pinjam_id($id) {
        $this->db->select('user.id_user, user.kode_anggota, user.nama, pinjam.*');
        $this->db->from('tbl_user as user');
        $this->db->join('tbl_pinjam as pinjam', 'user.id_user = pinjam.id_user');
        $this->db->where('user.level = 5');
        $query = $this->db->get();
        return $query->row();
    }

    public function history_pinjam($id) {
        $this->db->select('*');
        $this->db->from('tbl_history_pinjam');
        $this->db->where('tbl_history_pinjam.id_pinjam', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function input_shu($data) {
        $this->db->insert('tbl_shu', $data);
    }


}