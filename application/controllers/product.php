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
}

/* End of file product.php */
/* Location: ./application/controllers/product.php */