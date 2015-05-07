<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class Home extends CI_Controller{
    
    function __construct() {
	parent::__construct();
	$this->load->helper('url');
        $this->load->helper('form');
        $this->_init();
    }
    
private function _init() {	
	$this->output->set_template('default');

        $this->load->css('assets/themes/default/css/stylesheet.css');
        $this->load->css('assets/themes/default/css/bootstrap.css');
        $this->load->css('assets/themes/default/css/bootstrap.min.css');
        $this->load->css("assets/themes/default/css/creative.css");
        $this->load->css('assets/themes/default/css/bootstrap-theme.css');
        $this->load->css('assets/themes/default/css/bootstrap-theme.min.css');
        $this->load->css('assets/themes/default/css/creative.css');
        
        
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
        $this->load->js("assets/themes/default/js/npm.js");
    }
    
    public function index() {
	$this->_init();
	$this->load->view('pages/home');
    }
    

    

    /**
     * SIGN OUT
     */
    public function logout() {
	$this->_init();
	$this->session->sess_destroy();
	$this->load->view('pages/home');
    }
    
    public function validate_user() {
        $this->validate(false);
    }

   /**
    * VALIDATE. AJAX
    */
    public function validate($is_ajax = true) {
	$this->load->model('User');
	if ($this->User->validate()) {
	    $this->_do_login();
            if(!$is_ajax){
                redirect('auth');
            }
	} else { 
	    $this->session->set_flashdata('error', 'Incorrect username and/or password. Please try again.');
	    redirect('index.php#openModal', 'refresh');
	}
    }

    /**
     * LOGIN AND DIRECT TO PROJECTS
     */
    private function _do_login() {
	$data = array(
	    'username' => $this->input->post('username'),
	    'is_logged_in' => true
	);
	$this->session->set_userdata($data);
	redirect($this->load->view('pages/projects'));
    }  
//    

    /**
     * Create a new user and store in db. Used as part of Signup functionality.
     */
    public function create_user() {
        
	$this->load->library('form_validation');
        //$this->load->view('pages/projects');
	//validate 
	$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
	$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
	
	$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
	$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');

	if ($this->form_validation->run() == FALSE) {
	    $this->load->view('pages/home');
	} else {
	    //Create new user
	    $this->load->model('User');
	    $this->User->first_name = $this->input->post('first_name');
	    $this->User->last_name = $this->input->post('last_name');
	    
	    $this->User->username = $this->input->post('username');
	    $this->User->password = md5($this->input->post('password'));
	    //save new user
	    if ($this->User->insert_obj() != null) {
		$this->_do_login();
		$this->session->set_flashdata('success', 'Account successfully created.');
		redirect('projects', 'refresh');
	    } else {
		$this->session->set_flashdata('error', 'An error occurred and the account was not created.');
		redirect('index.php#openModalSignUp');
	    }
	}
    }
}

