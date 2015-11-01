<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends Frontend_Controller {

	/**
	 * [__construct default constructor from Frontend_Controller]
	 */
	function __construct() {
		parent::__construct();
		$this->load->library('cart');
	}

	/**
	 * generate detail for single product base on id
	 * @param  Integer $id [product id in products table]
	 * @return [view(product_detail)]     [generete product detail view]
	 */
	public function detail($id) {
		$this->data['product_detail'] = $this->product_m->get($id, TRUE);
		$this->load->view('product_detail', $this->data);
	}
	
	/**
	 * count product by category id
	 * @param integer $id
	 * @return integer json object
	 */
	public function count_product_by_category($id) {
		$count = $this->product_m->count_product_by_category($id);
		return $this->output->set_content_type('application/json')->set_output(json_encode($count));
	}
	
	/**
	 * [ambil total product yang masuk keranjang]
	 * @return [integer] [total product json format]
	 */
	public function total_products() {
		// ambil total item di cart
		$total_products = $this->cart->total_items();
		// return berupa json
		return $this->output->set_content_type('application/json')->set_output(json_encode($total_products));
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
		$this->load->model('pemesanan_m');
		$this->load->model('pemesanan_detail_m');

		if ($this->ion_auth->logged_in()) {
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
		} else {
			// tampilkan form login menggunakan modal
			$this->session->set_flashdata('not_logged_in', TRUE);
			redirect('product/show_all_products');
		}	
	}
	
}

/* End of file product.php */
/* Location: ./application/controllers/product.php */