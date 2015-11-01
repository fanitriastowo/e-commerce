<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesan extends User_Controller {

	/**
	 * [Default constructor from User_Controller]
	 * [check apakah login sebagai admin atau tidak]
	 */
	function __construct() {
		parent::__construct();
		// Load Model dan cart library
		$this->load->model('product_m');
		$this->load->model('pemesanan_m');
		$this->load->model('pemesanan_detail_m');
		$this->load->library('cart');
	}
}

/* End of file pesan.php */
/* Location: ./application/controllers/user/pesan.php */