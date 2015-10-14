<?php 

class User extends Admin_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user_m');
	}

	public function index() {
		$model['users'] = $this->user_m->get_user_by_member();
		$this->load->view('administrator/user', $model);
	}

	public function insert() {
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
			$this->session->set_flashdata('notif_insert', 'Insert new User Successful!');
			redirect('administrator/user');
		} else {
			$this->session->set_flashdata('error_insert', validation_errors());
			redirect('administrator/user');
		}
	}

	public function delete($id) {
		$this->ion_auth->delete_user($id);
		$this->session->set_flashdata('notif_delete', 'Delete User Successful!');
		redirect('administrator/user');
	}
}