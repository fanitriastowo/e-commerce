<?php 

class Testimoni_m extends MY_Model {

	protected $_table_name = 'testimoni';
	protected $_order_by = 'created desc';
	protected $_timestamps = TRUE;

	function __construct() {
		parent::__construct();
	}

	/**
	 * [Fetch all testimoni but limit]
	 * @param  integer $limit [default limitation if there's no parameter]
	 * @return [testimonis]         [Return all testimoni]
	 */
	public function get_all_limit($limit = 5) {

		// Cast parameter to Integer for security
		$limit = (int) $limit;

		// Limit data
		$this->db->limit($limit);

		// return it using get() method from MY_Model
		return $this->get();
	}
}