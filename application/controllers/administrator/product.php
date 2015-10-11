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
}