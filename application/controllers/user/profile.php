<?php 

class Profile extends User_Controller {

	/**
	 * [Default constructor from User_Controller]
	 * [check apakah login sebagai admin atau tidak]
	 */
	function __construct() {
		parent::__construct();
		// Load Model
		$this->load->model('category_m');
		$this->load->model('product_m');
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
		$this->data['principal'] = $this->ion_auth->user()->row();
		$this->data['pemesanans'] = $this->pemesanan_m->get();
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
		$address = $this->input->post('address');

		// Assign ke array
		$data = array(
					'first_name' => $first_name,
					'last_name' => $last_name,
					'password' => $password,
					'confirm_password' => $confirm_password,
					'email' => $email,
					'phone' => $phone,
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

		// ambil detail pemesanan berdasarkan id pemesanan
		$pemesanan_detail = $this->pemesanan_detail_m->get_by('pemesanan_id', $id);

		// create new PDF document
		$pdf = new Report_Controller(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Randu Jati Meubel');
		$pdf->SetTitle('Daftar Pemesanan');
		$pdf->SetSubject('Daftar Pesanan Anda');
		$pdf->SetKeywords('pemesanan');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
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
		$pdf->SetFont('helvetica', '', 10, '', true);

		// Add a page
		// This method has several options, check the source code documentation for more information.
		$pdf->AddPage();

		// set text shadow effect
		$pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196,196,196), 'opacity' => 1, 'blend_mode' => 'Normal'));

		// Construct content
		$tbl_header = '
		<style>
		table {
		    border-collapse: collapse;
		    border-spacing: 0;
		    margin: 0 20px;
		    width : 100%;
		}
		tr {
		    padding: 3px 0;
		}

		th {
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
		</style>

		<table>
			<tr>
		        <th width="5%"><font face="Arial, Helvetica, sans-serif">No.</font></th>
		        <th width="30%"><font face="Arial, Helvetica, sans-serif">Name</font></th>
		        <th width="5%"><font face="Arial, Helvetica, sans-serif">Qty</font></th>
		        <th width="15%"><font face="Arial, Helvetica, sans-serif">Harga</font></th>
		        <th width="15%"><font face="Arial, Helvetica, sans-serif">Subtotal</font></th>
		    </tr>';

		$tbl = '';

		// $i sebagai index untuk nomor urut
		$i = 1;

		// generate setiap detail pemesanan
		foreach ($pemesanan_detail as $detail) {

			$tbl .= '
			    <tr>
			        <td>' . $i . '.</td>
			        <td>'. $detail->name .'</td>
			        <td>'. $detail->qty .'</td>
			        <td>Rp. '. $detail->price .'</td>
			        <td>Rp. '. $detail->subtotal .'</td>
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
		$pdf->Output(date('Y-m-d') . '.pdf', 'I');
	}
}

/* End of file profile.php */
/* Location: ./application/controllers/user/profile.php */