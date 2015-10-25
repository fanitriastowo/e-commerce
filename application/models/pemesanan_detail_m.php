<?php 

class Pemesanan_Detail_m extends MY_Model {

	protected $_table_name = 'pemesanan_detail';
	protected $_order_by = 'pemesanan_id ASC';

	function __construct() {
		parent::__construct();
	}
}