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
	 * load view 'caramemesan' dan membawa category list dan latest product list
	 */
	public function index() {
		$this->load->view('caramemesan', $this->data);
	}
}

/* End of file caramemesan.php */
/* Location: ./application/controllers/caramemesan.php */