<?php 

class Product_m extends MY_Model {

	protected $_table_name = 'products';
	protected $_order_by = 'created desc';
	protected $_timestamps = TRUE;

	public $rules = array(
				'created' => array(
					'field' => 'created', 
					'label' => 'Created Date',
					'rules' => 'trim|exact_length[10]'
				),
				'category_id' => array(
					'field' => 'category_id', 
					'label' => 'Category ID', 
					'rules' => 'trim|required|integer'
				),
				'name' => array(
					'field' => 'name', 
					'label' => 'Nama', 
					'rules' => 'trim|required|xss_clean'
				),
				'price' => array(
					'field' => 'price', 
					'label' => 'Harga', 
					'rules' => 'trim|required|xss_clean|integer'
				),
				'description' => array(
					'field' => 'description', 
					'label' => 'Deskripsi', 
					'rules' => 'trim|xss_clean'
				)
			);

	public $rules_update = array(
				'created' => array(
					'field' => 'created', 
					'label' => 'Created Date',
					'rules' => 'trim|exact_length[10]'
				),
				'category_id' => array(
					'field' => 'update_category_id', 
					'label' => 'Category ID', 
					'rules' => 'trim|required|integer'
				),
				'name' => array(
					'field' => 'update_name', 
					'label' => 'Nama', 
					'rules' => 'trim|required|xss_clean'
				),
				'price' => array(
					'field' => 'update_price', 
					'label' => 'Harga', 
					'rules' => 'trim|required|xss_clean|integer'
				),
				'description' => array(
					'field' => 'update_description', 
					'label' => 'Deskripsi', 
					'rules' => 'trim|xss_clean'
				)
			);
	/**
	 * [default constructor from MY_Model]
	 */
	function __construct() {
		parent::__construct();
	}

	/**
	 * [Fetch all products but limit]
	 * @param  integer $limit [default limitation if there's no parameter]
	 * @return [products]         [Return all product]
	 */
	public function get_all_limit($limit = 5) {

		// Cast parameter to Integer for security
		$limit = (int) $limit;

		// Limit data
		$this->db->limit($limit);

		// return it using get() method from MY_Model
		return $this->get();
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
	
	/**
	 * count product by category id
	 * @param integer $id
	 */
	public function count_product_by_category($id) {
		$this->db->where('category_id', $id);
		$this->db->from('products');
		return $this->db->count_all_results();
	}
	
	/**
	 * Get Product By like name
	 * @param String product_name
	 */
	public function get_product_like($product_name) {
		$this->db->like('name', $product_name);
		$this->db->order_by('name');
		$query = $this->db->get('products', 10);
		return $query;
	}
}

/* End of file product_m.php */
/* Location: ./application/models/product_m.php */