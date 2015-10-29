<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<title>Registration</title>
</head>
<body>
	<!-- Navbar -->
	<?php $this->load->view('template/navbar'); ?>
	<div class="container">
		<!-- Left Content (Categories) -->
		<?php $this->load->view('template/left'); ?>

		<!-- Main Content (Product) -->
		<div class="col-sm-8">
			<h1>Registration Form</h1> <hr>
			<!-- Registration Modal -->
			<?php echo form_open('register/registration', 'class="form-horizontal" id="registration_form"'); ?>

				<div class="form-group">
					<div class="col-sm-6">
						<?php echo form_input('first_name','', 'class="form-control" id="register_firstname" placeholder="Firstname" required'); ?>
					</div>
					<div class="col-sm-6">
						<?php echo form_input('last_name','', 'class="form-control" id="register_lastname" placeholder="Lastname" required'); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-6">
						<?php echo form_password('password','', 'class="form-control" id="register_password" placeholder="Password" required'); ?>
					</div>
					<div class="col-sm-6">
						<?php echo form_password('confirm_password','', 'class="form-control" id="register_confirm_password" placeholder="Confirm Password" required'); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						<?php echo form_input('email','', 'class="form-control" id="register_email" placeholder="Email" required'); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						<?php echo form_input('phone','', 'class="form-control" id="register_phone" placeholder="Phone Number" required'); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						<textarea name="address" rows="3" class="form-control" id="register_address" placeholder="Alamat member (alamat penerima)" style="resize : none;" required></textarea>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						<label for="captcha_word"><?php echo $captcha['image']; ?></label>
						<?php echo form_input('captcha_word', '', 'class="form-control" id="register_captcha_word" placeholder="Input Text Above" required'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_submit('submit', 'Register', 'class = "btn btn-primary"'); ?>
				</div>
			<?php echo form_close(); ?>
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
			$('#registration').addClass('active');
			// validate signup form on keyup and submit
			$("#registration_form").validate({
				rules: {
					first_name: {
						required : true,
						maxlength : 50
					},
					last_name: {
						required : true,
						maxlength : 50
					},
					password: {
						required: true,
						minlength: 3
					},
					confirm_password: {
						required: true,
						minlength: 3,
						equalTo: "#register_password"
					},
					email: {
						required: true,
						email: true
					},
					phone: {
						required: true,
						number : true,
						maxlength : 15
					},
					address: "required",
					captcha_word : "required"
				},
				messages: {
					first_name: {
						required : "Firstname harap diisi",
						maxlength : "Maksimal 50 karakter"
					},
					last_name: {
						required : "Lastname harap  diisi",
						maxlength : "Maksimal 50 karakter"
					},
					password: {
						required: "Password harap diisi",
						minlength: "minimal 3 karakter"
					},
					confirm_password: {
						required: "Confirm Password harap diisi",
						minlength: "minimal 3 karakter",
						equalTo: "Confirm Password tidak sama"
					},
					email: {
						required: "Email harap diisi",
						email: "Format email tidak valid"
					},
					phone: {
						required: "Nomor telepon harap diisi",
						number : "Input hanya berupa angka",
						maxlength : "Maksimal 50 Karakter"
					},
					address: "Alamat harap diisi",
					captcha_word : "Inputkan karakter captcha"
				},
				highlight : function(element) {
					$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				},
				unhighlight : function(element) {
					$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
				}
			});
		});
	</script>
</body>
</html>