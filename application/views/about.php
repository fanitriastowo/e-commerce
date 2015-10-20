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
		<?php $this->load->view('template/header'); ?>
		<!-- Left Content (Categories) -->
		<?php $this->load->view('template/left'); ?>

		<!-- Main Content (Product) -->
		<div class="col-sm-8">
			<h3 class="text-center bg-info"><strong>Profil Randu Jati</strong></h3>

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