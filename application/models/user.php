<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class User extends MY_Model {

    public $id;
    public $first_name;
    public $last_name;
    public $username;
    public $password;

    function validate() {
        
        
	$user = $this->get_by(array('username' => $this->input->post('username'), 'password' => md5($this->input->post('password'))));
	if ($user) {
	    return true;
	}
    }

}
