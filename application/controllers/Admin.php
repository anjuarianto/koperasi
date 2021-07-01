<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_admin');
        is_admin();
    }

    // get function 
    public function index() {
        $data['judul'] = 'Dashboard | Admin';
        $data['dashboard_admin'] = array(
            'jumlah_barang' => count($this->Model_admin->barang()),
            'jumlah_supplier' => count($this->Model_admin->supplier()),
            'jumlah_user' => count($this->Model_admin->anggota()),
            'jumlah_voucher' => 'belum ada',
            'jumlah_transaksi_keluar' => count($this->Model_admin->pengeluaran()),
            'jumlah_transaksi_masuk' => count($this->Model_admin->pemasukan())
        );
        $this->load->view('admin/dashboard', $data);
    }

    public function aksi_tambah_user() {
        $data = array(
            'nama'  => $this->input->post('nama'),
            'kode_anggota'  => $this->input->post('username'),
            'email'  => $this->input->post('email'),
            'password'  => $this->input->post('password'),
            'satuan'  => $this->input->post('satuan'),
            'jabatan'  => $this->input->post('jabatan'),
            'level'  => $this->input->post('level'),
        );

        $this->Model_admin->aksi_tambah_user($data);
        redirect('admin/user');
    }



    public function export() {
        // Load the DB utility class
        $this->load->dbutil();
        $prefs = array( 
            'format'        => 'txt',                       // gzip, zip, txt
            'filename'      => 'mybackup.sql',              // File name - NEEDED ONLY WITH ZIP FILES
            'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
            'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
            'newline'       => "\n"                         // Newline character used in backup file
    );
        // Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup($prefs);
        $this->load->helper('file');
        $file_name = 'backup_db_'.date('Ymdhis').'.sql';
        write_file($_SERVER['DOCUMENT_ROOT'].'/koperasi/backup-db/'.$file_name, $backup);
        $this->curl_tes($file_name);
        redirect('admin');
    }


    public function curl_tes($file_name) {
        $ch = curl_init(); 
        $url = 'https://digitalsystemindo.com/koperasi/api/update_db';
        $url_dir = 'https://digitalsystemindo.com/koperasi/bakcup-db';
        $file_name_with_full_path = $_SERVER['DOCUMENT_ROOT'].'/koperasi/backup-db/'.$file_name;
        
        if(function_exists('curl_file_create')){
            $cFile = curl_file_create($file_name_with_full_path);
        } else{
            $cFile = '@' . realpath($file_name_with_full_path);
            curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
        }

        move_uploaded_file($file_name_with_full_path, $url_dir);

        $post = array('extra_info' => '123456','file_contents'=> $cFile);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        // set_time_limit(3600); # 5 minutes for PHP 
        // curl_setopt($ch, CURLOPT_TIMEOUT, 3600); # and also for CURL 

        // grab file from URL 
        $response = curl_exec($ch); 

        // close CURL resource, and free up system resources 
        curl_close($ch); 
    }

    public function barang() {
        $data['judul'] = 'Daftar Barang | Admin';
        $data['barang'] = $this->Model_admin->detail_barang();
        $this->load->view('admin/barang', $data);
    }

    public function supplier() {
        $data['judul'] = 'Daftar Supplier | Admin';
        $data['supplier'] = $this->Model_admin->supplier();
        $this->load->view('admin/supplier', $data);
    }

    public function voucher() {
        $data['judul'] = 'Daftar Voucher | Admin';
        $data['voucher'] = $this->Model_admin->voucher();
        $this->load->view('admin/voucher', $data);
    }

    public function anggota() {
        $data['judul'] = 'Daftar User | Admin';
        $data['user'] = $this->Model_admin->anggota();
        $this->load->view('admin/user', $data);
    }

    public function operator() {
        $data['judul'] = 'Daftar User | Admin';
        $var = 'operator';
        $data['user'] = $this->Model_admin->operator();
        $this->load->view('admin/user', $data);
    }

    public function activity_log() {
        $data['judul'] = 'Log Aktifitas | Admin';
        $data['log'] = $this->Model_admin->activity_log();
        $this->load->view('admin/activity_log', $data);
    }

    public function db_sync() {
        $data['judul'] = 'Sinkronisasi Database | Admin';
        $dir = './backup-db/';
        $scanned_directory = array_diff(scandir($dir), array('..', '.'));

        if($scanned_directory == null) {
            $data['file_name'] = '';
            $data['last_sync'] = '';
        } else {
            foreach ($scanned_directory as $key => $value) {
                $scanned_directory = preg_replace(array('/backup_db_/', '/.sql/'), '', $scanned_directory);
            }
            function date_sort($a, $b) {
                return strtotime($a) - strtotime($b);
            }
            usort($scanned_directory, "date_sort");
            $data['file_name'] = 'backup_db_'.($scanned_directory[0]).'.sql';
            $data['last_sync'] = date('d-m-Y H:i:s', strtotime($scanned_directory[0]));
        }
        
        $this->load->view('admin/db_sync', $data);
    }

    function date_sort($a, $b) {
        return strtotime($a) - strtotime($b);
    }
    

    public function generate_voucher() {

        $user = $this->Model_admin->anggota();
        
        foreach ($user as $user) {
            $data = array(
                'id_user' => $user->id_user,
                'bulan' => $this->input->post('bulan'),
                'tahun' => $this->input->post('tahun'),
                'status' => 0
            );
            // print_r($data);
            $this->Model_admin->input_voucher($data);
        }
        
        redirect('admin/voucher');
    }

     
}