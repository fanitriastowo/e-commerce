<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends Admin_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('product_m');
		$this->load->model('category_m');
	}

	/**
	 * [tampilkan daftar product]
	 */
	public function index() {
		$model['products'] = $this->product_m->get_all_product_and_category();
		$model['categories_dropdown'] = $this->category_m->get_all_array();
		$this->load->view('administrator/product', $model);
	}

	/**
	 * [ambil detail product]
	 * @param  [integer] $id [id product]
	 * @return [object]  [product json format]
	 */
	public function detail($id) {
		$product = $this->product_m->get($id);
		return $this->output->set_content_type('application/json')->set_output(json_encode($product));
	}

	/**
	 * [simpan product baru]
	 */
	public function insert() {

		// Ambil value form
		$name = $this->input->post('name');
		$nice_name = str_replace(' ', '_', $name);
		$price = $this->input->post('price');
		$category_id = $this->input->post('category_id');
		$description = $this->input->post('description');

		// ambil product rules
		$rules = $this->product_m->rules;

		// set rules
		$this->form_validation->set_rules($rules);

		// check value
		if ($this->input->post('form_insert')) {
			if ($this->form_validation->run() == TRUE) {

				// Set filename
				$config['file_name'] = time().$name;
				$config['upload_path'] = './images/products/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '500';
				$config['max_width']  = '1024';
				$config['max_height']  = '1024';
				$this->load->library('upload', $config);

				// Do Upload
				if ( ! $this->upload->do_upload('add_filename')){
					// assign ke array
					$product = array(
						'category_id' => $category_id,
						'name' => $name,
						'price' => $price,
						'description' => $description
					);

					$this->product_m->save($product);
					$this->session->set_flashdata('notif', 'Insert Product Successful!');
					redirect('akuinginwisuda/product');
				} else {
					$data = $this->upload->data();
					
					// assign ke array
					$product = array(
						'category_id' => $category_id,
						'name' => $name,
						'price' => $price,
						'description' => $description,
						'filename' => time().$nice_name.$data['file_ext']
					);

					$this->product_m->save($product);
					$this->session->set_flashdata('notif', 'Insert Product Successful!');
					redirect('akuinginwisuda/product');
				}
			} else {
				$this->session->set_flashdata('error_insert', validation_errors());
				redirect('akuinginwisuda/product');
			}
		}
	}

	/**
	 * [Hapus product berdasrkan ID]
	 * @param  [integer] $id [id product]
	 */
	public function delete($id) {
		// ambil single product
		$product = $this->product_m->get($id, TRUE);

		// hapus file 
		unlink('images/products/' . $product->filename);

		// Hapus product
		$this->product_m->delete($id);

		// redirect dan tampilkan keterangan
		$this->session->set_flashdata('notif', 'Delete Product Successful!');
		redirect('akuinginwisuda/product');
	}

	/**
	 * [update product berdasrkan form yang sudah terdapat value]
	 */
	public function update() {

		// ambil id dari form_hidden
		$id = $this->input->post('update_id');
		$name = $this->input->post('update_name');
		$nice_name = str_replace(' ', '_', $name);
		$price = $this->input->post('update_price');
		$category_id = $this->input->post('update_category_id');
		$description = $this->input->post('update_description');

		// ambil rules
		$rules = $this->product_m->rules_update;

		// set rules
		$this->form_validation->set_rules($rules);

		// check value
		if ($this->input->post('form_update')) {
			if ($this->form_validation->run() == TRUE) {
				// Set filename
				$config['file_name'] = time().$name;
				$config['upload_path'] = './images/products/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '500';
				$config['max_width']  = '1024';
				$config['max_height']  = '1024';
				$this->load->library('upload', $config);

				// Do Upload
				if ( ! $this->upload->do_upload('update_filename')){
					// assign ke array
					$product = array(
						'category_id' => $category_id,
						'name' => $name,
						'price' => $price,
						'description' => $description
					);
					$this->product_m->save($product, $id);
					$this->session->set_flashdata('notif', 'Update Product Successful!');
					redirect('akuinginwisuda/product');
				} else {
					$data = $this->upload->data();
					$product = $this->product_m->get($id, TRUE);

					// hapus file 
					unlink('images/products/' . $product->filename);

					$product = array(
						'category_id' => $category_id,
						'name' => $name,
						'price' => $price,
						'description' => $description,
						'filename' => time().$nice_name.$data['file_ext']
					);
					$this->product_m->save($product, $id);
					$this->session->set_flashdata('notif', 'Update Product Successful!');
					redirect('akuinginwisuda/product');
				}
			} else {
				$this->session->set_flashdata('error_update', validation_errors());
				redirect('akuinginwisuda/product');
			}
		}
	}
}

/* End of file product.php */
/* Location: ./application/controllers/akuinginwisuda/product.php */