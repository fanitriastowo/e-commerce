<?php 

class Pesan extends User_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('product_m');
		$this->load->model('pemesanan_m');
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
		$pesanans = $this->cart->contents();
		if (count($this->cart->contents())) {
			foreach ($pesanans as $pemesanan) {
				$data = array(
						'pemesanan_id' => $pemesanan['rowid'],
						'user_id' => $principal->id,
						'product_id' => $pemesanan['id'],
						'name' => $pemesanan['name'],
						'qty' => $pemesanan['qty'],
						'price' => $pemesanan['price'],
						'subtotal' => $pemesanan['subtotal']
					);
				$this->pemesanan_m->save($data);
			}
			
			$this->load->library('Report_Controller');
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
			// dejavusans is a UTF-8 Unicode font, if you only need to
			// print standard ASCII chars, you can use core fonts like
			// helvetica or times to reduce file size.
			$pdf->SetFont('dejavusans', '', 8, '', true);

			// Add a page
			// This method has several options, check the source code documentation for more information.
			$pdf->AddPage();

			// set text shadow effect
			$pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196,196,196), 'opacity' => 1, 'blend_mode' => 'Normal'));

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
			$i = 1;
			foreach ($pesanans as $pesanan) {

				$tbl .= '
				    <tr>
				        <td>' . $i . '.</td>
				        <td>'. $pesanan['name'] .'</td>
				        <td>'. $pesanan['qty'] .'</td>
				        <td>Rp. '. $pesanan['price'] .'</td>
				        <td>Rp. '. $pesanan['subtotal'] .'</td>
				    </tr>
				';
				$i++;
			}

			$tbl_footer = '</table>';

			// output the HTML content
			$pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');

			// ---------------------------------------------------------
			
			// Destroy cart
			$this->cart->destroy();
			// Close and output PDF document
			// This method has several options, check the source code documentation for more information.
			$pdf->Output(date('Y-m-d') . '.pdf', 'I');
		}
		
	}
}