<?php 

class User_m extends MY_Model {

	protected $_table_name = 'users';
	protected $_order_by = 'email';

	function __construct() {
		parent::__construct();
	}
}