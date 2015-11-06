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
		<h1 class="text-right">Cara pemesanan</h1>
		<hr class="colorgraph"><br>

		<!-- Left Content (Categories) -->
		<?php $this->load->view('template/left'); ?>

		<!-- Main Content -->
		<div class="col-sm-8">
			<img class="center-block img-responsive img-thumbnail" src="<?php echo site_url('assets/images/alurpemesanan.png'); ?>">
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
