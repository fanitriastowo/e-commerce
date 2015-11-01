<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caramemesan extends Frontend_Controller {

	/**
	 * mengambil data category dan latest product 
	 * untuk left bar dan right bar
	 */
	function __construct() {
		parent::__construct();
	}

	/**
	 * load view 'ketentuan' dan membawa category list dan latest product list
	 */
	public function index() {
		$this->load->view('caramemesan', $this->data);
	}
}

/* End of file ketentuan.php */
/* Location: ./application/controllers/ketentuan.php */