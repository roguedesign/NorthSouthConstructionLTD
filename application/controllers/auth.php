<?php if (!defined('BASEPATH'))exit('No direct script access allowed');
/**
 * CLASS FOR AUTHORIZATION
 */
class Auth extends CI_Controller {

    function __construct() {
	parent::__construct();
	$this->load->helper('url');
    }

    /**
     * SET UP
     */
    private function _init() {	
	$this->output->set_template('default');
	$this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
	$this->load->js('assets/themes/default/js/jquery-ui-1.8.16.custom.min.js');
	$this->load->js('assets/themes/default/js/script.js');
        $this->load->css('assets/themes/default/css/stylesheet.css');
    }

    /**
     * DISPLAY HOME
     */
    public function index() {
	$this->_init();
	$this->load->view('pages/home');
    }

    /**
     * DISPLAY LOGIN
     */
//    public function login() {
//	$this->_init();
//	$this->load->helper('form');
//	$this->load->view('pages/login');
//    }
    

    /**
     * SIGN OUT
     */
//    public function logout() {
//	$this->_init();
//	$this->session->sess_destroy();
//	$this->load->view('pages/home');
//    }

   /**
    * VALIDATE. AJAX
    */
//    public function validate() {
//	$this->load->model('Auth');
//	if ($this->User->validate()) {
//	    $this->_do_login();
//	} else { // incorrect username or password
//	    $this->session->set_flashdata('error', 'Incorrect username and/or password. Please try again.');
//	    redirect('/auth/login', 'refresh');
//	}
//    }

    /**
     * LOGIN AND DIRECT TO PROJECTS
     */
//    private function _do_login() {
//	$data = array(
//	    'username' => $this->input->post('username'),
//	    'is_logged_in' => true
//	);
//	$this->session->set_userdata($data);
//	redirect('/project');
//    }  
//    

    /**
     * Create a new user and store in db. Used as part of Signup functionality.
     */
//    public function create_user() {
//	$this->load->library('form_validation');
//	//validate 
//	$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
//	$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
//	$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
//	$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
//	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
//	$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
//
//	if (!$this->form_validation->run()) {
//	    $this->load->view('pages/signup');
//	} else {
//	    //Create new user
//	    $this->load->model('User');
//	    $this->User->first_name = $this->input->post('first_name');
//	    $this->User->last_name = $this->input->post('last_name');
//	    $this->User->email_address = $this->input->post('email_address');
//	    $this->User->username = $this->input->post('username');
//	    $this->User->password = md5($this->input->post('password'));
//	    //save new user
//	    if ($this->User->insert_obj() != null) {
//		$this->_do_login();
//		$this->session->set_flashdata('success', 'Account successfully created.');
//		redirect('/auth', 'refresh');
//	    } else {
//		$this->session->set_flashdata('error', 'An error occurred and the account was not created.');
//		redirect('auth/signup');
//	    }
//	}
//    }
}
