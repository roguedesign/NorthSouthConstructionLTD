<?php

class Home extends CI_Controller{
    
    function __construct() {
	parent::__construct();
	$this->load->helper('url');
    }
    
    private function _init() {	
	$this->output->set_template('default');
	$this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
	$this->load->js('assets/themes/default/js/jquery-ui-1.8.16.custom.min.js');
	$this->load->js('assets/themes/default/js/script.js');
        $this->load->css('assets/themes/default/css/bootstrap.min.css');
        $this->load->css('assets/themes/default/css/flexslider.css');
        $this->load->css('assets/themes/default/css/styles.css');
        $this->load->css('assets/themes/default/css/queries.css');
        $this->load->css('assets/themes/default/css/animate.min.css');
    }
    
    public function index() {
	$this->_init();
	$this->load->view('pages/home');
    }
}

