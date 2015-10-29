<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config extends Admin_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$principal['admin'] = $this->ion_auth->user()->row();
		$this->load->view('administrator/config', $principal);
	}
}

/* End of file config.php */
/* Location: ./application/controllers/administrator/config.php */