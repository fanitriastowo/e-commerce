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
	
}

/* End of file product.php */
/* Location: ./application/controllers/product.php */