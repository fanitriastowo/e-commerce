<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css.php'); ?>
	<title>Selamat datang pengujung</title>
</head>
<body>
	<!-- Navbar -->
	<?php $this->load->view('template/navbar.php'); ?>
	<div class="container">
		<div class="row">
			<h1 class="text-center">Header</h1>
		</div>
		<div class="row">
			<div class="col-sm-2">
				<h3 class="text-center">Category</h3>
			</div>
			<div class="col-sm-8">
				<h3 class="text-center">Welcome to CodeIgniter!</h3>
			</div>
			<div class="col-sm-2">
				<h3 class="text-center">Latest Product</h3>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<?php $this->load->view('template/footer.php'); ?>

	<!-- Javascript -->
	<?php $this->load->view('template/js.php'); ?>
</body>
</html>