<?php 

class Product_m extends MY_Model {

	protected $_table_name = 'PRODUCTS';
	protected $_order_by = 'name';

	function __construct() {
		parent::__construct();
	}
}