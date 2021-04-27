<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_admin');
        is_admin();
    }

    // get function 
    public function index() {
        $data['judul'] = 'Dashboard | Admin';
        $data['dashboard_admin'] = array(
            'jumlah_barang' => count($this->Model_admin->barang()),
            'jumlah_supplier' => count($this->Model_admin->supplier()),
            'jumlah_user' => count($this->Model_admin->user()),
            'jumlah_voucher' => 'belum ada',
            'jumlah_transaksi_keluar' => count($this->Model_admin->pengeluaran()),
            'jumlah_transaksi_masuk' => count($this->Model_admin->pemasukan())
        );
        $this->load->view('admin/dashboard', $data);
    }

    public function barang() {
        $data['judul'] = 'Daftar Barang | Admin';
        $data['barang'] = $this->Model_admin->detail_barang();
        $this->load->view('admin/barang', $data);
    }

    public function supplier() {
        $data['judul'] = 'Daftar Supplier | Admin';
        $data['supplier'] = $this->Model_admin->supplier();
        $this->load->view('admin/supplier', $data);
    }

    public function voucher() {
        $data['judul'] = 'Daftar Voucher | Admin';
        $this->load->view('admin/voucher', $data);
    }

    public function user() {
        $data['judul'] = 'Daftar User | Admin';
        $data['user'] = $this->Model_admin->user();
        $this->load->view('admin/user', $data);
    }

    public function pemasukan() {
        $data['judul'] = 'Daftar Pemasukan | Admin';
        $data['penjualan'] = $this->Model_admin->pemasukan();
        $this->load->view('admin/pemasukan', $data);
    }

    public function pengeluaran() {
        $data['judul'] = 'Daftar Penjualan | Admin';
        $data['pembelian'] = $this->Model_admin->pengeluaran();
        $this->load->view('admin/pengeluaran', $data);
    }

     
}