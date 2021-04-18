<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Model_gudang');
    }
    

    public function barang() {
        $query = $this->Model_gudang->barang();
        echo json_encode($query);
    }


}