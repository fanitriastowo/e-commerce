<?php 

class Product extends Frontend_Controller {

	function __construct() {
		parent::__construct();
	}

	public function detail($id) {
		$this->data['product_detail'] = $this->product_m->get($id, TRUE);
		$this->load->view('product_detail', $this->data);
	}
}