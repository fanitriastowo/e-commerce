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
		$this->db->select('pemesanan.id, pemesanan.created, pemesanan.status, users.first_name, users.last_name, users.domisili');
		
		// from Pemesanan P
		$this->db->from('pemesanan');

		// Join User U ON P.user_id = U.id
		$this->db->join('users', 'pemesanan.user_id = users.id');

		$this->db->order_by('pemesanan.created ASC');

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
		$this->db->select('pemesanan.*, users.first_name, users.last_name, users.address');

		// from pemesanan P
		$this->db->from('pemesanan');

		// join users U, ON P.user_id = U.id
		$this->db->join('users', 'pemesanan.user_id = users.id');

		// where P.id = $id
		$this->db->where('pemesanan.id', $id);

		// return pemesanan object
		return $this->db->get()->row();
	}

	/**
	 * [ambil pemesanan dengan grouping]
	 * @return [object] [list pemesanan object]
	 */
	public function get_for_chart() {
		// Select users.domisili and count(pemesanan.id)
		$this->db->select('users.domisili AS domisili, COUNT(pemesanan.id) AS jumlah');

		// From users
		$this->db->from('users');

		// join pemesanan
		$this->db->join('pemesanan', 'users.id = pemesanan.user_id');

		// group by domisili
		$this->db->group_by('domisili');

		// return pemesanan object
		return $this->db->get()->result();
	}

	/**
	 * [count_pemesanan description]
	 * @return [type] [description]
	 */
	public function count_pemesanan() {

		// select count all data
		$this->db->select('COUNT(pemesanan.id) AS total');

		// from pemesanan
		$this->db->from('pemesanan');

		// return single result
		return $this->db->get()->row();
	}
}

/* End of file pemesanan_m.php */
/* Location: ./application/model/pemesanan_m.php */