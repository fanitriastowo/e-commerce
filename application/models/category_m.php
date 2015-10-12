<?php 

class Category_m extends MY_Model {

	protected $_table_name = 'categories';
	protected $_order_by = 'name';
	public $rules = array(
					'name' => array(
						'field' => 'name', 
						'label' => 'Name',
						'rules' => 'trim|required|xss_clean|max_length[100]'
					)
				);

	public $rules_update = array(
					'name' => array(
						'field' => 'update_name', 
						'label' => 'Name',
						'rules' => 'trim|required|xss_clean|max_length[100]'
					)
				);

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
				$return[$row['id']] = $row['name'];
			}
		}
		return $return;
	}
}

/* End of file category_m.php */
/* Location: ./application/models/category_m.php */