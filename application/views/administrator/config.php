<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<title>Konfigurasi Administrator</title>
</head>
<body>
	<!-- Navbar -->
	<?php $this->load->view('template/navbar'); ?>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading text-center"><strong class="panel-title">Administrator Configuration</strong></div>
			<div class="panel-body">
				<?php if (!empty($this->session->flashdata('error_update'))): ?>
					<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
						<strong><?php echo $this->session->flashdata('error_update'); ?></strong>
					</div>
				<?php endif ?>

				<?php if (!empty($this->session->flashdata('notif'))): ?>
					<div class="alert alert-success alert-dismissible text-center" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
						<strong><?php echo $this->session->flashdata('notif'); ?></strong>
					</div>
				<?php endif ?>
				<div class="col-sm-8">

					<!-- Registration Modal -->
					<?php echo form_open('administrator/config/update', 'class="form-horizontal" id="config_administrator"'); ?>
					<?php echo form_hidden('update_id', $admin->id); ?>
						<div class="form-group">
							<div class="col-sm-6">
								<?php echo form_input('first_name', $admin->first_name, 'class="form-control" placeholder="Firstname" required'); ?>
							</div>
							<div class="col-sm-6">
								<?php echo form_input('last_name',$admin->last_name, 'class="form-control" placeholder="Lastname" required'); ?>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-6">
								<?php echo form_password('password','', 'class="form-control" placeholder="Password"'); ?>
							</div>
							<div class="col-sm-6">
								<?php echo form_password('confirm_password','', 'class="form-control" placeholder="Confirm Password"'); ?>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-12">
								<?php echo form_input('email', $admin->email, 'class="form-control" placeholder="Email" required'); ?>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-12">
								<?php echo form_input('phone', $admin->phone, 'class="form-control" placeholder="Phone Number" required'); ?>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-12">
								<textarea name="address" rows="3" class="form-control" placeholder="Alamat member (alamat penerima)" style="resize : none;" required><?php echo $admin->address; ?></textarea>
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-offset-10 col-sm-offset-10">
								<?php echo form_submit('submit', 'Update', 'class = "btn btn-primary"'); ?>
							</div>
						</div>
					<?php echo form_close(); ?>

				</div>

				<div class="col-sm-4">
					<h3 class="dark-grey"><strong>Tips dan Trick</strong></h3> <hr>
					<p>Gunakan password berupa kombinasi angka dan huruf dan ubah password secara berkala.</p>
					<p>Administrator bertanggung jawab atas semua pemesanan yang dipesan oleh member.</p>
				</div>
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