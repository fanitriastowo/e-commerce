<?php 

class MY_Controller extends CI_Controller {

	public $data = array();

	function __construct() {
		parent::__construct();
		$this->load->model('testimoni_m');
		$this->data['testimonis_footer'] = $this->testimoni_m->get_all_limit(2);
	}
}