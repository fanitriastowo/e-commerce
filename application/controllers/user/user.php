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

	/**
	 * [Registration POST Method]
	 * @return [view('user/login')] [redirect to login page]
	 */
	public function registration() {

		// Ambil value form
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');
		$phone = $this->input->post('phone');
		$address = $this->input->post('address');
		$additional = array(
						'first_name' => $first_name,
						'last_name' => $last_name,
						'phone' => $phone,
						'address' => $address
					);
		// ambil rule dari 'model/user_m'
		$rules = $this->user_m->rules;

		// set validation rules
		$this->form_validation->set_rules($rules);

		// check validation
		if ($this->form_validation->run() == TRUE) {
			$this->ion_auth->register($first_name, $password, $email, $additional);
			$this->session->set_flashdata('notif_register', 'Registration Successful!');
			redirect('user/user/login');
		} else {
			$this->session->set_flashdata('error_register', validation_errors());
			redirect('user/user/login');
		}
	}

	/**
	 * helper method untuk check unique email
	 * @return [boolean] [TRUE jika email bisa digunakan]
	 */
	public function _unique_email(){
		// Do NOT validate if email already exists
		// UNLESS it's the email for the current user
		
		$this->db->where('email', $this->input->post('email'));
		$user = $this->user_m->get();
		
		if (count($user)) {
			// Set pesan 
			$this->form_validation->set_message('_unique_email', '%s should be unique');
			return FALSE;
		}
		
		return TRUE;
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user/user.php */