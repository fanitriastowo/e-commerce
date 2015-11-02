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
	
		<h1 class="text-right">Your Profile</h1> 
		<hr class="colorgraph">

		<!-- Left Content (Categories) -->
		<?php $this->load->view('template/left'); ?>
		
		<!-- Main Content (Product) -->
		<div class="col-sm-10">

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

			<div class="col-sm-6">

				<div class="text-center">
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


			<div class="col-sm-12">
				<h3 class="text-center">Daftar Pesanan Anda</h3>
				<hr>
				<table class="table table-hover table-striped table-borderes">
					<thead>
						<tr>
							<th>No.</th>
							<th>ID Pemesanan</th>
							<th>Tanggal Pemesanan</th>
							<th>Status</th>
							<th>Cetak</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($pemesanans as $i => $pemesanan): ?>
						<tr>
							<td><?php echo $i + 1; ?></td>
							<td><?php echo $pemesanan->unique_pemesanan; ?></td>
							<td><?php echo $pemesanan->created; ?></td>
							<td><?php echo $pemesanan->status; ?></td>
							<td>
								<a href="<?php echo site_url('user/profile/cetak_bukti/' . $pemesanan->id); ?>" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
			</div>

			<button type="button" id="trigger-update-profile" class="btn btn-primary btn-lg btn-block">Ganti Akun</button>
		</div>

	</div>

	<!-- Footer -->
	<?php $this->load->view('template/footer'); ?>

	<!-- Ganti Akun Modal -->
	<?php echo form_open('user/profile/update', 'class="form-horizontal"'); ?>
	<?php echo form_hidden('update_id', '') ?>
	<div class="modal fade" id="ganti_akun_modal" tabindex="-1" role="dialog" aria-labelledby="ganti_akun_modal_label">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="ganti_akun_modal_label">Ganti Akun</h4>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<div class="col-sm-6">
							<?php echo form_input('first_name','', 'class="form-control" id="update_firstname" placeholder="Firstname" required'); ?>
						</div>
						<div class="col-sm-6">
							<?php echo form_input('last_name','', 'class="form-control" id="update_lastname" placeholder="Lastname" required'); ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-6">
							<?php echo form_password('password','', 'class="form-control" placeholder="Password" '); ?>
						</div>
						<div class="col-sm-6">
							<?php echo form_password('confirm_password','', 'class="form-control" placeholder="Confirm Password" '); ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-12">
							<?php echo form_input('email','', 'class="form-control" id="update_email" placeholder="Email" required'); ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-12">
							<?php echo form_input('phone','', 'class="form-control" id="update_phone" placeholder="Phone Number" required'); ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-12">
							<?php echo form_textarea('address','', 'class="form-control" id="update_address" placeholder="Alamat Member (alamat penerima)" style="resize : none;" required'); ?>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>

	<!-- Javascript -->
	<?php $this->load->view('template/js'); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#profile').addClass('active');
		});

		$('#trigger-update-profile').click(function(e) {
			e.preventDefault();
			var updateURL = '<?php echo site_url('user/profile/get_principal'); ?>';
			$.getJSON(updateURL, function(data) {
				$('input[name="update_id"]').val(data.id);
				$('#update_firstname').val(data.first_name);
				$('#update_lastname').val(data.last_name);
				$('#update_email').val(data.email);
				$('#update_phone').val(data.phone);
				$('#update_address').val(data.address);
			});
			$('#ganti_akun_modal').modal();
		});
	</script>
</body>
</html>