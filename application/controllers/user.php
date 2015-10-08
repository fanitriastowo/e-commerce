<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

	/**
	 * [Default constructor from CI_Controller]
	 */
	function __construct() {
		parent::__construct();
		$this->load->model('user_m');
	}

	/**
	 * [View Login page if login is valid than redirect to administrator view]
	 * @return [view('login')] [show login page]
	 */
	public function login() {
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		if ($this->ion_auth->login($email, $password) == TRUE) {
			redirect('administrator');
		}
		$this->load->view('login');
	}

	/**
	 * [Logout User]
	 * @return [view('user/login')] [redirect to login page]
	 */
	public function logout () {
		$this->ion_auth->logout();
		redirect('user/login');
	}

	/**
	 * [Registration POST Method]
	 * @return [view('user/login')] [redirect to login page]
	 */
	public function registration() {
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$this->ion_auth->register($username, $password, $email);
		redirect('user/login');
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */