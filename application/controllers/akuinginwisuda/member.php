<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends Admin_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user_m');
	}

	/**
	 * [tampilkan daftar member]
	 */
	public function index() {
		$this->data['members'] = $this->ion_auth->users(2)->result();
		$this->load->view('administrator/member', $this->data);
	}

	/**
	 * [simpan member baru]
	 */
	public function insert() {

		// ambil form value
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');
		$phone = $this->input->post('phone');
		$domisili = $this->input->post('domisili');
		$address = $this->input->post('address');
		$additional = array(
				'first_name' => $first_name,
				'last_name' => $last_name,
				'phone' => $phone,
				'domisili' => $domisili,
				'address' => $address 
		);

		// ambil rules
		$rules = $this->user_m->rules;

		// set rules
		$this->form_validation->set_rules($rules);

		// check value
		if ($this->form_validation->run() == TRUE) {
			$this->ion_auth->register($first_name, $password, $email, $additional);
			$this->session->set_flashdata('notif', 'Insert new User Successful!');
			redirect('akuinginwisuda/member');
		} else {
			$this->session->set_flashdata('error', validation_errors());
			redirect('akuinginwisuda/member');
		}
	}

	/**
	 * [Hapus member berdasrkan ID]
	 * @param  [integer] $id [id member]
	 */
	public function delete($id) {
		$this->ion_auth->delete_user($id);
		$this->session->set_flashdata('notif', 'Delete User Successful!');
		redirect('akuinginwisuda/member');
	}

	/**
	 * [ambil detail member]
	 * @param  [integer] $id [id member]
	 * @return [object]  [member json format]
	 */
	public function detail($id) {
		$member = $this->user_m->get($id);
		return $this->output->set_content_type('application/json')->set_output(json_encode($member));
	}

	/**
	 * [update member berdasrkan form yang sudah terdapat value]
	 */
	public function update() {

		// ambil id dari form_hidden
		$id = $this->input->post('update_id');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');
		$phone = $this->input->post('phone');
		$domisili = $this->input->post('domisili');
		$address = $this->input->post('address');
		$data = array (
				'first_name' => $first_name,
				'last_name' => $last_name,
				'email' => $email,
				'password' => $password,
				'phone' => $phone,
				'domisili' => $domisili,
				'address' => $address 
		);
		
		// ambil member rules_update
		$rules = $this->user_m->rules_update;

		// set rules
		$this->form_validation->set_rules($rules);

		// check value
		if ($this->form_validation->run() == TRUE) {
			$this->ion_auth->update($id, $data);
			$this->session->set_flashdata('notif', 'Update User Successful!');
			dump($data);
			redirect('akuinginwisuda/member');
		} else {
			$this->session->set_flashdata('error', validation_errors());
			redirect('akuinginwisuda/member');
		}
	}

	/**
	 * [Cetak Semua member urutkan berdasarkan email]
	 */
	public function cetak_semua() {
		// load library
		$this->load->library('Report_Controller');

		// ambil data
		$members = $this->ion_auth->users(2)->result();

		// create new PDF document
		$pdf = new Report_Controller(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Randu Jati Meubel');
		$pdf->SetTitle('Daftar Member');
		$pdf->SetSubject('Daftar member');
		$pdf->SetKeywords('members');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' Data Member', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
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

		<h1 style="text-align: center;">Daftar Data Members</h1>
		<p style="text-align: center;">' . date('l d F Y') . '</p>
		<hr>

		<h3>Jumlah Member : ' . count($members) . '</h3>

		<table class="table">
			<tr class="tr">
		        <th class="th" width="5%"><font face="Arial, Helvetica, sans-serif">No</font></th>
		        <th class="th" width="20%"><font face="Arial, Helvetica, sans-serif">Nama</font></th>
		        <th class="th" width="25%"><font face="Arial, Helvetica, sans-serif">Email</font></th>
		        <th class="th" width="20%"><font face="Arial, Helvetica, sans-serif">Phone</font></th>
		        <th class="th" width="30%"><font face="Arial, Helvetica, sans-serif">Alamat</font></th>
		    </tr>';

		$tbl = '';

		// $i sebagai index untuk nomor urut
		$i = 1;

		// generate setiap detail pemesanan
		foreach ($members as $member) {

			$tbl .= '
			    <tr class="tr">
			        <td>' . $i . '.</td>
			        <td>'. $member->first_name . ' ' . $member->last_name .'</td>
			        <td>'. $member->email .'</td>
			        <td>'. $member->phone .'</td>
			        <td>'. $member->address .'</td>
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
		$pdf->Output('Members-' . date('d-m-Y') . '.pdf', 'I');
	}
}

/* End of file member.php */
/* Location: ./application/controllers/akuinginwisuda/member.php */