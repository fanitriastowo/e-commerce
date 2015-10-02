<?php 

class Migration extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->library('migration');
		if ( ! $this->migration->version(2)) {
			show_error($this->migration->error_string());
		} else {
			echo "Migration Worked";
		}
	}
}