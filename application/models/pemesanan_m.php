<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pemesanan_m extends MY_Model {

	protected $_table_name = 'pemesanan';
	protected $_timestamps = TRUE;
	protected $_order_by = 'created ASC';

	function __construct() {
		parent::__construct();
	}

	/**
	 * [ganti status]
	 * @param  [array] $data [data update]
	 * @param  [integer] $id [id pemesanan]
	 */
	public function approve_pemesanan($data, $id) {
		$this->_timestamps = FALSE;
		return $this->save($data, $id);
	}
	
	/**
	 * [ambil pemesanan berdasarkan member id]
	 * @param  [integer] $id [id member]
	 * @return [object]     [single object]
	 */
	public function get_pemesanan_by_member($id) {
		return $this->get_by('user_id', $id, FALSE);
	}

	/**
	 * [ambil daftar pemesanan beserta membernya]
	 * @return [list object] [list object pemesanan]
	 */
	public function get_pemesanan_with_user(){
		// select P.id, P.created, P.status, U.first_name, U.last_name
		$this->db->select('P.id, P.created, P.status, U.first_name, U.last_name, U.domisili');
		
		// from Pemesanan P
		$this->db->from('pemesanan P');

		// Join User U ON P.user_id = U.id
		$this->db->join('users U', 'P.user_id = U.id');

		// Where P.status = 'Proses'
		// $this->db->where('P.status', 'Proses');
		
		$this->db->order_by('P.status DESC');

		// Return list object Pemesanan & User
		return $this->db->get()->result();
	}

	/**
	 * [ambil pemesanan dan user berdasarkan pemesanan id]
	 * @param  [integer] $id [pemesanan id]
	 * @return [object]     [object pemesanan & user]
	 */
	public function get_pemesanan_and_user_by_pemesanan_id($id){
		// select P.*, U.first_name, U.last_name, U.address
		$this->db->select('P.*, U.first_name, U.last_name, U.address');

		// from pemesanan P
		$this->db->from('pemesanan P');

		// join users U, ON P.user_id = U.id
		$this->db->join('users U', 'P.user_id = U.id');

		// where P.id = $id
		$this->db->where('P.id', $id);

		// return pemesanan object
		return $this->db->get()->row();
	}
}

/* End of file pemesanan_m.php */
/* Location: ./application/model/pemesanan_m.php */