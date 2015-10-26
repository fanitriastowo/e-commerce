<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pemesanan_m extends MY_Model {

	protected $_table_name = 'pemesanan';
	protected $_timestamps = TRUE;
	protected $_order_by = 'created ASC';

	function __construct() {
		parent::__construct();
	}

	public function get_pemesanan_with_user(){
		$this->db->select('P.id, P.created, P.status, U.first_name, U.last_name');
		$this->db->from('pemesanan P');
		$this->db->join('users U', 'P.user_id = U.id');
		$this->db->where('P.status', 'Proses');
		return $this->db->get()->result();
	}

	public function get_pemesanan_and_user_by_pemesanan_id($id){
		$this->db->select('P.*, U.first_name, U.last_name, U.address');
		$this->db->from('pemesanan P');
		$this->db->join('users U', 'P.user_id = U.id');
		$this->db->where('P.id', $id);
		return $this->db->get()->row();
	}
}

/* End of file pemesanan_m.php */
/* Location: ./application/model/pemesanan_m.php */