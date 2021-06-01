<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    

    public function update_db() {
        $upload = $this->input->post('extra_info');
        
        $config['upload_path'] = './backup-db/';
        $config['allowed_types'] = '*';
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload('file_contents')) {
        echo $this->upload->display_errors();
        }
        $db_name = $this->upload->data()['file_name'];
        $this->import_database($db_name);
    }
    
    public function import_database($db_name) {
        $temp_line = '';
        $lines = file('./backup-db/'.$db_name); 
        foreach ($lines as $line)
        {
            if (substr($line, 0, 2) == '--' || $line == '' || substr($line, 0, 1) == '#')
            continue;
            $temp_line .= $line;
            if (substr(trim($line), -1, 1) == ';')
            {
                $this->db->query($temp_line);
                $temp_line = '';
            }
        }
    }


}