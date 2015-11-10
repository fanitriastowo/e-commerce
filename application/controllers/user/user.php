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
		if ($this->ion_auth->logged_in()) {
        	redirect('user/profile');
        }
		$this->load->view('user/login', $this->data);
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
		if ($this->ion_auth->login($email, $password)) {
			redirect('home');
		} 
		
		// jika invalid
		$this->session->set_flashdata('error', TRUE);
		redirect('user/user/login');
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

	/**
	 * [Quick Login]
	 */
	public function quick_login () {
		// ambil value dari form login
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// check credential dan jika buka administrator
		if ($this->ion_auth->login($email, $password)) {
			// Jika member
			redirect('product/show_all_products');
		} else {
			// Jika administrator
			$this->session->set_flashdata('failed', "Kombinasi email atau password tidak valid");
			redirect('product/show_all_products');
		}
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user/user.php */