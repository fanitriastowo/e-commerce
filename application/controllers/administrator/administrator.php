<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends Admin_Controller {

	function __construct() {
		parent::__construct();
	}

	/**
	 * [View Administrator Login page if login is valid than redirect to administrator view]
	 * @return [view('login')] [show login page]
	 */
	public function login() {
		// redirect if already logged in
        if ($this->ion_auth->is_admin() == TRUE) {
            redirect('administrator/pemesanan');
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
			redirect('administrator/pemesanan');
		} else {
			$this->ion_auth->logout();
			$this->session->set_flashdata('error', TRUE);
			redirect('administrator/administrator/login');
		}
	}

	/**
	 * [Logout Administrator]
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

/* End of file administrator.php */
/* Location: ./application/controllers/administrator/administrator.php */