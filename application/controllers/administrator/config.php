<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config extends Admin_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user_m');
	}

	public function index() {
		$principal['admin'] = $this->ion_auth->user()->row();
		$this->load->view('administrator/config', $principal);
	}

	/**
	 * [Ganti akun Admin]
	 */
	public function update() {
		// ambil data dari form bootstrap modal
		$id = $this->input->post('update_id');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$password = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$address = $this->input->post('address');

		// Assign ke array
		$data = array(
			'first_name' => $first_name,
			'last_name' => $last_name,
			'password' => $password,
			'confirm_password' => $confirm_password,
			'email' => $email,
			'phone' => $phone,
			'address' => $address
		);
		// ambil rules_update
		$rules = $this->user_m->rules_update;

		// set rules
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$this->ion_auth->update($id, $data);
			$this->session->set_flashdata('notif', 'Update Admin Successful!');
			redirect('administrator/config');
		} else {
			$this->session->set_flashdata('error_update', validation_errors());
			redirect('administrator/config');
		}
	}
}

/* End of file config.php */
/* Location: ./application/controllers/administrator/config.php */