<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<title>Daftar Category</title>
</head>
<body>
	<!-- Navbar -->
	<?php $this->load->view('template/navbar'); ?>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading text-center"><strong class="panel-title">Administrator Configuration</strong></div>
			<div class="panel-body">
				<h3>Username</h3>
				<p><?php echo $admin->username; ?></p>
			</div>
			<div class="panel-footer">
				<button class="btn btn-block btn-success">Update</button>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<?php $this->load->view('template/footer'); ?>

	<!-- Javascript -->
	<?php $this->load->view('template/js'); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#config').addClass('active');
		});
	</script>
</body>
</html>