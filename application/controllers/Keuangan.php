<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Model_keuangan');
    }
    
    
    public function uang_keluar() {

        $data = $this->Model_keuangan->uang_keluar();
        print_r($data);
        // $this->load->view('keuangan/keluar');
    }

    public function uang_masuk() {
        $this->load->view('keuangan/masuk');
    }


}