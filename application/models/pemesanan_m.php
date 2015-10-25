<?php 

class Pemesanan_m extends MY_Model {

	protected $_table_name = 'pemesanan';
	protected $_timestamps = TRUE;
	protected $_order_by = 'created ASC';

	function __construct() {
		parent::__construct();
	}
}