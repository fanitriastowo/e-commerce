<?php 

class Product extends Admin_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('product_m');
	}

	public function index() {
		$model['products'] = $this->product_m->get_all_product_and_category();
		$this->load->view('administrator/product', $model);
	}
}