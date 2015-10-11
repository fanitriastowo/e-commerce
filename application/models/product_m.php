<?php 

class Product_m extends MY_Model {

	protected $_table_name = 'products';
	protected $_order_by = 'created desc';

	/**
	 * [default constructor from MY_Model]
	 */
	function __construct() {
		parent::__construct();
	}

	/**
	 * [Fetch all products but limit to 7 item only]
	 * @param  integer $limit [default limitation if there's no parameter]
	 * @return [products]         [Return all product]
	 */
	public function get_all_limit($limit = 7) {

		// Cast parameter to Integer for security
		$limit = (int) $limit;

		// Limit data
		$this->db->limit($limit);

		// return it using get() method from MY_Model
		return parent::get();
	}
	
	/**
	 * [Fetch all products order by name and limit to 6 item]
	 * @param  integer $limit [default limitation if there's no parameter]
	 * @return [products]         [Return all Product]
	 */
	public function get_all_random($limit = 6) {

		// Cast parameter to Integer for security
		$limit = (int) $limit;

		// give an order by product name
		$this->_order_by = 'name';

		// Limit data
		$this->db->limit($limit);

		// return it using get() method from MY_Model
		return parent::get();
	}

	/**
	 * [Fetch all products base on category id]
	 * @param  Integer $id [Category Id]
	 * @return [products]     [products by category id]
	 */
	public function get_all_by_category_id($id) {

		// Limit data
		$this->db->limit(6);

		// return it using get_by() method from MY_Model
		return parent::get_by('category_id', $id);
	}

	public function get_all_product_and_category() {
		$this->db->select('products.*, categories.name AS category_name');
        $this->db->join('categories', 'products.category_id = categories.id');
        return parent::get();
	}
}

/* End of file product_m.php */
/* Location: ./application/models/product_m.php */