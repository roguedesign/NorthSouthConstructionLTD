<?php

class Projects extends CI_Controller {
    
    function __construct() {
	parent::__construct();
	$this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('table');
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
    
    public function index(){
        $this->_init();
        
        $this->load->helper('url');
	$this->load->library('table');
	$project = array();
	$this->load->model('Project');
	$rows = $this->Project->get_all();
	foreach ($rows as $row) {
	    $project[] = array(
		$row->project_name,
                $row->project_category,
		$row->description,
		
		anchor('projects/add_edit/'.$row->id,'Edit').' | '.anchor('projects/delete/'.'/'.$row->id,'Delete'),
	    );
	}
	
	$this->load->view('pages/projects', array(
	    
	    'project' => $project,
	));
    }
    
    public function create_project() {
        
	$this->load->library('form_validation');
        //$this->load->view('pages/projects');
	//validate 
	$this->form_validation->set_rules('name_of_job', 'Job Name', 'trim|required');
	$this->form_validation->set_rules('category', 'Category', 'trim|required');
	
	

	if ($this->form_validation->run() == FALSE) {
	    $this->load->view('pages/projects');
	} else {
	    
	    $this->load->model('Project');
	    $this->Project->name_of_job = $this->input->post('name_of_job');
	    $this->Project->category = $this->input->post('category');

	    
	    if ($this->Project->insert_obj() != null) {
		$this->create_project();
		$this->session->set_flashdata('success', 'Project Sucessfully Added!');
		redirect('pages/projects');
	    } else {
		$this->session->set_flashdata('error', 'An error occurred and the Project was not created.');
		redirect('pages/projects');
	    }
	}
    }
        public function do_upload() {
        $config['upload_path'] = '../uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_height'] = 768;
        $config['max_width'] = 1024;
        $config['is_image'] = 1;
        
        $this->load->library('upload', $config);
        if( !$this->upload->do_upload()){
            $data = array('upload_data' => $this->upload->data());
            redirect('projects');
        }
        else {
            $error = array('error' => $this->upload->display_errors());
            redirect('projects');
        }
    }
    
    
    public function add_edit($id = null) {
        
	$this->load->helper('form');
	$this->load->model('Project');
	$project = new Projects();

	//is add/edit
	if (!$this->input->post()) {
	    //if is add
	    if ($id) {
		//get Todo from db by id 
		$this->load->model('Project');
		$project = $this->Project->get($id);
	    }
	    $this->load->view('pages/add-edit', array(
		'edit' => $id != null,
		'project' => $project,
	    ));
	} else {//if is insert/update
	    $this->_insert_update($project, $id);
	}
    }
    
    public function delete($status,$id) {
	$this->load->model('Project');
    if($this->Project->delete($id)){
	$this->session->set_flashdata('success', 'Project successfully deleted.');
    }else{
	$this->session->set_flashdata('error', 'There was a problem deleting the Project. Please try again.');	
    }
    //take back to list
    redirect('/projects/status/'.$status, 'refresh');
    }
    
    private function _insert_update($project, $id) {
	//populate from post
	$project->project_name = $this->input->post('project_name');
        $project->project_category = $this->input->post('project_category');
	$project->description = $this->input->post('description');


	// validation
	$this->load->library('form_validation');
	$this->form_validation->set_rules(array(
	    array(
		'field' => 'project_name',
		'label' => 'Project Name',
		'rules' => 'required',
	    ),
            array(
		'field' => 'project_category',
		'label' => 'Project Category',
		'rules' => 'required',
	    ),
	    array(
		'field' => 'description',
		'label' => 'Description',
		'rules' => 'required',
	    ),
	));

	$this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');

	//if doesn't validate
	if (!$this->form_validation->run()) {
	    $this->load->view('pages/add-edit', array(
		'edit' => $id != null,
		'project' => $project,
	    ));
	} else {//if validates
	    $project->id = (int) $id;
	    //hard-code a few values not in the form
	    $project->priority = 1;
	    $project->comment = "my comment";
	    $project->created_on = "2015-01-01";
	    $project->last_modified_on = "2015-01-01";
	    $project->due_on = "2015-01-01";
	    $project->status = "PENDING";
	    $project->deleted = 0;
	    $project->save($id);
	    //add flash and redirect
	    $action = "";
	    if ($id == null) {
		$action = "added";
	    } else {
		$action = "updated";
	    }
	    $this->session->set_flashdata('success', 'Project successfully ' . $action);
	    redirect('/projects/status/' . strtolower($project->status), 'refresh');
	}
    }
}

