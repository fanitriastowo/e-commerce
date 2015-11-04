<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/login.css'); ?>">
	<title>Please Login</title>
</head>
<body>
	<!-- Navbar -->
	<?php $this->load->view('template/navbar'); ?>
	<div class="container">
		<!-- Main Content (Login Form) -->
		<?php if (!empty($this->session->flashdata('notif_register'))): ?>
			<div class="alert alert-info alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<strong><?php echo $this->session->flashdata('notif_register'); ?></strong>
			</div>
		<?php endif ?>
		

		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-body">
		<div class="wrapper">

			<?php echo form_open('user/user/post_login', array('class' => 'form-signin')); ?>
			<h3 class="form-signin-heading">Please sign in</h3>
			<hr class="colorgraph"><br>
			<?php echo form_input(array('name' => 'email', 'id' => 'email', 'value' => '', 'class' => 'form-control', 'placeholder' => 'Email Address', 'required' => '', 'autofocus' => '')); ?>

			<?php echo form_password(array('name' => 'password', 'id' => 'password', 'value' => '', 'class' => 'form-control', 'placeholder' => 'Password', 'required' => '')); ?>

			<?php echo form_submit('submit', 'Login', 'class = "btn btn-lg btn-primary btn-block"'); ?>
			<?php echo form_close(); ?>
		</div>
		</div>
		</div>
		</div>

		<?php if (($this->session->flashdata('error'))): ?>
			<div class="alert alert-danger alert-dismissible text-center" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<strong>Invalid Email or Password Combination!</strong>
			</div>
		<?php endif ?>
	</div>

	<!-- Footer -->
	<?php $this->load->view('template/footer'); ?>

	<!-- Javascript -->
	<?php $this->load->view('template/js'); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#login').addClass('active');
		});
	</script>
</body>
</html>