<?php 

class Category_m extends MY_Model {

	protected $_table_name = 'categories';
	protected $_order_by = 'name';

	/**
	 * [default constructor from MY_Model]
	 */
	function __construct() {
		parent::__construct();
	}
}

/* End of file category_m.php */
/* Location: ./application/models/category_m.php */