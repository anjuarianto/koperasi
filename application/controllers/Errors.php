<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {
    

    public function notfound() {
        $this->load->view('errors/403');
    }


}