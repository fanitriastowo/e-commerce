<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Frontend_Controller {

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

		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');
		$phone = $this->input->post('phone');
		$additional = array(
						'first_name' => $first_name,
						'last_name' => $last_name,
						'phone' => $phone
					);
		$rules = $this->user_m->rules;
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE) {
			$this->ion_auth->register($first_name, $password, $email, $additional);
			redirect('user/login');
		} else {
			$this->load->view('login');
		}
	}

	public function _unique_email($str){
		// Do NOT validate if email already exists
		// UNLESS it's the email for the current user
		
		$this->db->where('email', $this->input->post('email'));
		$user = $this->user_m->get();
		
		if (count($user)) {
			$this->form_validation->set_message('_unique_email', '%s should be unique');
			return FALSE;
		}
		
		return TRUE;
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */