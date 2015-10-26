<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesan extends User_Controller {

	/**
	 * [Default constructor from User_Controller]
	 * [check apakah login sebagai admin atau tidak]
	 */
	function __construct() {
		parent::__construct();
		// Load Model dan cart library
		$this->load->model('product_m');
		$this->load->model('pemesanan_m');
		$this->load->model('pemesanan_detail_m');
		$this->load->library('cart');
	}

	/**
	 * [tambahkan product berdasarkan id ke keranjang]
	 * @param [int] $id [id Product di product detail]
	 */
	public function add_product($id) {
		// ambil form value
		$qty = $this->input->post('qty');
		$product = $this->product_m->get($id, TRUE);
		$data = array(
			'id'      => $id,
			'qty'     => $qty,
			'price'   => $product->price,
			'name'    => $product->name,
			'options' => array(
				'description' => $product->description
			)
		);
		// simpan $data array ke keranjang
		$this->cart->insert($data);

		// redirect ke halaman semula
		$this->session->set_flashdata('notif', 'Product berhasil ditambahkan, klik tombol keranjang untuk melihat daftar pesanan');
		redirect('product/detail/' . $id);
	}

	/**
	 * [ambil total product yang masuk keranjang]
	 * @return [integer] [total product json format]
	 */
	public function total_products() {
		if ($this->ion_auth->in_group('members')) {	
			// ambil total item di cart
			$total_products = $this->cart->total_items();
			// return berupa json
			return $this->output->set_content_type('application/json')->set_output(json_encode($total_products));
		}
	}

	/**
	 * [menampilkan daftar pesanan]
	 * tampilkan di halaman daftar pesanan
	 */
	public function show_all_products() {
		// simpan di global $data array karena halaman ini membutuhkan left panel & right panel data
		$this->data['pemesanans'] = $this->cart->contents();
		$this->load->view('user/daftar_pesanan', $this->data);
	}

	/**
	 * [checkout pemesanan]
	 * pemesanan yang dipilih akan masuk kedalam detail pemesanan
	 * detail pemesanan berelasi dengan table pemesanan
	 * table pemesanan menyimpan tanggal dan status pemesanan
	 * @return [string] [redirect ke halaman profile member]
	 */
	public function checkout(){
		// ambil object principal (user login)
		$principal = $this->ion_auth->user()->row();

		// ambil data di keranjang
		$details = $this->cart->contents();

		// cek jika keranjang berisi
		if (count($this->cart->contents())) {

			// siapkan data untuk disimpan ke table pemesanan
			// Unique pemesanan harus unique dan diambil dari tanggal
			// tambahkan status menjadi 'Proses'
			$pemesanan = array(
					'unique_pemesanan' => date('Ymdhis'),
					'user_id' => $principal->id,
					'created' => date('Y-m-d h:i:s'),
					'status' => 'Proses'
				);
			// Simpan pemesanan ke table pemesanan dan return id
			$pemesanan_id = $this->pemesanan_m->save($pemesanan);

			// ambil data di keranjang
			foreach ($details as $detail) {

				// masukkan ke detail_pemesanan
				$detail_pemesanan = array(
						'pemesanan_id' => $pemesanan_id,
						'product_id' => $detail['id'],
						'name' => $detail['name'],
						'qty' => $detail['qty'],
						'price' => $detail['price'],
						'subtotal' => $detail['subtotal']
					);
				// Simpan detail pemesanan
				$this->pemesanan_detail_m->save($detail_pemesanan);
			}

			// Destroy cart
			$this->cart->destroy();

			// redirect ke halaman profile
			redirect('user/profile');
		}	
	}
}

/* End of file pesan.php */
/* Location: ./application/controllers/user/pesan.php */