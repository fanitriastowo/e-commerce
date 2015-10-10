<?php 

class Product extends Admin_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('product_m');
	}

	public function index() {
		$model['products'] = $this->product_m->get();
		$this->load->view('administrator/product', $model);
	}
}