<?php 

class User_Controller extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user_m');

		// URL Exception
		$exception = array('user/user/login', 'user/user/post_login', 'user/user/logout', 'user/user/registration');

		if ($this->ion_auth->logged_in() == FALSE && $this->ion_auth->in_group('members') == FALSE && !in_array(uri_string(), $exception)) {
			// Jika belum login, member dan selain URL Exception
            redirect('user/user/login');

        } else if ($this->ion_auth->logged_in() == TRUE && $this->ion_auth->is_admin() == TRUE && !in_array(uri_string(), $exception)) {
        	// Jika Sudah Login, admin dan selain URL Exception
        	show_404();
        }
	}
}