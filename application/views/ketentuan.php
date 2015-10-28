<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<title>Ketentuan Pemesanan</title>
</head>
<body>
	<!-- Navbar -->
	<?php $this->load->view('template/navbar'); ?>
	<div class="container">
		<!-- Left Content (Categories) -->
		<?php $this->load->view('template/left'); ?>

		<!-- Main Content (Product) -->
		<div class="col-sm-8">
			<h1 class="text-center">Ketentuan Pemesanan</h1>
			<h3>Syarat Pemesanan</h3>
			<ol>
				<li>Melakukan registrasi untuk menjadi Member</li>
				<li>Nomor telepon yang aktif</li>
				<li>Berdomisili di Barlingmascakep</li>
				<li>Pembayaran dilakukan dengan COD (cash on delivery)</li>
			</ol>
			<hr>
			<h3>Cara memesan</h3>
			<ol>
				<li>Login sebagai member</li>
				<li>Ubah identitas pribadi</li>
				<li>Pilih produk yang diinginkan</li>
				<li>Tentukan jumlah perproduk</li>
				<li>Input alamat penerima</li>
				<li>Cetak bukti pemesanan</li>
				<li>Produk akan dikirim maksimal dalam 3 hari</li>
			</ol>
		</div>

		<!-- Right Content (New Product) -->
		<?php $this->load->view('template/right'); ?>
	</div>

	<!-- Footer -->
	<?php $this->load->view('template/footer'); ?>

	<!-- Javascript -->
	<?php $this->load->view('template/js'); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#ketentuan').addClass('active');
		});
	</script>
</body>
</html>