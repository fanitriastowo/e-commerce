<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends Frontend_Controller {

	/**
	 * mengambil data category dan latest product 
	 * untuk left bar dan right bar
	 */
	function __construct() {
		parent::__construct();
	}

	/**
	 * load view 'about' dan membawa category list dan latest product list
	 */
	public function index() {
		$this->load->view('about', $this->data);
	}
}

/* End of file about.php */
/* Location: ./application/controllers/about.php */