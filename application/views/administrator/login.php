<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/login.css'); ?>">
	<title>Please Login Administrator</title>
</head>
<body>
	<!-- Navbar -->
	<div class="container">
		<!-- Main Content (Login Form) -->

		<div class="wrapper">
			<?php echo form_open('akuinginwisuda/akuinginwisuda/post_login', array('class' => 'form-signin')); ?>
			<h3 class="form-signin-heading">Welcome Administrator</h3>
			<p class="text-center text-warning">*Please Login using Administrator Credential</p>
			<hr class="colorgraph"><br>
			<?php echo form_input(array('name' => 'email', 'id' => 'email', 'value' => '', 'class' => 'form-control', 'placeholder' => 'Email Address', 'required' => '', 'autofocus' => '')); ?>

			<?php echo form_password(array('name' => 'password', 'id' => 'password', 'value' => '', 'class' => 'form-control', 'placeholder' => 'Password', 'required' => '')); ?>

			<?php echo form_submit('submit', 'Login', 'class = "btn btn-lg btn-primary btn-block"'); ?>
			<?php echo form_close(); ?>
		</div>

		<?php if (($this->session->flashdata('error'))): ?>
			<div class="alert alert-danger alert-dismissible text-center" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<strong>Invalid Email or Password Combination!</strong>
			</div>
		<?php endif ?>
	</div>

	<!-- Javascript -->
	<?php $this->load->view('template/js'); ?>
</body>
</html>