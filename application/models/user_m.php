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
					'rules' => 'trim|matches[confirm_password]|required|xss_clean'
				),
				'confirm_password' => array(
					'field' => 'confirm_password', 
					'label' => 'Confirm password', 
					'rules' => 'trim|matches[password]|required|xss_clean'
				),
				'phone' => array(
					'field' => 'phone', 
					'label' => 'Phone', 
					'rules' => 'trim|integer|max_length[15]|required|xss_clean'
				),
				'domisili' => array(
					'field' => 'domisili', 
					'label' => 'Domisili', 
					'rules' => 'trim|required|xss_clean'
				),
				'address' => array(
					'field' => 'address', 
					'label' => 'Address', 
					'rules' => 'trim|required|xss_clean'
				)
			);

	public $rules_update = array(
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
					'rules' => 'trim|integer|max_length[15]|required'
				),
				'domisili' => array(
					'field' => 'domisili', 
					'label' => 'Domisili', 
					'rules' => 'trim|required|xss_clean'
				),
				'address' => array(
					'field' => 'address', 
					'label' => 'Address', 
					'rules' => 'trim|required|xss_clean'
				)
			);

		public $rules_update_admin = array(
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
					'rules' => 'trim|integer|max_length[15]|required'
				),
				'address' => array(
					'field' => 'address', 
					'label' => 'Address', 
					'rules' => 'trim|required|xss_clean'
				)
			);
	/**
	 * [default constructor from MY_Model]
	 */
	function __construct() {
		parent::__construct();
	}

}

/* End of file user_m.php */
/* Location: ./application/models/user_m.php */