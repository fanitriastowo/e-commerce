<?php 

class User_Controller extends MY_Controller {

	function __construct() {
		parent::__construct();
		// Load Model
		$this->load->model('category_m');
		$this->load->model('product_m');
		$this->load->model('user_m');
		
		// Fetch All Categories
		$this->data['categories'] = $this->category_m->get();

		// Fetch All Products
		$this->data['products'] = $this->product_m->get_all_limit();

		// URL Exception
		$exception = array(
			'user/user/login', 
			'user/user/post_login', 
			'user/user/logout',
			'user/user/quick_login'
		);

		if ($this->ion_auth->logged_in() == FALSE && $this->ion_auth->in_group('members') == FALSE && !in_array(uri_string(), $exception)) {
			// Jika belum login, member dan selain URL Exception
            redirect('user/user/login');

        } else if ($this->ion_auth->logged_in() == TRUE && $this->ion_auth->is_admin() == TRUE && !in_array(uri_string(), $exception)) {
        	// Jika Sudah Login, admin dan selain URL Exception
        	show_404();
        }
	}
}