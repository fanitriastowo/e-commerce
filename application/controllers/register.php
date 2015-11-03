<?php 

class Register extends Frontend_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user_m');
	}

	public function index() {
		$this->generate_captcha();
		$this->load->view('register', $this->data);
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
  		$captcha_word = $this->input->post('captcha_word');
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
	 * [Quick Registration POST Method]
	 * @return [view('daftar_pesanan')] [redirect ke halaman daftar pesanan]
	 */
	public function quick_registration() {

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
		$this->form_validation->set_rules('captcha_word', 'Captcha', 'required|callback__check_captcha');

		// check validation
		if ($this->form_validation->run() == TRUE) {
			$this->ion_auth->register($first_name, $password, $email, $additional);
			$this->ion_auth->login($email, $password);
			$this->session->set_flashdata('notif', 'Registration Successful!');
			redirect('product/show_all_products');
		} else {
			$this->session->set_flashdata('failed', validation_errors());
			redirect('product/show_all_products');
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

	/**
	 * [Check captcha word]
	 * @param  [string] $str [kata captcha]
	 * @return [boolean]      [true jika valid]
	 */
	public function _check_captcha($str){
		$word = $this->session->userdata('captchaWord');
		if(strcmp(strtoupper($str),strtoupper($word)) == 0){
			return true;
		}
		else{
			$this->form_validation->set_message('_check_captcha', '%s not valid!');
			return false;
		}
	}
}

/* End of file register.php */
/* Location: ./application/controllers/register.php */
