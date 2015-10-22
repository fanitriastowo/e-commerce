<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<title>Your Profile</title>
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
			<h2 class="text-center">Welcome <?php echo $principal->first_name; ?></h2> <hr>
			<div class="col-sm-6">

				<div class="form-group">
					<img class="img-thumbnail" src="<?php echo site_url('images/blank.jpg'); ?>" alt="Your Avatar">
				</div>
				<hr>

				<div class="form-group">
					<p>Alamat</p>
					<p><strong><?php echo $principal->address; ?></strong></p>
				</div>
				<hr>

			</div>

			<div class="col-sm-6">
				<div class="form-group">
					<p>Name</p>
					<p><strong><?php echo $principal->first_name;?> <?php echo $principal->last_name; ?></strong></p>
				</div>
				<hr>

				<div class="form-group">
					<p>Email</p>
					<p><strong><?php echo $principal->email; ?></strong></p>
				</div>
				<hr>

				<div class="form-group">
					<p>Phone</p>
					<p><strong><?php echo $principal->phone; ?></strong></p>
				</div>
				<hr>
				
			</div>

			<button type="button" class="btn btn-primary btn-lg btn-block">Ganti Akun</button>
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
			$('#profile').addClass('active');
		});
	</script>
</body>
</html>