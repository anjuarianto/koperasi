<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Model_gudang');
		cek_login();
		is_operator();
	}

	public function index() {
		$data['judul'] = 'Dashboard | Gudang';
		$data['stok'] = $this->Model_gudang->jumlah_total_stok();
		$data['jumlah_transaksi'] = $this->Model_gudang->jumlah_transaksi();
		$data['supplier'] = count($this->Model_gudang->supplier());
		$data['barang'] = count($this->Model_gudang->barang());
		$data['stok_expired'] = $this->Model_gudang->stok_expired();
		$data['transaksi_kredit'] = $this->Model_gudang->transaksi_kredit();
		$data['stok_akan_habis'] = $this->Model_gudang->stok_akan_habis();
		$data['return_terakhir'] = $this->Model_gudang->return_terakhir();
		
		$data["script"] = "";
		$this->load->view('gudang/dashboard',$data);
	}

	public function stok() {
		$data['judul'] = 'Daftar Stok | Gudang';
		$data["script"] = "";
		$data['stok'] = $this->Model_gudang->stok_barang();
		$this->load->view('gudang/stok', $data);
	}

	public function barang() {
		$data['judul'] = 'Daftar Barang | Gudang';
		$data['barang'] = $this->Model_gudang->detail_barang();
		$data['supplier'] = $this->Model_gudang->supplier();
		$data["script"] = "";
		$this->load->view('gudang/barang', $data);
		
	}

	public function aksi_tambah_barang() {

		// validation start
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
		$this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required');
		$this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required');
		$this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required');
		

		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		
		// validation end
		
		// variable declaration start

		$nama_barang = $this->input->post('nama_barang');
		$id_supplier = $this->input->post('nama_supplier');
		$kode_barang = $this->input->post('kode_barang');
		$harga_beli = $this->input->post('harga_beli');
		$harga_jual = $this->input->post('harga_jual');
		// variable declaration end

		if ($this->form_validation->run()==true) {
			$data = array(
				"nama_barang"	=> $nama_barang,
				"kode_barang"	=> $kode_barang,
				"id_supplier"	=> $id_supplier,
				"harga_beli"	=> $harga_beli,
				"harga_jual"	=> $harga_jual
			);
			$this->Model_gudang->tambah_barang($data);
			redirect('gudang/barang');
		} else {
			$data["barang"] = $this->Model_gudang->barang();
			$data['supplier'] = $this->Model_gudang->supplier();
			$data["script"] = "$('#modalInputBarang').modal('show');";
			$this->load->view('gudang/barang', $data);
		}

	}

	public function supplier() {
		$data['judul'] = 'Daftar Supplier | Gudang';
		if($this->uri->segment(3)) {
			
			$data["script"] = "$('#modalInputSupplier').modal('show');";
			$data["supplier"] = $this->Model_gudang->supplier();
			$this->load->view('gudang/supplier', $data);
		} else {
			$data["script"] = "";
			$data["supplier"] = $this->Model_gudang->supplier();
			$this->load->view('gudang/supplier', $data);
		}
			
		
		
	}

	public function aksi_tambah_supplier() {

		// validation form
		$this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		// declaration variable
		$nama_supplier = $this->input->post('nama_supplier');
		$alamat = $this->input->post('alamat');

		if($this->form_validation->run() == true) {
			$data = array(
				"nama_supplier"	=> $nama_supplier,
				"alamat"		=> $alamat
			);

			$this->Model_gudang->tambah_supplier($data);
			redirect('gudang/supplier');

		} else {
			$data["script"] = "";
			$data["supplier"] = $this->Model_gudang->supplier();
			$this->load->view('gudang/supplier');
		}
		
	
	}

	public function pembelian() {
		$data['judul'] = 'Daftar Pembelian | Gudang';
		$data["pembelian"] = $this->Model_gudang->pembelian();
		$data["supplier"] = $this->Model_gudang->supplier();
		$data["barang"] = $this->Model_gudang->barang();
		$data["script"] = "";

		$this->load->view('gudang/pembelian', $data);
	}

	public function detail_pembelian($id) {
		$data["judul"] = "Detail Pembelian | Gudang";
		$data["script"] = "";
		$data["pembelian"] = $this->Model_gudang->pembelian_id($id);
		$data["detail_pembelian"] = $this->Model_gudang->detail_pembelian($id);
		$this->load->view('gudang/detail_pembelian', $data);
	}

	public function aksi_tambah_pembelian() {
		$tanggal_pembelian = $this->input->post("tanggal_pembelian");
		$total_harga_pembelian = $this->input->post("total_harga_pembelian");
		$no_faktur = $this->input->post('no_faktur');
		$ppn = $this->input->post('ppn');
		$jenis_pembayaran = $this->input->post('jenis_pembayaran');
		$id_barang = $this->input->post('id_barang');
		$jumlah_barang = $this->input->post('jumlah_barang');
		$harga_total_barang = $this->input->post('harga_total_barang');
		$tanggal_expired = $this->input->post('tanggal_expired');
		$discount = $this->input->post('discount');
        
		
		$pembelian = array(
			'tgl_pembelian' => $tanggal_pembelian,
			'no_faktur' => $no_faktur,
			'jenis_pembayaran' => $jenis_pembayaran,
			'ppn' => $ppn,
			'user' => $this->session->userdata('login_session')['id_user']
		);
		
		$this->Model_gudang->tambah_pembelian($pembelian);
		$last_id = $this->db->insert_id();
		
		
		for($i=0;$i<count($id_barang);$i++) {
			$detail_barang = array(
				"id_pembelian" => $last_id,
				"id_barang" => $id_barang[$i],
				"discount"	=> $discount[$i],
				"jumlah_barang" => $jumlah_barang[$i]
			);
			// print_r($detail_barang);
			$this->Model_gudang->tambah_detail_pembelian($detail_barang);
			$stok = array(
				"id_barang"	=> $id_barang[$i],
				"id_pembelian" => $last_id,
				"stok_barang" => $jumlah_barang[$i],
				"tanggal_pembelian" => $tanggal_pembelian,
				"tanggal_expired"	=> $tanggal_expired[$i]
			);
			$this->Model_gudang->tambah_stok($stok);	
		}
	
		redirect('gudang/pembelian');
	}

	function return_barang($id) {
		$tanggal_return = date('Y-m-d');
		$data = array(
			'tanggal_return'	=> $tanggal_return
		);
		$this->Model_gudang->return_barang($id, $data);
		redirect('gudang/stok');
	}

	public function update_supplier($id) {
		$data = array(
			'nama_supplier' => $this->input->post('nama_supplier'),
			'alamat' => $this->input->post('alamat')
		);
		$this->Model_gudang->update_supplier($id, $data);
		redirect('gudang/supplier');
	}

	public function update_barang($id) {
		$data = array(
			'nama_barang' => $this->input->post('nama_barang'),
			'harga_beli' => $this->input->post('harga_beli'),
			'harga_jual' => $this->input->post('harga_jual')
		);
		$this->Model_gudang->update_barang($id, $data);
		redirect('gudang/barang');
	}

	public function update_stok($id) {
		if($this->input->post('tanggal_return') == "") {
			$tanggal_return = NULL;
		} else {
			$tanggal_return = $this->input->post('tanggal_return');
		}
		$data = array(
			'tanggal_expired' => $this->input->post('tanggal_expired'),
			'stok_barang' => $this->input->post('stok_barang'),
			'tanggal_return' => $tanggal_return
		);
		
		$this->Model_gudang->update_stok($id, $data);
		redirect('gudang/stok');
	}

	public function test() {
		$this->load->view('test');
	}

	public function cetak_harga($id) {
		$data = $this->Model_gudang->barang_id($id);
		$this->load->view('gudang/cetak_harga', $data);
	}

	public function barang_id($id) {
		$data = $this->Model_gudang->barang_id($id);
		echo json_encode($data);
	}

	public function barang_all() {
		$data = $this->Model_gudang->barang();
		echo json_encode($data);
	}

	public function supplier_id($id) {
		$data = $this->Model_gudang->supplier_id($id);
		echo json_encode($data);
	}

	public function stok_id($id) {
		$data = $this->Model_gudang->stok_id($id);
		echo json_encode($data);
	}

	public function barang_kode($input) {
		$data = $this->Model_gudang->barang_kode($input);
		echo json_encode($data);
	}

	public function supplier_all() {
		$data = $this->Model_gudang->supplier();
		echo json_encode($data);
	}

	
    
}
