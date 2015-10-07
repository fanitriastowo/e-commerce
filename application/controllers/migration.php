<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration extends CI_Controller {

	/**
	 * [__construct default constructor from CI_Controller]
	 */
	function __construct() {
		parent::__construct();
	}

	/**
	 * [Generate table base on version]
	 * @param  [Integer] $version [Migration Version]
	 * @return [String]          [Show Message if doesn't work]
	 */
	public function migrate($version) {
		$this->load->library('migration');
		if ( ! $this->migration->version($version)) {
			show_error($this->migration->error_string());
		} else {
			echo "Migration Worked";
		}
	}
}

/* End of file migration.php */
/* Location: ./application/controllers/migration.php */