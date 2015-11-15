<?php 

class Profile extends User_Controller {

	/**
	 * [Default constructor from User_Controller]
	 * [check apakah login sebagai admin atau tidak]
	 */
	function __construct() {
		parent::__construct();
		// Load Model
		$this->load->model('pemesanan_m');
		
		// Fetch All Categories
		$this->data['categories'] = $this->category_m->get();

		// Fetch All Products
		$this->data['products'] = $this->product_m->get_all_limit();
	}

	/**
	 * [tampilkan profile member dan daftar pemesanan]
	 */
	public function index() {
		$principal = $this->ion_auth->user()->row();
		$this->data['principal'] = $principal;
		$this->data['pemesanans'] = $this->pemesanan_m->get_pemesanan_by_member($principal->id);
		$this->load->view('user/profile', $this->data);
	}

	/**
	 * [Ambil object principal dan return sebagai json]
	 * @return [principal] [json object principal]
	 */
	public function get_principal() {
		$model = $this->ion_auth->user()->row();
		return $this->output->set_content_type('application/json')->set_output(json_encode($model));
	}

	/**
	 * [Ganti akun member]
	 */
	public function update() {
		// ambil data dari form bootstrap modal
		$id = $this->input->post('update_id');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$password = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$domisili = $this->input->post('domisili');
		$address = $this->input->post('address');

		// Assign ke array
		$data = array(
					'first_name' => $first_name,
					'last_name' => $last_name,
					'password' => $password,
					'confirm_password' => $confirm_password,
					'email' => $email,
					'phone' => $phone,
					'domisili' => $domisili,
					'address' => $address
				);
		// ambil rules_update
		$rules = $this->user_m->rules_update;

		// set rules
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$this->ion_auth->update($id, $data);
			$this->session->set_flashdata('notif', 'Update Account Successful!');
			redirect('user/profile');
		} else {
			$this->session->set_flashdata('error_update', validation_errors());
			redirect('user/profile');
		}
	}

	/**
	 * [Generate PDF detail pemesanan member]
	 * @param  [Integer] $id [id pemesanan table]
	 * @return [report]     [report dalam PDF format]
	 */
	public function cetak_bukti($id) {
		// load library
		$this->load->library('Report_Controller');

		// load pemesanan_detail_m model
		$this->load->model('pemesanan_detail_m');

		// ambil object principal
		$principal = $this->ion_auth->user()->row();
	
		// Ambil pemesanan berdasarkan id
		$pemesanan = $this->pemesanan_m->get($id, TRUE);

		// ambil detail pemesanan berdasarkan id pemesanan
		$pemesanan_detail = $this->pemesanan_detail_m->get_by('pemesanan_id', $id);

		if ($principal->id !== $pemesanan->user_id) {
			return show_404();
		}

		$photo = '';
		if (count($principal->photo)) {
			$photo = site_url('images/members/' . $principal->photo);
		} else {
			$photo = site_url('images/blank.jpg');
		}

		// create new PDF document
		$pdf = new Report_Controller(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Randu Jati Meubel');
		$pdf->SetTitle('Daftar Pemesanan');
		$pdf->SetSubject('Daftar Pesanan Anda');
		$pdf->SetKeywords('pemesanan');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' Bukti Pemesanan Member', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
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
		    font-size: 14px;
		    padding-bottom: 4px;
		    padding-left: 6px;
		    padding-top: 5px;
		    text-align: left;
		}
		td {
		    border: 1px solid #CCCCCC;
		    padding: 3px 7px 2px;
		}

		.text-right {
			text-align : right;
			padding : 0;
			margin : 0;
		}
		</style>

		<div class="text-right">
			<strong>No Pemesanan : ' . $pemesanan->unique_pemesanan . '</strong>
			<p>' . date('l d F Y', strtotime($pemesanan->created)) . '</p>
		<hr>
		</div>
		<div class="text-right">
			<img width="200px" src="' . $photo . '">
		</div>
		<h1>Member : ' . $principal->first_name . ' ' . $principal->last_name . '</h1>
		<p>Alamat : ' . $principal->address . '</p>
		<p>Telepon : ' . $principal->phone . '</p>

		<table class="table">
			<tr class="tr">
		        <th class="th" width="5%"><font face="Arial, Helvetica, sans-serif">No.</font></th>
		        <th class="th" width="50%"><font face="Arial, Helvetica, sans-serif">Name</font></th>
		        <th class="th" width="5%"><font face="Arial, Helvetica, sans-serif">Qty</font></th>
		        <th class="th" width="20%"><font face="Arial, Helvetica, sans-serif">Harga</font></th>
		        <th class="th" width="20%"><font face="Arial, Helvetica, sans-serif">Subtotal</font></th>
		    </tr>';

		$tbl = '';

		// $i sebagai index untuk nomor urut
		$i = 1;
		$total = 0;

		// generate setiap detail pemesanan
		foreach ($pemesanan_detail as $detail) {

			$tbl .= '
			    <tr class="tr">
			        <td>' . $i . '.</td>
			        <td>'. $detail->name .'</td>
			        <td>'. $detail->qty .'</td>
			        <td>Rp. '. $detail->price .'</td>
			        <td>Rp. '. $detail->subtotal .'</td>
			    </tr>
			';
			$i++;
			$total += $detail->subtotal;
		}

		$tbl_footer = '
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>Jumlah</td>
				<td>Rp. 
					' . $total . '
				</td>
			</tr>
		';
		$tbl_footer .= '</table>';
		$tbl_footer .= 
		'
			<br>
			<br>
			<p>Dengan ini saya menyatakan barang yang dipesan telah diterima dan segala tindakan pelanggaran hukum akan dipertanggungjawabkan kepihak berwajib</p>
			<p>tertanda,</p>
			<table>
				<thead>
					<tr>
						<th>Penerima,</th>
						<th>Pengirim,</th>
					</tr>
					<tr><th></th></tr>
					<tr><th></th></tr>
					<tr><th></th></tr>
					<tr><th></th></tr>
					<tr><th></th></tr>
					<tr><th></th></tr>
					<tr>
						<th><strong>' . $principal->first_name . ' ' . $principal->last_name . '</strong></th>
						<th>Agen Randu Jati</th>
					</tr>
				</thead>
			</table>
		';

		// output the HTML content
		$pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');

		// ---------------------------------------------------------
		
		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$pdf->Output($pemesanan->created . '.pdf', 'I');
	}

	/**
	 * Upload foto profile
	 */
	public function upload() {
		if ($this->ion_auth->logged_in()) {
			$id = $this->input->post('upload_id');

			// Set filename
			$config['file_name'] = date('dmy');
			$config['upload_path'] = './images/members/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1024';
			$config['max_width']  = '1024';
			$config['max_height']  = '1024';
			$this->load->library('upload', $config);

			// Do Upload
			if ($this->upload->do_upload('photo_upload')){
				$data = $this->upload->data();

				if ($data['image_height'] > 180 || $data['image_width'] > 320){
					$configResize = array(
						'image_library' => 'gd',
						'source_image' => $data['full_path'],
						'width' => 320,
						'height' => 180,
						'maintain_ratio' => FALSE
					);

					$this->load->library('image_lib', $configResize);
					$this->image_lib->resize();  
				}

				// assign ke array
				$member = array(
					'photo' => date('dmy') . $data['file_ext']
				);

				$this->ion_auth->update($id, $member);
				$this->session->set_flashdata('success_upload', 'Upload Successful');
				redirect('user/profile');
			} else {
				$this->session->set_flashdata('error_update', $this->upload->display_errors());
				redirect('user/profile');
			}

		} else {
			show_404();
		}
	}
}

/* End of file profile.php */
/* Location: ./application/controllers/user/profile.php */