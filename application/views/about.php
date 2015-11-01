<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<title>About</title>
</head>
<body>
	<!-- Navbar -->
	<?php $this->load->view('template/navbar'); ?>
	<div class="container">
		<h3 class="text-center"><strong>Profil Toko Randu Jati</strong></h3> <hr>

		<!-- Left Content (Categories) -->
		<?php $this->load->view('template/left'); ?>
		
		<!-- Main Content (Product) -->
		<div class="col-sm-8">
			<p style="font-size : 18px; line-height: 1.5; text-align: justify">Toko Mebel Randu Jati Kroya merupakan perusahaan milik perseorangan. Mebel ini didirikan oleh Bapak Harwanto pada tanggal 18 Februari 2008. Toko yang bertempat dirumah tinggal pemiliknya yang berada di JalanBhayangkara RT 02 RW 04 Karangmangu Kroya, pada saat berdirinya hanya menjual kursi dan meja tamu yang dipasarkan di daerah Kroya dan sekitarnya. </p>
			<img class="img-responsive img-thumbnail" src="<?php echo site_url('assets/images/toko.jpg'); ?>" alt="Toko Randu Jati"> <hr>
			<p style="font-size : 18px; line-height: 1.5; text-align : justify;">Dalam perkembangannya permintaan akan produk terus meningkat, produk andalan mebel ini adalah classic furniture (meja dan kursi), colonial (almari dan kursi makan) dan garden (meja dan kursi taman), yang menggunakan kayu jati, kayu mahoni dan kayu mindi. Ketiga produk tersebut menjadi favorit para pembeli lokal, karena model produk yang terbilang masih baru serta unik nilai seninya.</p>
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
			$('#about').addClass('active');
		});
	</script>
</body>
</html>