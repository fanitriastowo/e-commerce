<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pemesanan extends Admin_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('pemesanan_m');
		$this->load->model('pemesanan_detail_m');
	}

	/**
	 * [ambil daftar pemesanan dengan status proses dan tanggal ASC]
	 */
	public function index() {
		$model['pemesanans'] = $this->pemesanan_m->get_pemesanan_with_user();
		$this->load->view('administrator/pemesanan', $model);
	}

	/**
	 * [ambil detail pemesanan dan convert ke json]
	 * @param  [integer] $id [Pemesanan ID]
	 * @return [object]     [Json Format]
	 */
	public function detail($id)	{
		$pemesanan = $this->pemesanan_m->get_pemesanan_and_user_by_pemesanan_id($id);
		$pemesanan_details = $this->pemesanan_detail_m->get_pemesanan_detail_by_pemesanan_id($id);
		$model = array(
			'pemesanan' => $pemesanan, 
			'pemesanan_details' => $pemesanan_details
		);
		$this->load->view('administrator/pemesanan_detail', $model);
	}

	/**
	 * [Ubah status pemesanan]
	 */
	public function approve() {
		$id = $this->input->post('approve_id');
		$data = array(
			'status' => 'Disetujui'
		);
		$this->pemesanan_m->approve_pemesanan($data, $id);
		redirect('akuinginwisuda/pemesanan');
	}

	/**
	 * [Delete pemesanan]
	 */
	public function delete($id) {
		$this->pemesanan_m->delete($id);
		$this->session->set_flashdata('delete_success', 'Delete Successful');
		redirect('akuinginwisuda/pemesanan');
	}

	/**
	 * [generate report detail pemesanan berdasarkan id pemesanan]
	 * @param  [integer] $id [id pemesanan]
	 * @return [type]     [description]
	 */
	public function cetak($id) {
		// load library
		$this->load->library('Report_Controller');

		// load model
		$this->load->model('pemesanan_detail_m');
		$this->load->model('user_m');

		// Ambil pemesanan berdasarkan id
		$pemesanan = $this->pemesanan_m->get($id, TRUE);

		$principal = $this->user_m->get($pemesanan->user_id, TRUE);

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
		</div>
		<br>
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
}

/* End of file Pemesanan.php */
/* Location: ./application/controllers/administrator/pemesanan.php */