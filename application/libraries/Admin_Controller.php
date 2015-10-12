<?php 

class Admin_Controller extends MY_Controller {

	function __construct() {
		parent::__construct();
		$exception = array('user/user/login', 'user/user/post_login', 'user/user/logout', 'user/user/registration');
		if ($this->ion_auth->logged_in() == FALSE && $this->ion_auth->in_group('members') == FALSE && !in_array(uri_string(), $exception)) {
            redirect('user/user/login');
        } else if ($this->ion_auth->is_admin() == FALSE && !in_array(uri_string(), $exception)) {
        	show_404();
        }
	}
}