<?php 

class User extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function login() {
		$username = $this->input->post('email');
		$password = $this->input->post('password');
		if ($this->ion_auth->login($username, $password) == TRUE) {
			redirect('administrator');
		}
		$this->load->view('login');
	}

	public function logout () {
		$this->ion_auth->logout();
		redirect('user/login');
	}
}