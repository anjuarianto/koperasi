<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model', 'auth');
    }

	public function index()
	{
		$this->load->view('home');
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
					'timestamp' => time()
				);
				$this->session->set_userdata($userdata);
				if($user_db['level'] == 2) {
					redirect('gudang');
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
        $this->session->sess_destroy();
        redirect('home');
    }
}
