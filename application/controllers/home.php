<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class Home extends CI_Controller{
    
    function __construct() {
	parent::__construct();
	$this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->_init();
    }
    
private function _init() {	
	$this->output->set_template('default');
        $this->load->model('Project');

        $this->load->css(base_url().'assets/themes/default/css/stylesheet.css');
        $this->load->css(base_url().'assets/themes/default/css/bootstrap.css');
        $this->load->css(base_url().'assets/themes/default/css/bootstrap.min.css');
        $this->load->css(base_url()."assets/themes/default/css/creative.css");
        $this->load->css(base_url().'assets/themes/default/css/bootstrap-theme.css');
        $this->load->css(base_url().'assets/themes/default/css/bootstrap-theme.min.css');
        $this->load->css(base_url().'assets/themes/default/css/creative.css');
        
        
//        PLUGINS
        $this->load->css(base_url()."assets/themes/default/css/animate.min.css");
        $this->load->css(base_url()."assets/themes/default/css/lightbox.css");
        
//        JS
        $this->load->js(base_url()."assets/themes/default/js/jquery-1.11.0.min.js");
        
	
        $this->load->js(base_url().'assets/themes/default/js/bootstrap.js');
        $this->load->js(base_url().'assets/themes/default/js/bootstrap.min.js');
        $this->load->js(base_url()."assets/themes/default/js/cbpAnimatedHeader.js");
        $this->load->js(base_url()."assets/themes/default/js/classie.js");
        $this->load->js(base_url()."assets/themes/default/js/creative.js");
        $this->load->js(base_url()."assets/themes/default/js/jquery.easing.min.js");
        $this->load->js(base_url()."assets/themes/default/js/jquery.fittext.js");
        $this->load->js(base_url()."assets/themes/default/js/jquery.js");
        $this->load->js(base_url()."assets/themes/default/js/wow.min.js");
        $this->load->js(base_url()."assets/themes/default/js/npm.js");
    }
    
    public function index() {
	$this->_init();
	
        
        
	$project = $this->Project->get_all();
         
        $this->load->view('pages/home', array(
	    
	    'projects' => $project, 'is_contact_validation' => false,  'is_login_validation' => false, 'is_create_user_validation' => false,
	));
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
//            if(!$is_ajax){
//                redirect('auth');
//            }
	} else { 
	    $this->session->set_flashdata('error', 'Incorrect username and/or password. Please try again.');
	    redirect(base_url().'home#openModal', 'refresh');
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
	redirect('projects');
    }  
//    

    /**
     * Create a new user and store in db. Used as part of Signup functionality.
     */
    public function create_user() {
        $project = $this->Project->get_all();
        
        
	$this->load->library('form_validation');
        //$this->load->view('pages/projects');
	//validate 
	$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
	$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
	
	$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
	$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
        
        	

        
	if ($this->form_validation->run() == FALSE) {
            
	    $this->load->view('pages/home', array('is_contact_validation' => false, 'projects' => $project, 'is_login_validation' => false, 'is_create_user_validation' => true));
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
		redirect(base_url().'pages/projects', 'refresh');
	    } else {
		$this->session->set_flashdata('error', 'An error occurred and the account was not created.');
		redirect(base_url().'pages/home#openModalSignUp', 'refresh');
	    }
	}
    }
    
    public function contact() {
        
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xxs_clean|callback_alpha_space_only');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            $project = $this->Project->get_all();
            $this->load->view('pages/home', array('is_contact_validation' => true, 'projects' => $project, 'is_login_validation' => false, 'is_create_user_validation' => false));
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
                redirect('home');
            }
            else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">There has been an error sending this enquiry. Please try again later!</div>');
                redirect('home');
            }
        }
    }
    
    
}
