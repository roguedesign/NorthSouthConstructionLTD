<?php

class Signin extends CI_Controller {
    
    protected $username = 'admin';
    protected $password = 'admin';
            
    
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
        $this->load->view('pages/projects');
        
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xxs_clean|callback_alpha_space_only');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|valid_password');
        
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pages/projects'); 
            $username = 'admin';
            $password = 'admin';
        }
        else {
           
            
            $username = $this->input->post('username') &&
            $password = $this->input->post('password') === TRUE;
            {
               redirect('pages/projects.php');
            }
            
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">There has been an error sending this enquiry. Please try again later!</div>');
                redirect('index.php#contact');
        }
        
        
        }
    
}