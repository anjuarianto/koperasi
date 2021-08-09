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

	

	public function eksekusi() {
		if (function_exists("set_time_limit") == TRUE AND @ini_get("safe_mode") == 0)
			{
				@set_time_limit(0);
			}
		$dir = "c://Users/THINKPAD/Desktop/Create DB/";
		
		// $this->read($dir, "RAK/");
		$this->read($dir, "SUPPLIER/");
		// $this->insert_supplier($dir, "SUPPLIER/");
		echo "Process Completed";
		
	}

	public function read($dir, $input) {
		$dir = $dir.$input;
		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (($file = readdir($dh)) !== false) {
					if($file != ".." && $file != ".") {
						if($input == "RAK/") {
							$this->fetch_rak($dir.$file ,$file);
							// $this->insert_rak($file);
						} else {
							$this->fetch_supplier($dir.$file ,$file);
							// $this->insert_supplier($file);
						}
						
					}
				}
				closedir($dh);
				
			}
		}
	}

	public function fetch($csv, $file) {
		$handle = fopen($csv,"r");
		$file = rtrim($file, '.csv');
		
		while (($row = fgetcsv($handle, 10000, ",")) != FALSE) //get row vales
		{
			$data = array(
				'kode_barang'	=> $row[1],
				'nama_barang'	=> $row[2],
				'harga_beli'	=> str_replace(',', '',$row[3]),
				'harga_jual'	=> str_replace(',', '',$row[4])
			);
		}

	}

	public function insert_rak($file) {
		$file = rtrim($file, '.csv');
		$query = $this->db->insert('tbl_rak', array('nama_rak' => $file));
	}

	public function insert_supplier($file) {
		$file = rtrim($file, '.csv');
		$query = $this->db->insert('tbl_supplier', array('nama_supplier' => $file));
	}


	public function fetch_supplier($csv, $file) {
		$handle = fopen($csv,"r");
		$file = rtrim($file, '.csv');
		
		while (($row = fgetcsv($handle, 10000, ",")) != FALSE) //get row vales
		{
			switch ($file) {
				case "ABAH":
				$id_rak = 1;
				break;
				case "AJI":
				$id_rak = 2;
				break;
				case "ANUGRAH":
				$id_rak = 3;
				break;
				case "AR":
				$id_rak = 4;
				break;
				case "ATK":
				$id_rak = 5;
				break;
				case "BU FILDA":
				$id_rak = 6;
				break;
				case "BU MUS":
				$id_rak = 7;
				break;
				case "CADET":
				$id_rak = 8;
				break;
				case "DIAMOND":
				$id_rak = 9;
				break;
				case "ELEKTRO":
				$id_rak = 10;
				break;
				case "ERBIN":
				$id_rak = 11;
				break;
				case "FERNIS":
				$id_rak = 12;
				break;
				case "GLICO":
				$id_rak = 13;
				break;
				case "KARSILAN":
				$id_rak = 14;
				break;
				case "KASIR":
				$id_rak = 15;
				break;
				case "KOPERASI":
				$id_rak = 16;
				break;
				case "KOSMETIK":
				$id_rak = 17;
				break;
				case "MIE":
				$id_rak = 18;
				break;
				case "MINUMAN":
				$id_rak = 19;
				break;
				case "OBAT":
				$id_rak = 20;
				break;
				case "PANGKAT":
				$id_rak = 21;
				break;
				case "PERKAKAS":
				$id_rak = 22;
				break;
				case "PUJI":
				$id_rak = 23;
				break;
				case "RADEN":
				$id_rak = 24;
				break;
				case "RJ":
				$id_rak = 25;
				break;
				case "ROKOK":
				$id_rak = 26;
				break;
				case "ROTI":
				$id_rak = 27;
				break;
				case "SNACK":
				$id_rak = 28;
				break;
				case "SO GOOD":
				$id_rak = 29;
				break;
				case "SUSU":
				$id_rak = 30;
				break;
				case "U7E":
				$id_rak = 31;
				break;
				case "WALLS":
				$id_rak = 32;
				break;
				case "WARNI":
				$id_rak = 33;
				break;
				case "YUNUS":
				$id_rak = 34;
				break;
				default:
				}

				
			$this->db->select('*');
			$this->db->from('tbl_barang');
			$this->db->where('kode_barang', $row[1]);
			$data = $this->db->get()->row_array();


			$update = array('id_supplier' => $id_rak);

			if($data) {
				$this->update_supplier($data['id_barang'], $update);
			}
		}
	}

	public function fetch_rak($csv, $file) {
		$handle = fopen($csv,"r");
		$file = rtrim($file, '.csv');
		while (($row = fgetcsv($handle, 10000, ",")) != FALSE) //get row vales
		{
			switch ($file) {
				case "ATK":
					$id_rak = 1;
					break;
				case "DIAMOND":
					$id_rak = 2;
					break;
				case "ELEKTRO":
					$id_rak = 3;
					break;
				case "KASIR":
					$id_rak = 4;
					break;
				case "KOPERASI":
					$id_rak = 5;
					break;
				case "KOSMETIK":
					$id_rak = 6;
					break;
				case "MIE":
					$id_rak = 7;
					break;
				case "MINUMAN":
					$id_rak = 8;
					break;
				case "OBAT":
					$id_rak = 9;
					break;
				case "PANGKAT":
					$id_rak = 10;
					break;
				case "PERKAKAS":
					$id_rak = 11;
					break;
				case "RAK 1":
					$id_rak = 12;
					break;
				case "RAK 2":
					$id_rak = 13;
					break;
				case "RAK 3":
					$id_rak = 14;
					break;
				case "RAK 4":
					$id_rak = 15;
					break;
				case "RAK 5":
					$id_rak = 16;
					break;
				case "RAK 6":
					$id_rak = 17;
					break;
				case "RAK 7":
					$id_rak = 18;
					break;
				case "RAK 8":
					$id_rak = 19;
					break;
				case "ROKOK":
					$id_rak = 20;
					break;
				case "ROTI":
					$id_rak = 21;
					break;
				case "SNACK":
					$id_rak = 22;
					break;
				case "SO GOOD":
					$id_rak = 23;
					break;
				case "SUSU":
					$id_rak = 24;
					break;
				case "WALLS":
					$id_rak = 25;
					break;
				default:
			}
			
			$this->db->select('*');
			$this->db->from('tbl_barang');
			$this->db->where('kode_barang', $row[1]);
			$data = $this->db->get()->row_array();

			$update = array('id_rak' => $id_rak);

			if($data) {
				$this->update_rak($data['id_barang'], $update);
			}
			// $this->db->insert('tbl_barang', $data);


		}
	}


	public function update_rak($id_barang, $data) {
		$this->db->where('id_barang', $id_barang);
		$this->db->update('tbl_barang', $data);
	}

	public function read_supplier() {
		$handle = fopen("c://Users/THINKPAD/Desktop/Create DB/SUPPLIER.csv","r");
		while (($row = fgetcsv($handle, 10000, ",")) != FALSE) //get row vales
		{
			$data = array(
				'id_supplier'	=> $row[0],
				'nama_supplier'	=> $row[1],
			);
			
			// $this->db->insert('tbl_supplier', $data);


		}
	}

	public function update_supplier($id_barang, $data) {
		$this->db->where('id_barang', $id_barang);
		$this->db->update('tbl_barang', $data);
		
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

	public function print_switch() {
		$this->db->select('*');
		$this->db->from('tbl_supplier');
		$result = $this->db->get()->result();
		echo 'switch ($supplier) {';
		echo "<br>";
		foreach ($result as $variable) {
			echo 'case "'.$variable->nama_supplier.'":';
			echo "<br>";
			echo '$id_rak = '.$variable->id_supplier.';';
			echo "<br>";
			echo 'break;';

				echo "<br>";
			
		}
		
		

		echo 'default:';
    	echo "<br>";
		echo '}';
		
	}

}
