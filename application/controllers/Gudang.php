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

	public function profile() {
		$data['judul'] = 'Profile | Gudang';
		$data['profile'] = $this->Model_gudang->profile($this->session->userdata('login_session')['id_user']);
		$this->load->view('profile/profile', $data);
	}

	public function edit_profile() {
		$data['judul'] = 'Edit Profile | Gudang';
		$data['profile'] = $this->Model_gudang->profile($this->session->userdata('login_session')['id_user']);
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
		redirect('gudang/profile');
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

	public function rak() {
		$data['judul'] = 'Daftar Rak | Gudang';
		$data['rak'] = $this->Model_gudang->rak();
		$data["script"] = "";
		$this->load->view('gudang/rak', $data);
	}

	public function aksi_tambah_rak() {
		$data = array(
			'nama_rak'	=> $this->input->post('nama_rak')
		);

		$this->Model_gudang->tambah_rak($data);
		redirect('gudang/rak');
	}

	public function update_rak($id) {
		$data = array(
			'nama_rak'	=> $this->input->post('nama_rak')
		);

		$this->Model_gudang->update_rak($id, $data);
		redirect('gudang/rak');
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
		$data["pembelian"] = $this->Model_gudang->pembelian($this->session->userdata('login_session')['id_user']);
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
        
		if($jenis_pembayaran == "Kredit") {
			$jatuh_tempo = $this->input->post('jatuh_tempo');
			$status_kredit = 0;
		} else {
			$jatuh_tempo = null;
			$status_kredit = null;
		}
		$pembelian = array(
			'tgl_pembelian' => $tanggal_pembelian,
			'no_faktur' => $no_faktur,
			'jenis_pembayaran' => $jenis_pembayaran,
			'ppn' => $ppn,
			'status_kredit'		=> $status_kredit,
			'jatuh_tempo'	=> $jatuh_tempo,
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

	public function return_barang_all() {
		$data['judul'] = 'Return Barang | Gudang';
		$data['return_pembelian'] = $this->Model_gudang->return_pembelian();
	
		$this->load->view('gudang/return_pembelian', $data);
	}

	public function aksi_return_pembelian($id) {
		$jumlah_return = $this->input->post('jumlah_return');
		$data = array(
			'id_detail_pembelian'	=> $id,
			'jumlah_barang'			=> $jumlah_return,
			'tanggal'				=> $this->input->post('tanggal_return'),
			'memo'				=> $this->input->post('memo')
		);
		$id_pembelian = $this->Model_gudang->detail_pembelian_id($id)->id_pembelian;
		$this->Model_gudang->aksi_return_pembelian($data);


		$jumlah_barang = $this->Model_gudang->detail_pembelian_id($id)->jumlah_barang;
		$data_jumlah_barang = array(
			'jumlah_barang' => $jumlah_barang-$jumlah_return
		);
		$this->Model_gudang->update_detail_pembelian($id, $data_jumlah_barang);

		$id_barang = $this->Model_gudang->detail_pembelian_id($id)->id_barang;
		
		$stok_awal = $this->Model_gudang->select_stok($id_pembelian, $id_barang)->stok_barang;
		$data_stok = array(
			'stok_barang' => $stok_awal-$jumlah_return
		);
		$this->db->where('id_pembelian', $id_pembelian);
		$this->db->where('id_barang', $id_barang);
		$this->db->update('tbl_stok', $data_stok);
		redirect('gudang/detail_pembelian/'.$id_pembelian);
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
	
		$data = array(
			'tanggal_expired' => $this->input->post('tanggal_expired'),
			'stok_barang' => $this->input->post('stok_barang'),
		);
		
		$this->Model_gudang->update_stok($id, $data);
		redirect('gudang/stok');
	}

	public function update_detail_pembelian($id) {
		$data = array(
			'jumlah_barang' => $this->input->post('jumlah_barang'),
			'discount' => $this->input->post('discount')
		);

		$id_pembelian = $this->Model_gudang->detail_pembelian_id($id)->id_pembelian;
		
		$this->Model_gudang->update_detail_pembelian($id, $data);
		redirect('gudang/detail_pembelian/'.$id_pembelian);
	}

	public function update_pembelian($id) {
		$data = array(
			'no_faktur' => $this->input->post('no_faktur'),
			'ppn' => $this->input->post('ppn'),
			'tgl_pembelian' => $this->input->post('tgl_pembelian'),
			'jenis_pembayaran' => $this->input->post('jenis_pembayaran')
		);
		
		$this->Model_gudang->update_pembelian($id, $data);
		redirect('gudang/detail_pembelian/'.$id);
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

	public function detail_pembelian_id($id) {
		$data = $this->Model_gudang->detail_pembelian_id($id);
		echo json_encode($data);
	}

	public function pembelian_id($id) {
		$data = $this->Model_gudang->pembelian_id($id);
		echo json_encode($data);
	}

	public function supplier_all() {
		$data = $this->Model_gudang->supplier();
		echo json_encode($data);
	}

	public function return_pembelian_id($id) {
		$data = $this->Model_gudang->return_pembelian_id($id);
		echo json_encode($data);
	}

	public function rak_id($id) {
		$data = $this->Model_gudang->rak_id($id);
		echo json_encode($data);
	}

	
    
}
