<?php 

class User_m extends MY_Model {

	protected $_table_name = 'users';
	protected $_order_by = 'email';

	/**
	 * [default constructor from MY_Model]
	 */
	function __construct() {
		parent::__construct();
	}
}

/* End of file user_m.php */
/* Location: ./application/models/user_m.php */