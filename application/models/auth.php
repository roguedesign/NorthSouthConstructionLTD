<?php

class Auth extends MY_Model {

    public $id;
    public $username;
    public $password;

    function validate() {
	$auth = $this->get_by(array('username' => $this->input->post('username'), 'password' => md5($this->input->post('password'))));
	if ($auth) {
	    return true;
	}
    }

}
