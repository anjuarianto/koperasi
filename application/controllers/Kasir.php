<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model('Model_kasir');
        is_kasir();
    }

    public function index() {
        // $data['judul'] = 'Dashboard | Kasir';
		// $data['stok'] = $this->Model_kasir->jumlah_total_stok();
		// $data['jumlah_transaksi'] = $this->Model_kasir->jumlah_transaksi();
		// $data['barang'] = count($this->Model_kasir->barang());
        // $this->load->view('kasir/dashboard', $data);
        $data['judul'] = 'Tampilan Kasir | Kasir';
        $data['barang'] = $this->Model_kasir->barang();
        $data['anggota'] = $this->Model_kasir->anggota();
        $this->load->view('kasir/transaksi', $data);
    }

    public function transaksi() {
        $data['judul'] = 'Tampilan Kasir | Kasir';
        $data['barang'] = $this->Model_kasir->barang();
        $data['anggota'] = $this->Model_kasir->anggota();
        $this->load->view('kasir/transaksi', $data);
    }

    public function bayar() {

        $kode_anggota = $this->input->post('kode_anggota');
        $jenis_pembayaran = $this->input->post('jenis_pembayaran');
        $nominal_uang = $this->input->post('nominal_uang');
        $id_barang = $this->input->post('id_barang');
        $jumlah_barang = $this->input->post('jumlah_barang');
    
        $harga_total_barang = 0;
        // hitung harga total barang
        for($i=0;$i<count($id_barang);$i++) {
            $harga_total_barang += $this->Model_kasir->barang_id($id_barang[$i])['harga_jual'];
        };
        
        $kembalian = $nominal_uang - $harga_total_barang;

        $penjualan = array(
            'kode_anggota'    => $kode_anggota,
            'harga_total_barang'    => $harga_total_barang,
            'jenis_pembayaran'     => $jenis_pembayaran,
            'nominal_uang'     => $nominal_uang,
            'kembalian'        => $kembalian,
            'user'  => $this->session->userdata('login_session')['id_user']
        );
       
        $this->Model_kasir->tambah_penjualan($penjualan);

        $last_id = $this->db->insert_id();
        for($i=0;$i<count($id_barang);$i++) {
            $detail_penjualan = array(
                'id_penjualan' => $last_id,
                'id_barang' => $id_barang[$i],
                'jumlah_barang' => $jumlah_barang[$i]
            );

            

            $this->Model_kasir->tambah_detail_penjualan($detail_penjualan);
            $result = $this->Model_kasir->get_stok($id_barang[$i]);
            $updateStok = $result['stok_barang'] - $jumlah_barang[$i];
            $data = array('stok_barang' => $updateStok);
            $this->Model_kasir->update_stok($id_barang[$i], $data);
        }
        
        redirect('kasir');
    }

    public function penjualan() {
        $data['judul'] = "Daftar Penjualan | Kasir";
        $data['penjualan'] = $this->Model_kasir->penjualan();
        $this->load->view('kasir/penjualan', $data);
    }

    public function barang() {
        $data['judul'] = "Daftar Barang | Kasir";
        $data['barang'] = $this->Model_kasir->detail_barang();
        $this->load->view('kasir/barang', $data);
    }

    public function barang_kode($input) {
		$data = $this->Model_kasir->barang_kode($input);
		echo json_encode($data);
	}

    public function barang_id($id) {
		$data = $this->Model_kasir->barang_id($id);
		echo json_encode($data);
	}

    public function anggota_kode($input) {
        $data = $this->Model_kasir->anggota_kode($input);
        echo json_encode($data);
    }

    public function barang_all() {
        $data = $this->Model_kasir->barang_all();
        echo json_encode($data);
    }

    public function anggota_all() {
        $data = $this->Model_kasir->anggota_all();
        echo json_encode($data);
    }

}