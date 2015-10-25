<?php 

class Pesan extends User_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('product_m');
		$this->load->model('pemesanan_m');
		$this->load->model('pemesanan_detail_m');
		$this->load->library('cart');
	}

	public function add_product($id) {
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
		$this->cart->insert($data);
		redirect('home');
	}

	public function total_products() {
		$total_products = $this->cart->total_items();
		return $this->output->set_content_type('application/json')->set_output(json_encode($total_products));
	}

	public function show_all_products() {
		$this->data['pemesanans'] = $this->cart->contents();
		$this->load->view('user/daftar_pesanan', $this->data);
	}

	public function checkout(){
		$principal = $this->ion_auth->user()->row();
		$details = $this->cart->contents();
		if (count($this->cart->contents())) {
			$pemesanan = array(
					'unique_pemesanan' => date('Ymdhis'),
					'user_id' => $principal->id,
					'created' => date('Y-m-d h:i:s'),
					'status' => 'Proses'
				);
			$pemesanan_id = $this->pemesanan_m->save($pemesanan);
			foreach ($details as $detail) {
				$detail = array(
						'pemesanan_id' => $pemesanan_id,
						'product_id' => $detail['id'],
						'name' => $detail['name'],
						'qty' => $detail['qty'],
						'price' => $detail['price'],
						'subtotal' => $detail['subtotal']
					);
				$this->pemesanan_detail_m->save($detail);
			}

			// Destroy cart
			$this->cart->destroy();
			redirect('user/profile');
		}	
	}
}