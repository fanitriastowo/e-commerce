<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends Admin_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user_m');
	}

	/**
	 * [tampilkan daftar member]
	 */
	public function index() {
		$model['members'] = $this->ion_auth->users(2)->result();
		$this->load->view('administrator/member', $model);
	}

	/**
	 * [simpan member baru]
	 */
	public function insert() {

		// ambil form value
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

		// ambil rules
		$rules = $this->user_m->rules;

		// set rules
		$this->form_validation->set_rules($rules);

		// check value
		if ($this->form_validation->run() == TRUE) {
			$this->ion_auth->register($first_name, $password, $email, $additional);
			$this->session->set_flashdata('notif', 'Insert new User Successful!');
			redirect('akuinginwisuda/member');
		} else {
			$this->session->set_flashdata('error', validation_errors());
			redirect('akuinginwisuda/member');
		}
	}

	/**
	 * [Hapus member berdasrkan ID]
	 * @param  [integer] $id [id member]
	 */
	public function delete($id) {
		$this->ion_auth->delete_user($id);
		$this->session->set_flashdata('notif', 'Delete User Successful!');
		redirect('akuinginwisuda/member');
	}

	/**
	 * [ambil detail member]
	 * @param  [integer] $id [id member]
	 * @return [object]  [member json format]
	 */
	public function detail($id) {
		$member = $this->user_m->get($id);
		return $this->output->set_content_type('application/json')->set_output(json_encode($member));
	}

	/**
	 * [update member berdasrkan form yang sudah terdapat value]
	 */
	public function update() {

		// ambil id dari form_hidden
		$id = $this->input->post('update_id');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');
		$phone = $this->input->post('phone');
		$address = $this->input->post('address');
		$data = array (
				'first_name' => $first_name,
				'last_name' => $last_name,
				'email' => $email,
				'password' => $password,
				'phone' => $phone,
				'address' => $address 
		);
		
		// ambil member rules_update
		$rules = $this->user_m->rules_update;

		// set rules
		$this->form_validation->set_rules($rules);

		// check value
		if ($this->form_validation->run() == TRUE) {
			$this->ion_auth->update($id, $data);
			$this->session->set_flashdata('notif', 'Update User Successful!');
			dump($data);
			redirect('akuinginwisuda/member');
		} else {
			$this->session->set_flashdata('error', validation_errors());
			redirect('akuinginwisuda/member');
		}
	}
}

/* End of file member.php */
/* Location: ./application/controllers/akuinginwisuda/member.php */