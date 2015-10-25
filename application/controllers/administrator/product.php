<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends Admin_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('product_m');
		$this->load->model('category_m');
	}

	/**
	 * [tampilkan daftar product]
	 */
	public function index() {
		$model['products'] = $this->product_m->get_all_product_and_category();
		$model['categories_dropdown'] = $this->category_m->get_all_array();
		$this->load->view('administrator/product', $model);
	}

	/**
	 * [ambil detail product]
	 * @param  [integer] $id [id product]
	 * @return [object]  [product json format]
	 */
	public function detail($id) {
		$product = $this->product_m->get($id);
		return $this->output->set_content_type('application/json')->set_output(json_encode($product));
	}

	/**
	 * [simpan product baru]
	 */
	public function insert() {

		// ambil form value
		$name = $this->input->post('name');
		$price = $this->input->post('price');
		$category_id = $this->input->post('category_id');
		$description = $this->input->post('description');

		// assign ke array
		$product = array(
					'category_id' => $category_id,
					'name' => $name,
					'price' => $price,
					'description' => $description
				);

		// ambil product rules
		$rules = $this->product_m->rules;

		// set rules
		$this->form_validation->set_rules($rules);

		// check value
		if ($this->input->post('form_insert')) {
			if ($this->form_validation->run() == TRUE) {
				$this->product_m->save($product);
				$this->session->set_flashdata('notif', 'Insert Product Successful!');
				redirect('administrator/product');
			} else {
				$this->session->set_flashdata('error_insert', validation_errors());
				redirect('administrator/product');
			}
		}
	}

	/**
	 * [Hapus product berdasrkan ID]
	 * @param  [integer] $id [id product]
	 */
	public function delete($id) {
		$this->product_m->delete($id);
		$this->session->set_flashdata('notif', 'Delete Product Successful!');
		redirect('administrator/product');
	}

	/**
	 * [update product berdasrkan form yang sudah terdapat value]
	 */
	public function update() {

		// ambil id dari form_hidden
		$id = $this->input->post('update_id');
		$name = $this->input->post('update_name');
		$price = $this->input->post('update_price');
		$category_id = $this->input->post('update_category_id');
		$description = $this->input->post('update_description');

		// assign ke array
		$product = array(
					'category_id' => $category_id,
					'name' => $name,
					'price' => $price,
					'description' => $description
				);

		// ambil rules
		$rules = $this->product_m->rules_update;

		// set rules
		$this->form_validation->set_rules($rules);

		// check value
		if ($this->input->post('form_update')) {
			if ($this->form_validation->run() == TRUE) {
				$this->product_m->save($product, $id);
				$this->session->set_flashdata('notif', 'Update Product Successful!');
				redirect('administrator/product');
			} else {
				$this->session->set_flashdata('error_update', validation_errors());
				redirect('administrator/product');
			}
		}
	}
}

/* End of file product.php */
/* Location: ./application/controllers/administrator/product.php */