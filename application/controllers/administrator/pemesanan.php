<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pemesanan extends Admin_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('pemesanan_m');
		$this->load->model('pemesanan_detail_m');
	}

	/**
	 * [ambil daftar pemesanan dengan status proses dan tanggal ASC]
	 */
	public function index() {
		$model['pemesanans'] = $this->pemesanan_m->get_pemesanan_with_user();
		$this->load->view('administrator/pemesanan', $model);
	}

	/**
	 * [ambil detail pemesanan dan convert ke json]
	 * @param  [integer] $id [Pemesanan ID]
	 * @return [object]     [Json Format]
	 */
	public function detail($id)	{
		$pemesanan = $this->pemesanan_m->get_pemesanan_and_user_by_pemesanan_id($id);
		$pemesanan_details = $this->pemesanan_detail_m->get_pemesanan_detail_by_pemesanan_id($id);
		$model = array(
			'pemesanan' => $pemesanan, 
			'pemesanan_details' => $pemesanan_details
		);
		$this->load->view('administrator/pemesanan_detail', $model);
	}

	public function approve() {
		$id = $this->input->post('approve_id');
		$data = array(
			'status' => 'Disetujui'
		);
		$this->pemesanan_m->save($data, $id);
		redirect('administrator/pemesanan');
	}
}

/* End of file Pemesanan.php */
/* Location: ./application/controllers/administrator/pemesanan.php */