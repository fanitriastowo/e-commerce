<?php 

class Migration extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function migrate($version) {
		$this->load->library('migration');
		if ( ! $this->migration->version($version)) {
			show_error($this->migration->error_string());
		} else {
			echo "Migration Worked";
		}
	}
}