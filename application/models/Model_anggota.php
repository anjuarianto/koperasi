<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_anggota extends CI_Model {

    public function saldo_simpan($id) {
        $this->db->select('(user.pokok+sum(simpan.wajib+simpan.sukarela)) as saldo');
        $this->db->from('tbl_user as user');
        $this->db->join('tbl_simpan as simpan', 'simpan.id_user = user.id_user');
        $this->db->where('user.id_user', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function profile($id) {
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('id_user', $id);
		$query = $this->db->get();

		return $query->row();
	}
   
    public function saldo_pinjam($id) {
        $this->db->select('(pinjam.pinjaman-IFNULL(sum(history.angsuran),0)) as saldo');
        $this->db->from('tbl_user as user');
        $this->db->join('tbl_pinjam as pinjam', 'pinjam.id_user = user.id_user', 'left');
        $this->db->join('tbl_history_pinjam as history', 'history.id_pinjam = pinjam.id_pinjam', 'left');
        $this->db->where('user.id_user', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function simpanan_id($id) {
        $this->db->select('user.id_user, user.nama, user.kode_anggota, user.satuan,user.pokok, sum(simpan.wajib) as wajib, sum(simpan.sukarela) as sukarela, user.pokok+sum(simpan.wajib+simpan.sukarela) as saldo');
        $this->db->from('tbl_user as user');
        $this->db->join('tbl_simpan as simpan', 'user.id_user = simpan.id_user', 'left');
        $this->db->where('user.id_user', $id);
        $this->db->group_by('user.id_user');
        $query = $this->db->get();
        return $query->row();
    }

    public function simpan($id) {
        $this->db->select('simpan.*, (simpan.sukarela+simpan.wajib) as saldo');
        $this->db->from('tbl_simpan as simpan');
        $this->db->join('tbl_user as user', 'simpan.id_user = user.id_user');
        $this->db->where('simpan.id_user', $id);
        $this->db->order_by('tanggal', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function pinjam_id($id) {
        $this->db->select('user.id_user, user.kode_anggota, user.nama, pinjam.*');
        $this->db->from('tbl_user as user');
        $this->db->join('tbl_pinjam as pinjam', 'user.id_user = pinjam.id_user');
        $this->db->where('user.id_user', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function history_pinjam($id) {
        $this->db->select('history.*');
        $this->db->from('tbl_history_pinjam as history');
        $this->db->join('tbl_pinjam as pinjam', 'pinjam.id_pinjam = history.id_pinjam');
        $this->db->where('history.id_pinjam', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function pinjaman_anggota($id) {
        $this->db->select('user.id_user, user.kode_anggota, user.nama, pinjam.*');
        $this->db->from('tbl_user as user');
        $this->db->join('tbl_pinjam as pinjam', 'user.id_user = pinjam.id_user');
        $this->db->where('user.id_user', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function shu($id) {
        $this->db->select('nilai_shu');
        $this->db->from('tbl_shu');
        $this->db->where('id_user', $id);
        $this->db->where('periode = YEAR(curdate())-1');
        $query = $this->db->get();
        return $query->row();
    }

}
