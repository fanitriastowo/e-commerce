<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pemesanan_Detail_m extends MY_Model {

	protected $_table_name = 'pemesanan_detail';
	protected $_order_by = 'pemesanan_id ASC';

	function __construct() {
		parent::__construct();
	}

	public function get_pemesanan_detail_by_pemesanan_id($id) {
		$this->db->select('*');
		$this->db->from('pemesanan_detail');
		$this->db->where('pemesanan_id', $id);
		return $this->db->get()->result();
	}
}

/* End of file pemesanan_detail_m.php */
/* Location: ./application/model/pemesanan_detail_m.php */