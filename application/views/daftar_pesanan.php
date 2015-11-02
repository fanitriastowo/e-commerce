<!DOCTYPE html>
<html lang="en">
<head>
<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/login.css'); ?>">
<title>Daftar Pesanan</title>
</head>
<body>
	<!-- Navbar -->
	<?php $this->load->view('template/navbar'); ?>
	<div class="container">
		<?php $this->load->view('template/header'); ?>

		<!-- Left Content (Categories) -->
		<?php $this->load->view('template/left'); ?>
		
		<!-- Main Content (Product) -->
		<div class="col-sm-10">
			<?php if (!empty($this->session->flashdata('failed'))): ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong><?php echo $this->session->flashdata('failed'); ?></strong>
			</div>
			<?php endif ?>
			<?php if (!empty($this->session->flashdata('notif'))): ?>
				<div class="alert alert-info alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong><?php echo $this->session->flashdata('notif'); ?></strong>
			</div>
			<?php endif ?>
			<h2 class="text-center">Daftar Pesanan Anda</h2>
			<hr>
			<table class="table table-hover table-bordered table-striped">
				<thead>
					<tr>
						<th>No.</th>
						<th>Name</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Deskripsi</th>
						<th>Subtotal</th>
						<th>Operation</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($pemesanans as $count => $pemesanan): ?>
						<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $pemesanan['name']; ?></td>
						<td><?php echo $pemesanan['price']; ?></td>
						<td><?php echo $pemesanan['qty']; ?></td>
						<td>
								<?php foreach ($this->cart->product_options($pemesanan['rowid']) as $option_name => $option_value): ?>
									<?php echo $option_value; ?>
								<?php endforeach ?>
							</td>
						<td><?php echo $pemesanan['subtotal']; ?></td>
						<td><a href="#" class="btn btn-xs btn-warning"><i class="fa fa-times"></i>&nbsp;Batal</a></td>
					</tr>
						<?php $i++; ?>
					<?php endforeach ?>
				</tbody>
			</table>
			<p class="text-warning">* Barang pesanan akan dikirim ke alamat Member</p>
			<a href="<?php echo site_url('product/checkout'); ?>" class="btn btn-lg btn-primary btn-block">Checkout</a>
		</div>
	</div>

	<!-- Footer -->
	<?php $this->load->view('template/footer'); ?>

	<!-- Javascript -->
	<?php $this->load->view('template/js'); ?>

	<!-- login and register Modal Window -->
	<div class="modal fade" id="quick_login_register" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation"><a href="#quick_login" role="tab" data-toggle="tab">Login</a></li>
						<li role="presentation"><a href="#quick_register" role="tab" data-toggle="tab">Registrasi</a></li>
					</ul>
				</div>
				<div class="modal-body">
				
				<!-- Tab panes -->
				<div class="tab-content">
				
					<!-- Login Tab -->
					<div class="tab-pane" id="quick_login">
						<?php echo form_open('user/user/quick_login', 'class="form-signin"'); ?>
							<h3 class="form-signin-heading">Please sign in</h3>
							<hr class="colorgraph">
							<br>
							<?php echo form_input(array('name' => 'email', 'id' => 'email', 'value' => '', 'class' => 'form-control-login', 'placeholder' => 'Email Address', 'required' => '', 'autofocus' => '')); ?>
							<?php echo form_password(array('name' => 'password', 'id' => 'password', 'value' => '', 'class' => 'form-control-login', 'placeholder' => 'Password', 'required' => '')); ?>
							<?php echo form_submit('submit', 'Login', 'class = "btn btn-lg btn-primary btn-block"'); ?>
						<?php echo form_close(); ?>
					</div>
					
					
					<!-- Registration Tab -->
					<div class="tab-pane" id="quick_register">
						<?php echo form_open('register/quick_registration', 'class="form-horizontal" id="quick_registration_form"'); ?>
			
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
								<div class="col-sm-12">
									<?php echo form_submit('submit', 'Register', 'class = "btn btn-primary"'); ?>
								</div>
							</div>
						<?php echo form_close(); ?>	
					</div>
				</div>
				
				
				</div>
			</div>
		</div>
	</div>
	
	
	<?php if ($this->session->flashdata('not_logged_in') === TRUE): ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.nav-tabs a:first').tab('show') // Select first tab
			$('#quick_login_register').modal();
		});
	</script>
	<?php endif ?>
	
	<script type="text/javascript">
		$(document).ready(function() {
			
			// validate signup form on keyup and submit
			$("#quick_registration_form").validate({
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