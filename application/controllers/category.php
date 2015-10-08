<?php 

class Category extends Frontend_Controller {

	function __construct() {
		parent::__construct();
	}

	public function detail($id) {
		$this->data['produts_by_categories'] = $this->product_m->get_all_by_category_id($id);
		$this->load->view('category_detail', $this->data);
	}
}