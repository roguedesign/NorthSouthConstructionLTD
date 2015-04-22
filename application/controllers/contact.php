<?php

class Contact extends CI_Controller {
    
    protected $to_email = 'manfacepie@gmail.com';
    
    
    function __construct() {
	parent::__construct();
	$this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    
    function index(){

        $this->form_validation->set_rules('name', 'Name', 'trim|required|xxs_clean|callback_alpha_space_only');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pages/home');
        }
        else {
            $name = $this->input->post('name');
            $from_email = $this->input->post('email');
            $message = $this->input->post('message');
            
            $to_email = 'manfacepie@gmail.com';
            
            $config = array(
            'protocol'   => 'smtp',
            'stmp_host' => 'ssl://smtp.googlemail.com',
            'stmp_port' => '465',
            'stmp_user' => 'manfacepie@gmail.com',
            'stmp_password' => 'droppedpie9',
            'mailtype' => 'iso-8859-1',
            'wordwrap' => true,
            'newline' => '\r\n',
            'stmp_crypto' => 'ssl'
            );    
            
            
            $this->load->library('email', $config);
            
            
            $this->email->from($from_email, $name);
            $this->email->to($to_email);
            $this->email->message($message);
            if ($this->email->send()) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Your enquiry has been sent successfully!</div>');
                redirect('index.php#contact');
            }
            else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">There has been an error sending this enquiry. Please try again later!</div>');
                redirect('index.php#contact');
        }
        
        
        }
    }
            
}