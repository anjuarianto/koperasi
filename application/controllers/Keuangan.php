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
        $this->load->view('keuangan/simpan');
    }

    public function pinjam() {
        $data['judul'] = 'Data Pinjaman Anggota | Keuangan';
        $this->load->view('keuangan/pinjam', $data);
    }

    public function anggota() {
        $data['judul'] = 'Daftar Anggota | Keuangan';
        $data['anggota'] = $this->Model_keuangan->anggota();
        $this->load->view('keuangan/anggota', $data);
    }
    
    public function pengeluaran() {
        $data['judul'] = 'Daftar Pengeluaran | Keuangan';
        $data['pengeluaran'] = $this->Model_keuangan->pengeluaran();
        $this->load->view('keuangan/pengeluaran', $data);
    }

    public function pemasukan() {
        $data['judul'] = 'Daftar Pemasukan | Keuangan';
        $data['pemasukan'] = $this->Model_keuangan->pemasukan();
        $this->load->view('keuangan/pemasukan', $data);
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