<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Akuinginwisuda extends Admin_Controller {

	function __construct() {
		parent::__construct();
	}

	/**
	 * [View Administrator Login page if login is valid than redirect to administrator view]
	 * @return [view('login')] [show login page]
	 */
	public function login() {
		// redirect if already logged in
        if ($this->ion_auth->is_admin()) {
            redirect('akuinginwisuda/pemesanan');
        } 
		$this->load->view('administrator/login', $this->data);
	}

	/**
	 * [Post Login and check credential]
	 * @return [view('login')] [post login]
	 */
	public function post_login() {
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		if ($this->ion_auth->login($email, $password) && $this->ion_auth->is_admin()) {
			redirect('akuinginwisuda/pemesanan');
		} else {
			$this->ion_auth->logout();
			$this->session->set_flashdata('error', TRUE);
			redirect('akuinginwisuda/akuinginwisuda/login');
		}
	}

	/**
	 * [Logout Administrator]
	 * @return [view('user/login')] [redirect to login page]
	 */
	public function logout () {
		if ($this->ion_auth->logged_in()) {
			$this->ion_auth->logout();
			redirect('akuinginwisuda/akuinginwisuda/login');
		} else {
			redirect('akuinginwisuda/akuinginwisuda/login');
		}
	}
}

/* End of file akuinginwisuda.php */
/* Location: ./application/controllers/akuinginwisuda/akuinginwisuda.php */