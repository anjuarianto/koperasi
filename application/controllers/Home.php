<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model', 'auth');
		
    }

	public function is_login() {
		if($this->session->userdata('login_session')['level'] == 2) {
			redirect('gudang');
		} else if($this->session->userdata('login_session')['level'] == 3) {
			redirect('kasir');
		} else if($this->session->userdata('login_session')['level'] == 4) {
			redirect('keuangan');
		} else if($this->session->userdata('login_session')['level'] == 1) {
			redirect('admin');
		} else if ($this->session->userdata('login_session')['level'] == 6) {
			redirect('keuangan');
		} else if($this->session->userdata('login_session')['level'] == 7) {
			redirect('keuangan');
		} else if($this->session->userdata('login_session')['level'] == 5) {
			redirect('anggota');
		}
	}

	public function index()
	{
		if($this->session->userdata('login_session')) {
			$this->is_login();
		}
		
		$this->load->view('home');
	}

	public function register() {
		$this->load->view('register');
	}

	public function aksi_register() {
		$this->form_validation->set_rules('kode_anggota', 'Kode Anggota', 'required|trim|is_unique[tbl_user.kode_anggota]|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|trim');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]');
        $this->form_validation->set_rules('satuan', 'Nomor Telepon', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Nomor Telepon', 'required|trim');

		$this->form_validation->set_message('required', '{field} harus diisi');


        if ($this->form_validation->run() == false) {
            $this->load->view('register');
        } else {

			$data = array(
				'kode_anggota'	=> $this->input->post('kode_anggota'),
				'email'	=> $this->input->post('email'),
				'password'	=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'nama'	=> $this->input->post('nama'),
				'satuan'	=> $this->input->post('satuan'),
				'jabatan'	=> $this->input->post('jabatan'),
				'level'		=> 5
			);

			$query = $this->auth->register($data);
            
            if ($query) {
                set_pesan('Silahkan login dengan akun yang sudah anda daftarkan', true);
                redirect('home');
            } else {
                set_pesan('gagal menyimpan ke database', false);
                redirect('home/register');
            }
        }
	}

	public function login() {
		$this->form_validation->set_rules('kode_anggota', 'Kode Anggota', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		$kode_anggota = $this->input->post('kode_anggota');
		$password = $this->input->post('password');

		if($this->auth->cek_kode_anggota($kode_anggota) > 0) {
			// tidak ada username
		
			$get_password = $this->auth->get_password($kode_anggota);
			if(password_verify($password, $get_password)) {
				// password ada
				
				$user_db = $this->auth->userdata($kode_anggota);
				$userdata = array(
					'kode_anggota'  => $user_db['kode_anggota'],
					'level' => $user_db['level'],
					'name'  => $user_db['nama'],
					'id_user' => $user_db['id_user'],
					'timestamp' => time()
				);
				$this->session->set_userdata('login_session', $userdata);
				buat_log('User login ke dalam sistem', $user_db['id_user']);
				// redirect user ke dashboard sesuai role
				if($user_db['level'] == 2) {
					redirect('gudang');
				} else if($user_db['level'] == 3) {
					redirect('kasir');
				} else if($user_db['level'] == 4) {
					redirect('keuangan');
				} else if($user_db['level'] == 1) {
					redirect('admin');
				} else if ($user_db['level'] == 6) {
					redirect('keuangan');
				} else if($user_db['level'] == 7) {
					redirect('keuangan');
				} else if($user_db['level'] == 5) {
					redirect('anggota');
				}
				
				
			} else {
				// password salah
				set_pesan('Password anda salah', false);
				redirect('home');
			}
		} else {
			// username tidak ada
			set_pesan('Username Tidak Terdaftar', false);
			redirect('home');
		}
	}

	public function logout()
    {
		if($this->session->userdata('login_session' != null)) {
			buat_log('User logout dari sistem', $this->session->userdata('login_session')['id_user']);
		}
		
		$this->session->unset_userdata('login_session');
		$this->session->sess_destroy();
		redirect('home');	
        
    }

	public function read() {
		$dir = "c://Users/THINKPAD/Desktop/Create DB/";
		

		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (($file = readdir($dh)) !== false) {
					if($file != ".." && $file != ".") {
	
						$this->update_stok($dir.$file);
					}
				}
				closedir($dh);
			}
		}

		
	}

	public function fetch($csv, $file) {
		$handle = fopen($csv,"r");
		while (($row = fgetcsv($handle, 10000, ",")) != FALSE) //get row vales
		{
			$data = array(
				'kode_barang'	=> $row[1],
				'nama_barang'	=> $row[2],
				'harga_beli'	=> str_replace(',', '',$row[3]),
				'harga_jual'	=> str_replace(',', '',$row[4]),
				'id_supplier'	=> rtrim($file, '.csv')
			);
			
			$this->db->insert('tbl_barang', $data);


		}
	}

	public function read_supplier() {
		$handle = fopen("c://Users/THINKPAD/Desktop/Create DB/SUPPLIER.csv","r");
		while (($row = fgetcsv($handle, 10000, ",")) != FALSE) //get row vales
		{
			$data = array(
				'id_supplier'	=> $row[0],
				'nama_supplier'	=> $row[1],
			);
			
			$this->db->insert('tbl_supplier', $data);


		}
	}

	public function update_supplier() {
		$supplier = $this->db->get('tbl_supplier')	->result();
		foreach ($supplier as $key => $value) {
			$data = array('id_supplier' => $value->id_supplier);
			$this->db->where('id_supplier', $value->nama_supplier);
			$this->db->update('tbl_barang', $data);
		}
	}

	public function update_stok($csv) {
		$handle = fopen($csv,"r");
		while (($row = fgetcsv($handle, 10000, ",")) != FALSE) //get row vales
		{
			$this->db->where('kode_barang', $row[1]);
			$barang = $this->db->get('tbl_barang')->row();
			if($barang->id_barang != "") {
				$data = array(
					'id_barang'	=> $barang->id_barang,
					'id_pembelian'	=> 1,
					'stok_barang'	=> $row[7],
					'tanggal_pembelian'	=> date("Y-m-d"),
					'tanggal_expired'	=> NULL,
				);
				
				$this->db->insert('tbl_stok', $data);
			}
			


		}
	}
}
