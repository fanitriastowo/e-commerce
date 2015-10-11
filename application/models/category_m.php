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

	public function get_all_array(){
		$result = $this->db->get($this->_table_name)->result_array();
		$return = array();
		if( is_array( $result ) && count( $result ) > 0 ){
			foreach($result as $row) {
				$return[$row['name']] = $row['name'];
			}
		}
		return $return;
	}
}

/* End of file category_m.php */
/* Location: ./application/models/category_m.php */