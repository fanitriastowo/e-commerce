<?php 

class Ketentuan extends Frontend_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->view('ketentuan', $this->data);
	}
}