<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<title>Daftar User</title>
</head>
<body>
	<!-- Navbar -->
	<?php $this->load->view('template/navbar'); ?>
	<div class="container">
		<h1>Daftar User</h1>

		<?php foreach ($users as $key => $user): ?>
			<?php echo $user->email; ?>
			<?php echo $user->first_name; ?>
			<?php echo $user->last_name; ?>
		<?php endforeach ?>
	</div>

	<!-- Footer -->
	<?php $this->load->view('template/footer'); ?>

	<!-- Javascript -->
	<?php $this->load->view('template/js'); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#users').addClass('active');
		});
	</script>
</body>
</html>