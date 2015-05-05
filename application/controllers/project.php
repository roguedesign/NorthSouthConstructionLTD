<?php

class Project extends CI_Controller {
    
    function __construct() {
	parent::__construct();
	$this->load->helper('url');
        
    }
    private function _init() {	
        
	 $this->load->view('pages/projects');
        

    }
    
    private function index(){
        $this->_init();
       
    }

}

