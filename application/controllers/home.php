<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Frontend_Controller {

	/**
	 * [__construct default constructor from Frontend_Controller]
	 */
	function __construct() {
		parent::__construct();
	}

	/**
	 * [Home Page, show all list of products but limit that to 6 item]
	 * @return [view(home)]
	 */
	public function index(){

		// Fetch All Random Products
		$this->data['products_rands'] = $this->product_m->get_all_random();

		// Pass to home view
		$this->load->view('home', $this->data);
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */