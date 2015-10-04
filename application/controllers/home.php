<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index(){
		$this->load->model('category_m');
		$this->load->model('product_m');
		$data['categories'] = $this->category_m->get();
		$data['products'] = $this->product_m->get();
		$this->load->view('home', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */