<?php 

class User extends Admin_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user_m');
	}

	public function index() {
		$model['users'] = $this->user_m->get();
		$this->load->view('administrator/user', $model);
	}
}