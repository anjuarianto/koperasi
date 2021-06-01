<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Model_anggota');
        is_anggota();
    }
    
    public function index() {
        $data['judul'] = 'Dashboard | Anggota';
        $id_user = $this->session->userdata('login_session')['id_user'];
        $data['saldo_simpan'] = $this->Model_anggota->saldo_simpan($id_user);
        $data['saldo_pinjam'] = $this->Model_anggota->saldo_pinjam($id_user);
        $data['shu'] = $this->Model_anggota->shu($id_user);
        $this->load->view('anggota/dashboard', $data);
    }

    public function history_transaksi() {
        $data['judul'] = 'History Transaksi';
        $data['transaksi'] = $this->Model_anggota->history_transaksi($this->session->userdata('login_session')['kode_anggota']);
        $this->load->view('anggota/history_transaksi', $data);
    }

    public function profile() {
		$data = $this->Model_anggota->profile($this->session->userdata('login_session')['id_user']);
		$this->load->view('profile/profile', $data);
	}

	public function edit_profile() {
		$data = $this->Model_anggota->profile($this->session->userdata('login_session')['id_user']);
		$this->load->view('profile/edit_profile', $data);
	}

	public function aksi_edit_profile($id) {
		$data = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'satuan' => $this->input->post('satuan'),
			'jabatan' => $this->input->post('jabatan'),
		);
		$this->db->where('id_user', $id);
		$this->db->update('tbl_user', $data);
		redirect('anggota/profile');
	}

    public function simpan() {
        $data['judul'] = 'History Simpanan | Anggota';
        $id_user = $this->session->userdata('login_session')['id_user'];
        $data['simpanan'] = $this->Model_anggota->simpanan_id($id_user);
        $data['history_simpan'] = $this->Model_anggota->simpan($id_user);
        $this->load->view('anggota/simpan', $data);
    }

    public function pinjam() {
        $data['judul'] = 'History Pinjam | Anggota';
        $id_user = $this->session->userdata('login_session')['id_user'];
        $data['pinjaman_anggota'] = $this->Model_anggota->pinjaman_anggota($id_user);
        $this->load->view('anggota/pinjam', $data);
    }

    public function detail_pinjam($id) {
        $data['judul'] = 'Detail Pinjam | Anggota';
        $id_user = $this->session->userdata('login_session')['id_user'];
        $data['pinjaman'] = $this->Model_anggota->pinjam_id($id_user);
        $data['history_pinjam'] = $this->Model_anggota->history_pinjam($id);
        
        $this->load->view('anggota/history_pinjam', $data);
    }

}
?>