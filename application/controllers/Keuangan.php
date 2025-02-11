<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Model_keuangan');
        cek_login();
		is_keuangan();
    }
    
    public function index() {
        $data['judul'] = 'Dashboard | Keuangan';
        $data['transaksi_masuk'] = count($this->Model_keuangan->pengeluaran());
        $data['transaksi_keluar'] = count($this->Model_keuangan->pemasukan());
        $data['daftar_anggota'] = count($this->Model_keuangan->anggota());
        $this->load->view('keuangan/dashboard', $data);
    }

    public function profile() {
        $data['judul'] = 'Profile | Keuangan';
		$data['profile'] = $this->Model_keuangan->profile($this->session->userdata('login_session')['id_user']);
		$this->load->view('profile/profile', $data);
	}

	public function edit_profile() {
        $data['judul'] = 'Edit Profile | Keuangan';
		$data['profile'] = $this->Model_keuangan->profile($this->session->userdata('login_session')['id_user']);
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
		redirect('keuangan/profile');
	}

    public function simpan() {
        $data['judul'] = 'Data Simpanan Anggota | Keuangan';
        $data['simpanan_anggota'] = $this->Model_keuangan->simpanan_anggota();
        $this->load->view('keuangan/simpan', $data);
    }

    public function pinjam() {
        $data['judul'] = 'Data Pinjaman Anggota | Keuangan';
        $data['pinjaman_anggota'] = $this->Model_keuangan->pinjaman_anggota();
        $this->load->view('keuangan/pinjam', $data);
    }

    public function history_pinjam($id) {
        $data['judul'] = 'Data Pinjaman Anggota | Keuangan';
        $data['pinjaman'] = $this->Model_keuangan->pinjam_id($id);
        $data['history_pinjam'] = $this->Model_keuangan->history_pinjam($id);
        
        
        $this->load->view('keuangan/history_pinjam', $data);
    }

    public function aksi_pinjam_lunas($id) {
        $data = array("status" => 1);

        $this->db->where('id_pinjam', $id);
        $this->db->update("tbl_pinjam", $data);
        redirect('keuangan/history_pinjam/'.$id);
    }

    public function history_simpan($id) {
        $data['judul'] = 'History Simpanan Anggota | Keuangan';
        $data['simpanan'] = $this->Model_keuangan->simpanan_anggota_id($id);
        $data['history_simpan'] = $this->Model_keuangan->history_simpan($id);
        
        $this->load->view('keuangan/history_simpan', $data);
    }

    public function anggota() {
        $data['judul'] = 'Daftar Anggota | Keuangan';
        $data['anggota'] = $this->Model_keuangan->anggota();
      
        $this->load->view('keuangan/anggota', $data);
    }
    
    public function transaksi_pembelian() {
        $data['judul'] = 'Daftar Transaksi Pembelian | Keuangan';
        $data['pembelian'] = $this->Model_keuangan->pembelian();
        $this->load->view('keuangan/transaksi_pembelian', $data);
    }

    public function transaksi_pembelian_kredit() {
        $data['judul'] = 'Daftar Transaksi Pembelian | Keuangan';
        $data['pembelian'] = $this->Model_keuangan->pembelian_kredit();
        $this->load->view('keuangan/transaksi_pembelian', $data);
    }

    public function voucher_keluar() {
        $data['judul'] = 'Daftar Voucher Keluar | Keuangan';
        $data['penjualan'] = $this->Model_keuangan->voucher_keluar();
       
        $this->load->view('keuangan/voucher_keluar', $data);
    }

    public function pengeluaran() {
        $data['judul'] = 'Daftar Pengeluaran | Keuangan';
        $data['pengeluaran'] = $this->Model_keuangan->pengeluaran();
        $this->load->view('keuangan/pengeluaran', $data);
    }

    public function pemasukan() {
        $data['judul'] = 'Daftar Pemasukan Global | Keuangan';
        $data['pemasukan'] = $this->Model_keuangan->pemasukan_global();
        
        $this->load->view('keuangan/pemasukan_global', $data);
    }

    public function penjualan() {
        $data['judul'] = 'Daftar Penjualan | Keuangan';
        $data['penjualan'] = $this->Model_keuangan->penjualan();
        $this->load->view('keuangan/penjualan', $data);
    }

    public function aksi_input_pemasukan() {
        $deskripsi_pemasukan = $this->input->post('deskripsi_pemasukan');
        $total_pemasukan = $this->input->post('total_pemasukan');
        $tanggal = $this->input->post('tanggal');

        $data = array(
            'deskripsi_pemasukan' => $deskripsi_pemasukan,
            'total_pemasukan' => $total_pemasukan,
            'tanggal' => $tanggal
        );
        $this->Model_keuangan->aksi_input_pemasukan($data);
        redirect('keuangan/pemasukan');
    }

    public function aksi_simpanan() {
        $wajib = $this->input->post('wajib');
        $sukarela = $this->input->post('sukarela');
        $tanggal = $this->input->post('tanggal');
        $kode_anggota = $this->input->post('kode_anggota');

        $id_user = $this->Model_keuangan->get_id_user($kode_anggota);

        $data = array(
            'id_user'   => $id_user,
            'wajib' => $wajib,
            'sukarela' => $sukarela,
            'tanggal' => $tanggal
        );

        $this->Model_keuangan->aksi_simpanan($data);
        redirect('keuangan/simpan');
    }

    public function shu() {
        $data['judul'] = 'Pembagian SHU | Keuangan';
        $data['anggota'] = $this->Model_keuangan->shu();  
        $this->load->view('keuangan/shu', $data);
    }

    public function laba_rugi() {
        $data['judul'] = 'Daftar Pengeluaran | Keuangan';
        $data['pemasukan'] = $this->Model_keuangan->laba();
        $data['pengeluaran'] = $this->Model_keuangan->rugi();
        
        
        $this->load->view('keuangan/laba_rugi', $data);
    }

    public function belanja_anggota() {
        $data['judul'] = 'Daftar Belanja Anggota | Keuangan';
        $data['belanja'] = $this->Model_keuangan->belanja_anggota();
        $data['total_jenis_transaksi'] = $this->Model_keuangan->total_jenis_transaksi();
        $data['voucher_anggota'] = $this->Model_keuangan->voucher_anggota();
        $this->load->view('keuangan/belanja_anggota', $data);
    }

    public function aksi_tambah_pinjam() {
        $data = array(
            'id_user'  => $this->Model_keuangan->get_id_user($this->input->post('kode_anggota')),
            'jatuh_tempo'  => $this->input->post('jatuh_tempo'),
            'tanggal_pinjam'  => $this->input->post('tanggal'),
            'pinjaman'  => $this->input->post('pinjaman'),
            'status'    => 0
        );
        $this->Model_keuangan->aksi_pinjaman($data);
        redirect('keuangan/pinjam');
        
    }

    public function aksi_bayar_pinjam($id) {
        $data = array(
            'id_pinjam' => $id,
            'tanggal_history_pinjam' => $this->input->post('tanggal_history_pinjam'),
            'bunga' => $this->input->post('bunga'),
            'angsuran' => $this->input->post('angsuran')
        );
        $this->Model_keuangan->aksi_bayar_pinjam($data);
        redirect('keuangan/history_pinjam/'.$id);
    }

    public function update_history_pinjam($id) {
        $data = array(
            'tanggal_history_pinjam' => $this->input->post('tanggal_history_pinjam'),
            'bunga' => $this->input->post('bunga'),
            'angsuran' => $this->input->post('angsuran')
        );
        $id_pinjam = $this->Model_keuangan->history_pinjam_id($id)->id_pinjam;
        $this->db->where('id_history_pinjam', $id);
        $this->db->update('tbl_history_pinjam', $data);
        redirect('keuangan/history_pinjam/'.$id_pinjam);
    }

    public function update_history_simpan($id) {
        $data = array(
            'wajib' => $this->input->post('wajib'),
            'sukarela' => $this->input->post('sukarela'),
            'tanggal' => $this->input->post('tanggal')
        );
        $id_user = $this->Model_keuangan->history_simpan_id($id)->id_user;
        $this->db->where('id_simpan', $id);
        $this->db->update('tbl_simpan', $data);
        redirect('keuangan/history_simpan/'.$id_user);
    }

    public function update_shu() {
        $id_user = $this->input->post('id_user');
        $periode = $this->input->post('periode');
        $nilai_shu = $this->input->post('nilai_shu');
        
        for ($i=0;$i<count($nilai_shu);$i++) {
            if($nilai_shu[$i] != null) {
                
                $this->db->where('periode', $periode[$i]);
                $this->db->where('id_user', $id_user[$i]);
                $this->db->update('tbl_shu', array('nilai_shu'  => $nilai_shu[$i]));
            }
        }

        redirect('keuangan/shu');
        
    }

    public function generate_periode() {
        $anggota = $this->Model_keuangan->anggota();
        $periode = $this->input->post('input_periode');
        foreach ($anggota as $anggota) {
            $data = array(
                'id_user' => $anggota->id_user,
                'periode' => $periode,
                'nilai_shu' => null
            );
            // print_r($data);
            $this->Model_keuangan->generate_periode_shu($data);
        }
        redirect('keuangan/shu');
    }


    public function input_shu($id) {
        $nilai_shu = $this->input->post('nilai_shu');
        
        $data = array(
            'nilai_shu' => $nilai_shu,
            'id_user'    => $id,
            'periode' =>   date('Y')
        );
        $this->Model_keuangan->input_shu($data);
        redirect('keuangan/shu');
        
    }

    public function verifikasi_lunas($id) {
        $data = array('status_kredit' => 1);
        $this->db->where('id_pembelian', $id);
        $this->db->update('tbl_pembelian', $data);
        redirect('keuangan/transaksi_pembelian_kredit');
    }

    public function history_pinjam_id($id) {
        $data = $this->Model_keuangan->history_pinjam_id($id);
        echo json_encode($data);
    }

    public function history_simpan_id($id) {
        $data = $this->Model_keuangan->history_simpan_id($id);
        echo json_encode($data);
    }

    public function pembelian_kredit_id($id) {
        $data = $this->Model_keuangan->pembelian_kredit_id($id);
        echo json_encode($data);
    }

    public function anggota_all() {
        $data = $this->Model_keuangan->anggota();
        echo json_encode($data);
    }


}