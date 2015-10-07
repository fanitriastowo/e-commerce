<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * [__construct default constructor from CI_Controller]
	 */
	function __construct() {
		parent::__construct();
		// Load Model
		$this->load->model('category_m');
		$this->load->model('product_m');
	}

	/**
	 * [Home Page, show all list of products and categories]
	 * @return [view(home)]
	 */
	public function index(){
		// Fetch All Categories
		$data['categories'] = $this->category_m->get();

		// Fetch All Products
		$data['products'] = $this->product_m->get();

		// Pass to home view
		$this->load->view('home', $data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */