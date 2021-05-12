<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Model_keuangan');
    }
    
    public function index() {
        $data['judul'] = 'Dashboard | Keuangan';
        $data['transaksi_masuk'] = count($this->Model_keuangan->pengeluaran());
        $data['transaksi_keluar'] = count($this->Model_keuangan->pemasukan());
        $data['daftar_anggota'] = count($this->Model_keuangan->anggota());
        $this->load->view('keuangan/dashboard', $data);
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

    public function verifikasi_kredit() {
        
    }

    public function pengeluaran() {
        $data['judul'] = 'Daftar Pengeluaran | Keuangan';
        $data['pengeluaran'] = $this->Model_keuangan->pengeluaran();
        $this->load->view('keuangan/pengeluaran', $data);
    }

    // public function pemasukan() {
    //     $data['judul'] = 'Daftar Pemasukan | Keuangan';
    //     $data['pemasukan'] = $this->Model_keuangan->pemasukan();
    //     $this->load->view('keuangan/pemasukan', $data);
    // }

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
        $this->load->view('keuangan/laba_rugi');
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

    


}