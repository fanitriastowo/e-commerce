<?php 

class Product extends Admin_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('product_m');
		$this->load->model('category_m');
	}

	public function index() {
		$model['products'] = $this->product_m->get_all_product_and_category();
		$model['categories_dropdown'] = $this->category_m->get_all_array();
		$this->load->view('administrator/product', $model);
	}

	public function detail($id) {
		$product = $this->product_m->get($id);
		return $this->output->set_content_type('application/json')->set_output(json_encode($product));
	}

	public function insert() {
		if (isset($_POST['submit_save'])) {
			$name = $this->input->post('name');
			$price = $this->input->post('price');
			$category_id = $this->input->post('category_id');
			$description = $this->input->post('description');
			$product = array(
						'category_id' => $category_id,
						'name' => $name,
						'price' => $price,
						'description' => $description
					);
			$rules = $this->product_m->rules;
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run() == TRUE) {
				$this->product_m->save($product);
				$this->session->set_flashdata('notif', 'Insert Product Successful!');
				redirect('administrator/product');
			} else {
				$this->session->set_flashdata('error', 'Insert Product Failed');
				redirect('administrator/product');
			}
		}
	}

	public function delete($id) {
		$this->product_m->delete($id);
		$this->session->set_flashdata('notif', 'Delete Product Successful!');
		redirect('administrator/product');
	}

	public function update() {
		if (isset($_POST['submit_update'])) {
			$id = $this->input->post('update_id');
			$name = $this->input->post('update_name');
			$price = $this->input->post('update_price');
			$category_id = $this->input->post('update_category_id');
			$description = $this->input->post('update_description');
			$product = array(
						'category_id' => $category_id,
						'name' => $name,
						'price' => $price,
						'description' => $description
					);
			$rules = $this->product_m->rules;
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run() == TRUE) {
				$this->product_m->save($product, $id);
				$this->session->set_flashdata('notif_update', 'Update Product Successful!');
				redirect('administrator/product');
			} else {
				$this->session->set_flashdata('error_update', 'Update Product Failed');
				redirect('administrator/product');
			}
		}
	}
}