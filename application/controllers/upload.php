<?php  if (!defined('BASEPATH'))exit('No direct script access allowed');

class Uploads extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    
    public function index() {
        $this->load->view('upload_form', array('error' => ' '));
    }
    
    public function do_upload() {
        $config['upload_path'] = '../uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_height'] = 768;
        $config['max_width'] = 1024;
        
        $this->load->library('upload', $config);
        if( !$this->upload->do_upload()){
            $error = array('error' => $this->upload->display_errors());
           redirect('project');
        }
        else {
            $data = array('upload_data' => $this->upload->data());
            redirect('project');
        }
    }
}

