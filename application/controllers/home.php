<?php

class Home extends CI_Controller{
    
    function __construct() {
	parent::__construct();
	$this->load->helper('url');
    }
    
    private function _init() {	
	$this->output->set_template('default');

    }
    
    public function index() {
	$this->_init();
	$this->load->view('pages/home');
    }
}

