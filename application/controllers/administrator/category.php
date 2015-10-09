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
}