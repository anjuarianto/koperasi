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
        $data['judul'] = 'Profile | Kasir';
		$data['profile'] = $this->Model_kasir->profile($this->session->userdata('login_session')['id_user']);
		$this->load->view('profile/profile', $data);
	}

	public function edit_profile() {
        $data['judul'] = 'Edit Profile | Kasir';
		$data['profile'] = $this->Model_kasir->profile($this->session->userdata('login_session')['id_user']);
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
            for($i=0;$i<count($id_voucher);$i++) {
                $data_voucher = array('status' => 1);
                $this->Model_kasir->update_voucher($id_voucher[$i], $data_voucher);
            };
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
        $this->cetak_struk($id_barang, $jumlah_barang);
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

    public function cetak_struk($id_barang, $qty) {
        // var_dump($id_barang);
        // var_dump($qty);
        // die;
        $this->load->library('escpos');

        $nama_printer = "printer_a";
        // membuat connector printer ke shared printer bernama "printer_a" (yang telah disetting sebelumnya)
        $connector = new Escpos\PrintConnectors\WindowsPrintConnector($nama_printer);
 
        // membuat objek $printer agar dapat di lakukan fungsinya
        $printer = new Escpos\Printer($connector);
 
        // membuat fungsi untuk membuat 1 baris tabel, agar dapat dipanggil berkali-kali dgn mudah
        function buatBaris4Kolom($kolom1, $kolom2, $kolom3, $kolom4) {
            // Mengatur lebar setiap kolom (dalam satuan karakter)
            $lebar_kolom_1 = 12;
            $lebar_kolom_2 = 8;
            $lebar_kolom_3 = 8;
            $lebar_kolom_4 = 9;
 
            // Melakukan wordwrap(), jadi jika karakter teks melebihi lebar kolom, ditambahkan \n 
            $kolom1 = wordwrap($kolom1, $lebar_kolom_1, "\n", true);
            $kolom2 = wordwrap($kolom2, $lebar_kolom_2, "\n", true);
            $kolom3 = wordwrap($kolom3, $lebar_kolom_3, "\n", true);
            $kolom4 = wordwrap($kolom4, $lebar_kolom_4, "\n", true);
 
            // Merubah hasil wordwrap menjadi array, kolom yang memiliki 2 index array berarti memiliki 2 baris (kena wordwrap)
            $kolom1Array = explode("\n", $kolom1);
            $kolom2Array = explode("\n", $kolom2);
            $kolom3Array = explode("\n", $kolom3);
            $kolom4Array = explode("\n", $kolom4);
 
            // Mengambil jumlah baris terbanyak dari kolom-kolom untuk dijadikan titik akhir perulangan
            $jmlBarisTerbanyak = max(count($kolom1Array), count($kolom2Array), count($kolom3Array), count($kolom4Array));
 
            // Mendeklarasikan variabel untuk menampung kolom yang sudah di edit
            $hasilBaris = array();
 
            // Melakukan perulangan setiap baris (yang dibentuk wordwrap), untuk menggabungkan setiap kolom menjadi 1 baris 
            for ($i = 0; $i < $jmlBarisTerbanyak; $i++) {
 
                // memberikan spasi di setiap cell berdasarkan lebar kolom yang ditentukan, 
                $hasilKolom1 = str_pad((isset($kolom1Array[$i]) ? $kolom1Array[$i] : ""), $lebar_kolom_1, " ");
                $hasilKolom2 = str_pad((isset($kolom2Array[$i]) ? $kolom2Array[$i] : ""), $lebar_kolom_2, " ");
 
                // memberikan rata kanan pada kolom 3 dan 4 karena akan kita gunakan untuk harga dan total harga
                $hasilKolom3 = str_pad((isset($kolom3Array[$i]) ? $kolom3Array[$i] : ""), $lebar_kolom_3, " ", STR_PAD_LEFT);
                $hasilKolom4 = str_pad((isset($kolom4Array[$i]) ? $kolom4Array[$i] : ""), $lebar_kolom_4, " ", STR_PAD_LEFT);
 
                // Menggabungkan kolom tersebut menjadi 1 baris dan ditampung ke variabel hasil (ada 1 spasi disetiap kolom)
                $hasilBaris[] = $hasilKolom1 . " " . $hasilKolom2 . " " . $hasilKolom3 . " " . $hasilKolom4;
            }
 
            // Hasil yang berupa array, disatukan kembali menjadi string dan tambahkan \n disetiap barisnya.
            return implode($hasilBaris, "\n") . "\n";
        }   
 
        // Membuat judul
        $printer->initialize();
        $printer->selectPrintMode(Escpos\Printer::MODE_DOUBLE_HEIGHT); // Setting teks menjadi lebih besar
        $printer->setJustification(Escpos\Printer::JUSTIFY_CENTER); // Setting teks menjadi rata tengah
        $printer->text("Nama Toko\n");
        $printer->text("\n");
 
        // Data transaksi
        $nama_kasir = $this->session->userdata('login_session')['name'];
        $printer->initialize();
        $printer->text("Kasir : ".$nama_kasir."\n");
        $printer->text("Waktu : ".date("d-m-Y h:i:s")."\n");
 
        // Membuat tabel
        $printer->initialize(); // Reset bentuk/jenis teks
        $printer->text("----------------------------------------\n");
        $printer->text(buatBaris4Kolom("Barang", "qty", "Harga", "Subtotal"));
        $printer->text("----------------------------------------\n");
        $total = 0;
        for($i=0;$i<count($id_barang);$i++) {
            $nama_barang = $this->Model_kasir->barang_id($id_barang[$i])["nama_barang"];
            $harga_jual = $this->Model_kasir->barang_id($id_barang[$i])["harga_jual"];
            $sub_total = (int)$qty[$i] * (int)$harga_jual;
            $total += $sub_total;
            $printer->text(buatBaris4Kolom($nama_barang, $qty[$i], $harga_jual, $sub_total));
        };
        
        
        $printer->text("----------------------------------------\n");
        $printer->text(buatBaris4Kolom('', '', "Total", $total));
        $printer->text("\n");
 
         // Pesan penutup
        $printer->initialize();
        $printer->setJustification(Escpos\Printer::JUSTIFY_CENTER);
        $printer->text("Terima kasih telah berbelanja\n");
 
        $printer->feed(5); // mencetak 5 baris kosong agar terangkat (pemotong kertas saya memiliki jarak 5 baris dari toner)
        $printer->close();
        
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