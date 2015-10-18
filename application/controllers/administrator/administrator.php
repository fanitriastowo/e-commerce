<?php 

class Administrator extends Admin_Controller {

	function __construct() {
		parent::__construct();
	}

	/**
	 * [View Login page if login is valid than redirect to administrator view]
	 * @return [view('login')] [show login page]
	 */
	public function login() {
		// redirect if already logged in
        if ($this->ion_auth->is_admin() == TRUE) {
            redirect('administrator/home');
        } 
		$this->load->view('administrator/login');
	}

	/**
	 * [Post Login and check credential]
	 * @return [view('login')] [post login]
	 */
	public function post_login() {
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		if ($this->ion_auth->login($email, $password) == TRUE && !$this->ion_auth->in_group('members')) {
			$this->load->view('administrator/pemesanan');
		} else {
			$this->ion_auth->logout();
			$this->session->set_flashdata('error', TRUE);
			redirect('administrator/administrator/login');
		}
	}

	/**
	 * [Logout User]
	 * @return [view('user/login')] [redirect to login page]
	 */
	public function logout () {
		if ($this->ion_auth->logged_in()) {
			$this->ion_auth->logout();
			redirect('administrator/administrator/login');
		} else {
			redirect('administrator/administrator/login');
		}
	}
}