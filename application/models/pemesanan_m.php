<?php 

class Pemesanan_m extends MY_Model {

	protected $_table_name = 'pemesanan';
	protected $_timestamps = TRUE;
	protected $_order_by = 'created ASC';

	function __construct() {
		parent::__construct();
	}

	public function get_pemesanan_with_user(){
		$query = "SELECT P.created, P.status, U.first_name, U.last_name FROM pemesanan P JOIN users U ON P.user_id = U.id WHERE P.status = 'Proses' ORDER BY P.created ASC";
		return $this->db->query($query)->result();
	}
}