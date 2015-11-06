<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimoni extends Frontend_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('testimoni_m');
	}
	
	/**
	 * [tampilkan daftar testimoni]
	 */
	public function index() {
		$this->data['testimonis'] = $this->testimoni_m->get_all_limit();
		$this->load->view('testimoni', $this->data);
	}

	/**
	 * [Simpan Testimoni]
	 */
	public function post_testimoni() {
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$kota = $this->input->post('kota');
		$pesan = $this->input->post('pesan');

		$testimoni = array(
			'name' => $name,
			'email' => $email,
			'kota' => $kota,
			'pesan' => $pesan
		);

		$this->testimoni_m->save($testimoni);
		redirect('testimoni');
	}
}

/* End of file testimoni.php */
/* Location: ./application/controllers/testimoni.php */