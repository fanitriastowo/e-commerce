<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends Admin_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('category_m');
	}

	/**
	 * [tampilkan daftar kategory]
	 */
	public function index() {
		$model['categories'] = $this->category_m->get();
		$this->load->view('administrator/category', $model);
	}

	/**
	 * [simpan kategori baru]
	 */
	public function insert() {
		
		// Ambil value form
		$name = $this->input->post('name');

		// ambil rules
		$rules = $this->category_m->rules;

		// set rules
		$this->form_validation->set_rules($rules);

		// check jika value benar
		if ($this->form_validation->run() == TRUE) {

			// Set filename
			$config['file_name'] = time().$name;
			$config['upload_path'] = './images/categories/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '500';
			$config['max_width']  = '1024';
			$config['max_height']  = '1024';
			$this->load->library('upload', $config);

			// Do Upload
			if ( ! $this->upload->do_upload('filename')){
				$this->session->set_flashdata('error_insert', $this->upload->display_errors());
				redirect('administrator/category');
			} else {
				$data = $this->upload->data();
				$category = array(
					'name' => $name,
					'filename' => time().$name.$data['file_ext']
				);
				$this->category_m->save($category);
			}
			$this->session->set_flashdata('notif', 'Insert Category Successful!');
			redirect('administrator/category');
		} else {
			$this->session->set_flashdata('error_insert', validation_errors());
			redirect('administrator/category');
		}
	}

	/**
	 * [ambil detail kategori]
	 * @param  [integer] $id [id kategori]
	 * @return [string]     [category json format]
	 */
	public function detail($id) {
		$category = $this->category_m->get($id, TRUE);
		return $this->output->set_content_type('application/json')->set_output(json_encode($category));
	}

	/**
	 * [Hapus kategori berdasrkan ID]
	 * @param  [integer] $id [id kategori]
	 */
	public function delete($id) {
		// ambil single category
		$category = $this->category_m->get($id, TRUE);

		// hapus file menggunakan file helper
		unlink('images/categories/' . $category->filename);

		// hapus category
		$this->category_m->delete($id);

		//tampilkan notifikasi
		$this->session->set_flashdata('notif', 'Delete Category Successful!');
		redirect('administrator/category');
	}

	/**
	 * [update kategori berdasrkan form yang sudah terdapat value]
	 */
	public function update() {

		// ambil id dari form_hidden
		$id = $this->input->post('update_id');
		$name = $this->input->post('update_name');

		// assign ke array
		$category = array('name' => $name);

		// ambil category rules_update
		$rules = $this->category_m->rules_update;

		// set rules
		$this->form_validation->set_rules($rules);

		// check value
		if ($this->form_validation->run() == TRUE) {
			$this->category_m->save($category, $id);
			$this->session->set_flashdata('notif', 'Update Category Successful!');
			redirect('administrator/category');
		} else {
			$this->session->set_flashdata('error_update', validation_errors());
			redirect('administrator/category');
		}
	}
}

/* End of file category.php */
/* Location: ./application/controllers/administrator/category.php */