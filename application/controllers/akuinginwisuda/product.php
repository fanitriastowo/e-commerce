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
		$this->data['products'] = $this->product_m->get_all_product_and_category();
		$this->data['categories_dropdown'] = $this->category_m->get_all_array();
		$this->load->view('administrator/product', $this->data);
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
		$stok = $this->input->post('stok');

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
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
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
						'description' => $description,
						'stok' => $stok
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
						'stok' => $stok,
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
		if (count($product->filename)) {
			unlink('images/products/' . $product->filename);
		}

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
		$stok = $this->input->post('update_stok');

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
						'description' => $description,
						'stok' => $stok
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
						'stok' => $stok,
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

	/**
	 * [Cetak Semua product urutkan berdasarkan stok terkecil]
	 */
	public function cetak_semua() {
		// load library
		$this->load->library('Report_Controller');

		// ambil data
		$products = $this->product_m->cetak_semua();

		// create new PDF document
		$pdf = new Report_Controller(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Randu Jati Meubel');
		$pdf->SetTitle('Daftar Product');
		$pdf->SetSubject('Daftar product dan detail');
		$pdf->SetKeywords('products');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' Stok Produk', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
		$pdf->setFooterData(array(0,64,0), array(0,64,128));

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set default font subsetting mode
		$pdf->setFontSubsetting(true);

		// Set font
		// helvetica is a UTF-8 Unicode font, if you only need to
		// print standard ASCII chars, you can use core fonts like
		// helvetica or times to reduce file size.
		$pdf->SetFont('helvetica', '', 12, '', true);

		// Add a page
		// This method has several options, check the source code documentation for more information.
		$pdf->AddPage();

		// set text shadow effect
		$pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196,196,196), 'opacity' => 1, 'blend_mode' => 'Normal'));

		// Construct content
		$tbl_header = '
		<style>
		.table {
		    border-collapse: collapse;
		    border-spacing: 0;
		    margin: 0 20px;
		    width : 100%;
		}
		.tr {
		    padding: 3px 0;
		}

		.th {
		    background-color: #CCCCCC;
		    border: 1px solid #DDDDDD;
		    color: #333333;
		    font-size: 17px;
		    padding-bottom: 4px;
		    padding-left: 6px;
		    padding-top: 5px;
		    text-align: left;
		}

		td {
		    border: 1px solid #CCCCCC;
		    padding: 5px 7px 2px;
		}

		.text-right {
			text-align : right;
			padding : 0;
			margin : 0;
		}
		</style>

		<h1 style="text-align: center;">Daftar Barang dan Stok</h1>
		<p style="text-align: center;">' . date('l d F Y') . '</p>
		<hr>

		<h3>Jumlah Barang : ' . count($products) . '</h3>

		<table class="table">
			<tr class="tr">
		        <th class="th" width="5%"><font face="Arial, Helvetica, sans-serif">No</font></th>
		        <th class="th" width="15%"><font face="Arial, Helvetica, sans-serif">Tgl Input</font></th>
		        <th class="th" width="50%"><font face="Arial, Helvetica, sans-serif">Name</font></th>
		        <th class="th" width="10%"><font face="Arial, Helvetica, sans-serif">Stok</font></th>
		        <th class="th" width="20%"><font face="Arial, Helvetica, sans-serif">Harga Satuan</font></th>
		    </tr>';

		$tbl = '';

		// $i sebagai index untuk nomor urut
		$i = 1;

		// generate setiap detail pemesanan
		foreach ($products as $key => $product) {

			$tbl .= '
			    <tr class="tr">
			        <td>' . $i . '.</td>
			        <td>'. date('d-m-Y', strtotime($product->created)) .'</td>
			        <td>'. $product->name .'</td>
			        <td>'. $product->stok .'</td>
			        <td>Rp. '. $product->price .'</td>
			    </tr>
			';
			$i++;
		}

		$tbl_footer = '</table>';

		// output the HTML content
		$pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');

		// ---------------------------------------------------------
		
		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$pdf->Output('Product-' . date('d-m-Y') . '.pdf', 'I');
	}
}

/* End of file product.php */
/* Location: ./application/controllers/akuinginwisuda/product.php */