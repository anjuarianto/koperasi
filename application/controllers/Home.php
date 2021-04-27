<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model', 'auth');
    }

	private function _has_login()
    {
        if ($this->session->has_userdata('login_session')) {
            redirect('dashboard');
        }
    }

	public function index()
	{
		$this->load->view('home');
	}

	public function register() {
		$this->load->view('register');
	}

	public function aksi_register() {
		$this->form_validation->set_rules('kode_anggota', 'Kode Anggota', 'required|trim|is_unique[user.username]|alpha_numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|trim');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim');

		$this->form_validation->set_message('required', '{field} Harus diisi');

        if ($this->form_validation->run() == false) {
            $this->load->view('register');
        } else {
            $input = $this->input->post(null, true);
            unset($input['password2']);
            $input['password']      = password_hash($input['password'], PASSWORD_DEFAULT);
            $input['role']          = 'gudang';
            $input['foto']          = 'user.png';
            $input['is_active']     = 0;
            $input['created_at']    = time();

            $query = $this->admin->insert('username', $input);
            if ($query) {
                set_pesan('daftar berhasil. Selanjutnya silahkan hubungi admin untuk mengaktifkan akun anda.');
                redirect('login');
            } else {
                set_pesan('gagal menyimpan ke database', false);
                redirect('register');
            }
        }
	}

	public function login() {
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($this->auth->cek_username($username) > 0) {
			// tidak ada username
		
			$get_password = $this->auth->get_password($username);
			if(password_verify($password, $get_password)) {
				// password ada
				
				$user_db = $this->auth->userdata($username);
				$userdata = array(
					'username'  => $user_db['username'],
					'level' => $user_db['level'],
					'name'  => $user_db['nama'],
					'timestamp' => time()
				);
				$this->session->set_userdata('login_session', $userdata);

				// redirect user ke dashboard sesuai role
				if($user_db['level'] == 2) {
					redirect('gudang');
				} else if($user_db['level'] == 3) {
					redirect('kasir');
				} else if($user_db['level'] == 4) {
					redirect('keuangan');
				} else if($user_db['level'] == 1) {
					redirect('admin');
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
		$this->session->unset_userdata('login_session');
		$this->session->sess_destroy();
		redirect('home');	
        
    }
}
