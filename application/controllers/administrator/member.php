<?php 

class Member extends Admin_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user_m');
	}

	public function index() {
		$model['members'] = $this->ion_auth->users(2)->result();
		$this->load->view('administrator/member', $model);
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
			$this->session->set_flashdata('notif', 'Insert new User Successful!');
			redirect('administrator/member');
		} else {
			$this->session->set_flashdata('error', validation_errors());
			redirect('administrator/member');
		}
	}

	public function delete($id) {
		$this->ion_auth->delete_user($id);
		$this->session->set_flashdata('notif', 'Delete User Successful!');
		redirect('administrator/member');
	}

	public function detail($id) {
		$member = $this->user_m->get($id);
		return $this->output->set_content_type('application/json')->set_output(json_encode($member));
	}

	public function update() {
		$id = $this->input->post('update_id');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');
		$phone = $this->input->post('phone');
		$data = array(
					'first_name' => $first_name,
					'last_name' => $last_name,
					'email' => $email,
					'password' => $password,
					'phone' => $phone
				);
		
		$rules = $this->user_m->rules_update;
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE) {
			$this->ion_auth->update($id, $data);
			$this->session->set_flashdata('notif', 'Update User Successful!');
			dump($data);
			redirect('administrator/member');
		} else {
			$this->session->set_flashdata('error', validation_errors());
			redirect('administrator/member');
		}
	}
}