<?php 

class Product_m extends MY_Model {

	protected $_table_name = 'products';
	protected $_order_by = 'created desc';

	function __construct() {
		parent::__construct();
	}

	public function get_all_limit($limit = 7) {

		// Fetch a limited number of recent articles
		$limit = (int) $limit;
		$this->db->limit($limit);
		return parent::get();
	}
	
	public function get_all_random($limit = 6) {

		// Fetch a limited number of recent articles
		$limit = (int) $limit;
		$this->_order_by = 'name';
		$this->db->limit($limit);
		return parent::get();
	}

	public function get_all_by_category_id($id) {
		$this->db->limit(6);
		return parent::get_by('category_id', $id);
	}
}