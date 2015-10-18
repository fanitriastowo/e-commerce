<?php 

class Admin_Controller extends MY_Controller {

	function __construct() {
		parent::__construct();
		// URL Exception
		$exception = array('administrator/administrator/login', 'administrator/administrator/post_login', 'administrator/administrator/logout');

		if ($this->ion_auth->logged_in() == FALSE && $this->ion_auth->is_admin() == FALSE && !in_array(uri_string(), $exception)) {

			// jika belum login, bukan admin dan selain URL Exception
            redirect('administrator/administrator/login');

        } else if ($this->ion_auth->logged_in() == TRUE && $this->ion_auth->is_admin() == FALSE && !in_array(uri_string(), $exception)) {

        	// Jika Sudah login, bukan admin dan selain URL Exception
        	show_404();
        }
	}
}