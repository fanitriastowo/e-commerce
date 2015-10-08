<?php 

class Frontend_Controller extends MY_Controller {

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
}