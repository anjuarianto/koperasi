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
