<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Akuinginwisuda extends Admin_Controller {

	/**
	 * default constructor turunan Admin_Controller
	 * check apakah login sebagai admin atau tidak
	 */
	function __construct() {
		parent::__construct();
	}

	/**
	 * redirect halaman login admin
	 */
	public function index() {
		redirect('administrator/administrator/login');
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */