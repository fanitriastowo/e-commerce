<?php 

class Profile extends User_Controller {

	function __construct() {
		parent::__construct();
		// Load Model
		$this->load->model('category_m');
		$this->load->model('product_m');
		
		// Fetch All Categories
		$this->data['categories'] = $this->category_m->get();

		// Fetch All Products
		$this->data['products'] = $this->product_m->get_all_limit();
	}

	public function index() {
		$this->data['principal'] = $this->ion_auth->user()->row();
		$this->load->view('user/profile', $this->data);
	}

	public function get_principal() {
		$model = $this->ion_auth->user()->row();
		return $this->output->set_content_type('application/json')->set_output(json_encode($model));
	}

	public function update() {
		$id = $this->input->post('update_id');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$password = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$address = $this->input->post('address');

		$data = array(
					'first_name' => $first_name,
					'last_name' => $last_name,
					'password' => $password,
					'confirm_password' => $confirm_password,
					'email' => $email,
					'phone' => $phone,
					'address' => $address
				);
		$rules = $this->user_m->rules_update;
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE) {
			$this->ion_auth->update($id, $data);
			$this->session->set_flashdata('notif', 'Update Account Successful!');
			redirect('user/profile');
		} else {
			$this->session->set_flashdata('error_update', validation_errors());
			redirect('user/profile');
		}
	}
}