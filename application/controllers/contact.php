<?php

class Contact extends CI_Controller {
    
    protected $to_email = 'manfacepie@gmail.com';
    
    
    function __construct() {
	parent::__construct();
	$this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    private function _init() {	
        
	$this->output->set_template('default');

        $this->load->css('assets/themes/default/css/stylesheet.css');
        $this->load->css('assets/themes/default/css/bootstrap.css');
        $this->load->css('assets/themes/default/css/bootstrap.min.css');
        $this->load->css("assets/themes/default/css/creative.css");
        
//        PLUGINS
        $this->load->css("assets/themes/default/css/animate.min.css");
        $this->load->css("assets/themes/default/css/lightbox.css");
        
//        JS
        $this->load->js("assets/themes/default/js/jquery-1.11.0.min.js");
	$this->load->js("assets/themes/default/js/lightbox.min.js");
        $this->load->js('assets/themes/default/js/bootstrap.js');
        $this->load->js('assets/themes/default/js/bootstrap.min.js');
        $this->load->js("assets/themes/default/js/cbpAnimatedHeader.js");
        $this->load->js("assets/themes/default/js/classie.js");
        $this->load->js("assets/themes/default/js/creative.js");
        $this->load->js("assets/themes/default/js/jquery.easing.min.js");
        $this->load->js("assets/themes/default/js/jquery.fittext.js");
        $this->load->js("assets/themes/default/js/jquery.js");
        $this->load->js("assets/themes/default/js/wow.min.js");
    }
    
    function index(){
        $this->_init();
        
        
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
            'stmp_user' => '',
            'stmp_password' => '',
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
                redirect('pages/home#contact');
            }
            else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">There has been an error sending this enquiry. Please try again later!</div>');
                redirect('index.php#contact');
        }
        
        
        }
    }
            
}