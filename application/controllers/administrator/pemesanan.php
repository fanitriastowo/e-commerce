<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pemesanan extends Admin_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('pemesanan_m');
	}

	/**
	 * [ambil daftar pemesanan dengan status proses dan tanggal ASC]
	 */
	public function index() {
		$model['pemesanans'] = $this->pemesanan_m->get_pemesanan_with_user();
		$this->load->view('administrator/pemesanan', $model);
	}	
}

/* End of file Pemesanan.php */
/* Location: ./application/controllers/administrator/pemesanan.php */