<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->model('Model_keuangan');
    }
    
    
    public function uang_keluar() {
        $query = $this->db->get('tbl_pembelian');
        return $query->result();
    }

    public function uang_masuk() {
        $query = $this->db->get('tbl_penjualan');
        return $query->result();
    }


}