<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends Frontend_Controller {

	/**
	 * [__construct default constructor from Frontend_Controller]
	 */
	function __construct() {
		parent::__construct();
	}

	/**
	 * retrieve all product base on category_id
	 * @param  Integer $id [Category Id in products table]
	 * @return [view(category_detail)]     [generete cateogry view]
	 */
	public function detail($id) {
		$this->data['produts_by_categories'] = $this->product_m->get_all_by_category_id($id);
		$this->load->view('category_detail', $this->data);
	}
}

/* End of file category.php */
/* Location: ./application/controllers/category.php */