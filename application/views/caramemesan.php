<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<title>Cara Memesan</title>
</head>
<body>
	<!-- Navbar -->
	<?php $this->load->view('template/navbar'); ?>
	<div class="container">
		<!-- Left Content (Categories) -->
		<?php $this->load->view('template/left'); ?>

		<!-- Main Content (Product) -->
		<div class="col-sm-8">
			<h1 class="text-center">Pemesanan</h1>
			<h2>Cara memesan</h2>
			<img class="img-responsive img-thumbnail" src="<?php echo site_url('assets/images/alurpemesanan.png'); ?>">
			<hr>

			<h2>Syarat Pemesanan</h2>
			<ol>
				<li>Melakukan registrasi untuk menjadi Member</li>
				<li>Nomor telepon yang aktif</li>
				<li>Berdomisili di Barlingmascakep</li>
				<li>Pembayaran dilakukan dengan COD (cash on delivery)</li>
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
			$('#caramemesan').addClass('active');
		});
	</script>
</body>
</html>