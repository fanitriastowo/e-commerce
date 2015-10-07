<?php 

class User_m extends MY_Model {

	function __construct() {
		parent::__construct();
	}

	public function hash($string){
		return hash('sha512', $string . config_item('encryption_key'));
	}
}