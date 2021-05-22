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
        $data['no_struk'] = $this->Model_kasir->last_penjualan();
        $data['barang'] = $this->Model_kasir->barang();
        $data['anggota'] = $this->Model_kasir->anggota();
        $this->load->view('kasir/transaksi', $data);
    }

    public function profile() {
		$data = $this->Model_kasir->profile($this->session->userdata('login_session')['id_user']);
		$this->load->view('profile/profile', $data);
	}

	public function edit_profile() {
		$data = $this->Model_kasir->profile($this->session->userdata('login_session')['id_user']);
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
		redirect('kasir/profile');
	}

    

    public function bayar() {
        // Deklarasi variable
        $kode_anggota = $this->input->post('kode_anggota');
        $jenis_pembayaran = $this->input->post('jenis_pembayaran');
        $nominal_uang = preg_replace('/\D/', '', $this->input->post('nominal_uang'));
        $id_barang = $this->input->post('id_barang');
        $jumlah_barang = $this->input->post('jumlah_barang');
        $id_voucher = $this->input->post('id_voucher');

        // Deklarasi Voucher
        if($id_voucher) {
            $voucher = implode(',', $id_voucher);
        } else {
            $voucher = null;
        }
  
        // Data insert ke table penjualan
        $penjualan = array(
            'kode_anggota'    => $kode_anggota,
            'jenis_pembayaran'     => $jenis_pembayaran,
            'nominal_uang'     => $nominal_uang,
            'kode_voucher'           => $voucher,
            'user'  => $this->session->userdata('login_session')['id_user']
        );

        for($i=0;$i<count($id_voucher);$i++) {
            $data_voucher = array('status' => 1);
            $this->Model_kasir->update_voucher($id_voucher[$i], $data_voucher);
        };
        $this->Model_kasir->tambah_penjualan($penjualan);

        // Data insert ke table Detail Penjualan
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
            $this->Model_kasir->update_stok($result['id_stok'], $data);
        }
        redirect('kasir');
    }

    public function penjualan() {
        $data['judul'] = "Daftar Penjualan | Kasir";
        $data['penjualan'] = $this->Model_kasir->penjualan($this->session->userdata('login_session')['id_user']);
        $this->load->view('kasir/penjualan', $data);
    }

    public function update_penjualan($id) {
        $kode_voucher = $this->input->post('kode_voucher');
        $nominal_uang = preg_replace('/\D/', '', $this->input->post('nominal_uang'));
        if($kode_voucher != $this->Model_kasir->get_voucher($id)) {
            $voucher = explode(',', $this->Model_kasir->get_voucher($id));
            for($i=0;$i<count($voucher);$i++) {
                $data_voucher = array('status' => 0);
                $this->Model_kasir->update_voucher($voucher[$i], $data_voucher);
            }
        }
        $data = array (
            'kode_voucher' => $kode_voucher,
            'nominal_uang' => $nominal_uang,
            'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
            'tgl_penjualan' => $this->input->post('tgl_penjualan')
        );

        $array_voucher = explode(',', $kode_voucher);

        for($i=0;$i<count($array_voucher);$i++) {
            $data_vouchery = array('status' => 1);
            $this->Model_kasir->update_voucher($array_voucher[$i], $data_vouchery);
        }
        
        $this->Model_kasir->update_penjualan($id, $data);
        redirect('kasir/detail_penjualan/'.$id);
    }

    public function update_detail_penjualan($id) {

        // Update Detail Penjualan
        $jumlah_barang = $this->input->post('jumlah_barang');
        $id_barang = $this->Model_kasir->detail_penjualan_id($id)->id_barang;
        $jumlahawal = $this->Model_kasir->detail_penjualan_id($id)->jumlah_barang;
        
        $data = array(
            'jumlah_barang' => $jumlah_barang
        );

        $id_penjualan = $this->Model_kasir->detail_penjualan_id($id)->id_penjualan;
		$this->Model_kasir->update_detail_penjualan($id, $data);

        // Update Stok
        $result = $this->Model_kasir->get_stok($id_barang);
        $updateStok = ($result['stok_barang'] + $jumlahawal) - $jumlah_barang;
     
        $data = array('stok_barang' => $updateStok);
        $this->Model_kasir->update_stok($result['id_stok'], $data);

		redirect('kasir/detail_penjualan/'.$id_penjualan);
    }

    public function detail_penjualan($id) {
        $data['judul'] = "Detail Penjualan | Kasir";
        $data['penjualan'] = $this->Model_kasir->penjualan_id($id);
        $data['detail_penjualan'] = $this->Model_kasir->detail_penjualan($id);
        $this->load->view('kasir/detail_penjualan', $data);
    }

    public function barang() {
        $data['judul'] = "Daftar Barang | Kasir";
        $data['barang'] = $this->Model_kasir->detail_barang();
        $this->load->view('kasir/barang', $data);
    }

    public function voucher() {
        $data['judul'] = "Daftar Voucher | Kasir";
        $data['voucher'] = $this->Model_kasir->voucher();
        $this->load->view('kasir/voucher', $data);
    }

    public function cetak_struk() {
        $this->load->view('kasir/cetak_struk');
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

    public function penjualan_id($id) {
        $data = $this->Model_kasir->penjualan_id($id);
        echo json_encode($data);
    }

    public function detail_penjualan_id($id) {
        $data = $this->Model_kasir->detail_penjualan_id($id);
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

    public function voucher_id($input) {
        $data = $this->Model_kasir->voucher_id($input);
        echo json_encode($data);
    }

}