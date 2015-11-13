<?php 

class Frontend_Controller extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('user_agent');
		
		// Load Model
		$this->load->model('category_m');
		$this->load->model('product_m');
		
		// Fetch All Categories
		$this->data['categories'] = $this->category_m->get();

		// Fetch All Products
		$this->data['products'] = $this->product_m->get_all_limit();
		$this->data['ip_address'] = $this->input->ip_address();
		$this->data['user_agent'] = $this->agent->browser();
	}

	/**
	 * Generate Captcha
	 */
	public function generate_captcha() {
		// Load captcha helper
		$this->load->helper('captcha');

		$vals = array(
			'img_path'	=> "captcha/",
			'img_url'	=> base_url() . "captcha/",
			'img_width'	=> 150,
			'img_height' => 30,
			'expiration' => 7200
		);

		$this->data['captcha'] = create_captcha($vals);
		$this->session->set_userdata('captchaWord',$this->data['captcha']['word']);
	}
}