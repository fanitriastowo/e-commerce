<?php 

class Category extends Admin_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('category_m');
	}

	public function index() {
		$model['categories'] = $this->category_m->get();
		$this->load->view('administrator/category', $model);
	}

	public function insert() {
		$name = $this->input->post('name');
		$category = array('name' => $name);
		$rules = $this->category_m->rules;
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE) {
			$this->category_m->save($category);
			$this->session->set_flashdata('notif', 'Insert Category Successful!');
			redirect('administrator/category');
		} else {
			$this->session->set_flashdata('error_insert', validation_errors());
			redirect('administrator/category');
		}
	}

	public function detail($id) {
		$category = $this->category_m->get($id);
		return $this->output->set_content_type('application/json')->set_output(json_encode($category));
	}

	public function delete($id) {
		$this->category_m->delete($id);
		$this->session->set_flashdata('notif', 'Delete Category Successful!');
		redirect('administrator/category');
	}

	public function update() {
		$id = $this->input->post('update_id');
		$name = $this->input->post('update_name');
		$category = array('name' => $name);
		$rules = $this->category_m->rules_update;
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE) {
			$this->category_m->save($category, $id);
			$this->session->set_flashdata('notif', 'Update Category Successful!');
			redirect('administrator/category');
		} else {
			$this->session->set_flashdata('error_update', validation_errors());
			redirect('administrator/category');
		}
	}
}