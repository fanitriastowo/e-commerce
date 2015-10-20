<?php 

class About extends Frontend_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->view('about', $this->data);
	}
}