<?php 

class User extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user_m');
	}

	public function login() {
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		if ($this->ion_auth->login($email, $password) == TRUE) {
			redirect('administrator');
		}
		$this->load->view('login');
	}

	public function logout () {
		$this->ion_auth->logout();
		redirect('user/login');
	}

	public function registration() {
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$this->ion_auth->register($username, $password, $email);
		redirect('user/login');
	}
}