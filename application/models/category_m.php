<?php 

class Category_m extends MY_Model {

	protected $_table_name = 'CATEGORIES';
	protected $_order_by = 'name';

	function __construct() {
		parent::__construct();
	}
}