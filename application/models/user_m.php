<?php 

class User_m extends MY_Model {

	protected $_table_name = 'users';
	protected $_order_by = 'email';
	public $rules = array(
				'first_name' => array(
					'field' => 'first_name', 
					'label' => 'Firstname', 
					'rules' => 'trim|required|xss_clean'
				), 
				'last_name' => array(
					'field' => 'last_name', 
					'label' => 'Lastname', 
					'rules' => 'trim|required|xss_clean'
				), 
				'email' => array(
					'field' => 'email', 
					'label' => 'Email', 
					'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean'
				), 
				'password' => array(
					'field' => 'password', 
					'label' => 'Password', 
					'rules' => 'trim|matches[confirm_password]'
				),
				'confirm_password' => array(
					'field' => 'confirm_password', 
					'label' => 'Confirm password', 
					'rules' => 'trim|matches[password]'
				),
				'phone' => array(
					'field' => 'phone', 
					'label' => 'Phone', 
					'rules' => 'trim|integer|max_length[15]'
				)
			);
	/**
	 * [default constructor from MY_Model]
	 */
	function __construct() {
		parent::__construct();
	}

	public function get_user_by_member() {
		$query = "SELECT users.*
				    FROM users
				        INNER JOIN users_groups
				            ON users.id = users_groups.user_id
				        INNER JOIN groups
				            ON users_groups.group_id = groups.id
				    WHERE groups.name = 'members'";
		return $this->db->query($query)->result();
	}

}

/* End of file user_m.php */
/* Location: ./application/models/user_m.php */