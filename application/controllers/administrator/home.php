<?php 

class Home extends Admin_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->view('administrator/home');
	}
}