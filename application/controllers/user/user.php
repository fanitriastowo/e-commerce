<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends User_Controller {

	/**
	 * [Default constructor from User_Controller]
	 * [check apakah login sebagai admin atau tidak]
	 */
	function __construct() {
		parent::__construct();
	}

	/**
	 * [View Login page if login is valid than redirect to member view]
	 * @return [view('login')] [show login page]
	 */
	public function login() {
		// redirect if already logged in
		if ($this->ion_auth->in_group('members') == TRUE) {
        	redirect('user/user/home');
        }
		$this->load->view('user/login');
	}

	/**
	 * [Post Login and check credential]
	 * @return [view('login')] [post login]
	 */
	public function post_login() {
		// ambil value dari form login
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// check credential dan jika buka administrator
		if ($this->ion_auth->login($email, $password) == TRUE && !$this->ion_auth->is_admin()) {
			// Jika member
			redirect('home');
		} else {
			// Jika administrator
			$this->ion_auth->logout();
			$this->session->set_flashdata('error', TRUE);
			redirect('user/user/login');
		}
	}

	/**
	 * [Logout Member]
	 * @return [view('user/login')] [redirect to login page]
	 */
	public function logout () {

		// Check apakah sudah login
		if ($this->ion_auth->logged_in()) {

			// jika sudah login maka logout
			$this->ion_auth->logout();
			redirect('user/user/login');
		} else {

			// jika belum login
			redirect('user/user/login');
		}
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user/user.php */