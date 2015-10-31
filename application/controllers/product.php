<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends Frontend_Controller {

	/**
	 * [__construct default constructor from Frontend_Controller]
	 */
	function __construct() {
		parent::__construct();
	}

	/**
	 * generate detail for single product base on id
	 * @param  Integer $id [product id in products table]
	 * @return [view(product_detail)]     [generete product detail view]
	 */
	public function detail($id) {
		$this->data['product_detail'] = $this->product_m->get($id, TRUE);
		$this->load->view('product_detail', $this->data);
	}
	
	/**
	 * count product by category id
	 * @param integer $id
	 * @return integer json object
	 */
	public function count_product_by_category($id) {
		$count = $this->product_m->count_product_by_category($id);
		return $this->output->set_content_type('application/json')->set_output(json_encode($count));
	}
}

/* End of file product.php */
/* Location: ./application/controllers/product.php */