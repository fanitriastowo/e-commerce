<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<title>Daftar Member</title>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/datatables.bootstrap.min.css'); ?>">
</head>
<body>
	<!-- Navbar -->
	<?php $this->load->view('template/navbar'); ?>
	<div class="container">
	
		<?php if (!empty($this->session->flashdata('notif'))): ?>
			<div class="alert alert-info alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<strong><?php echo $this->session->flashdata('notif'); ?></strong>
			</div>
		<?php endif ?>

		<?php if (!empty($this->session->flashdata('error'))): ?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<strong><?php echo $this->session->flashdata('error'); ?></strong>
			</div>
		<?php endif ?>

		<h1 class="text-center">Daftar Member</h1>
		<div class="text-right">
			<button class="btn btn-success" data-toggle="modal" data-target="#insert_modal">
				<i class="fa fa-plus"></i> Add member</button>
		</div> <br />
		<table id="member_table" class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th width="5%">No.</th>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Operation</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($members as $key => $member): ?>
				<tr>
					<td><?php echo $key + 1; ?></td>
					<td><?php echo $member->first_name; ?></td>
					<td><?php echo $member->last_name; ?></td>
					<td><?php echo $member->email; ?></td>
					<td><?php echo $member->phone; ?></td>
					<td>
						<a href="<?php echo site_url('administrator/member/detail/' . $member->id); ?>" class="btn btn-xs btn-info trigger-update">
							<i class="fa fa-pencil"></i> Update</a>
						<a href="<?php echo site_url('administrator/member/delete/' . $member->id); ?>" class="btn btn-xs btn-danger trigger-delete">
							<i class="fa fa-trash"></i> Delete</a>
					</td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>

	<!-- Insert Modal -->
	<?php echo form_open('administrator/member/insert', 'class="form-horizontal insert_modal"'); ?>
	<div class="modal fade" id="insert_modal" tabindex="-1" role="dialog" aria-labelledby="insert_modal_label">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="insert_modal_label"><strong>Create Account</strong></h4>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<div class="col-sm-6">
							<?php echo form_input('first_name','', 'class="form-control" id="register_firstname" placeholder="Firstname"'); ?>
						</div>
						<div class="col-sm-6">
							<?php echo form_input('last_name','', 'class="form-control" id="register_lastname" placeholder="Lastname"'); ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-6">
							<?php echo form_password('password','', 'class="form-control" id="register_password" placeholder="Password"'); ?>
						</div>
						<div class="col-sm-6">
							<?php echo form_password('confirm_password','', 'class="form-control" id="register_confirm_password" placeholder="Confirm Password"'); ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-12">
							<?php echo form_input('email','', 'class="form-control" id="register_email" placeholder="Email"'); ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-12">
							<?php echo form_input('phone','', 'class="form-control" id="register_phone" placeholder="Phone Number"'); ?>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-12">
							<textarea name="address" rows="3" class="form-control" id="register_address" placeholder="Alamat member (alamat penerima)" style="resize : none;"></textarea>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<?php echo form_submit('submit', 'Register', 'class = "btn btn-primary"'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>

	<!-- Update Modal -->
	<?php echo form_open('administrator/member/update', 'class="form-horizontal update_modal"'); ?>
	<div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="update_modal_label">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="update_modal_label"><strong>Update Member</strong></h4>
				</div>
				<div class="modal-body">
					<?php echo form_hidden('update_id'); ?>

					<div class="form-group">
						<div class="col-sm-6">
							<?php echo form_input('first_name','', 'class="form-control" id="update_firstname" placeholder="Firstname"'); ?>
						</div>
						<div class="col-sm-6">
							<?php echo form_input('last_name','', 'class="form-control" id="update_lastname" placeholder="Lastname"'); ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-6">
							<?php echo form_password('password','', 'class="form-control" id="update_password" placeholder="Password"'); ?>
						</div>
						<div class="col-sm-6">
							<?php echo form_password('confirm_password','', 'class="form-control" id="update_confirm_password" placeholder="Confirm Password"'); ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-12">
							<?php echo form_input('email','', 'class="form-control" id="update_email" placeholder="Email"'); ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-12">
							<?php echo form_input('phone','', 'class="form-control" id="update_phone" placeholder="Phone Number"'); ?>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-12">
							<textarea name="address" rows="3" class="form-control" id="update_address" placeholder="Alamat member (alamat penerima)" style="resize : none;" required></textarea>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<?php echo form_submit('submit', 'Update', 'class="btn btn-primary"'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>

	<!-- Modal Remove -->
	<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span><span class="sr-only">Tutup</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Hapus User</h4>
				</div>
				<div class="modal-body">
					<strong>Apakah Anda yakin akan menghapus?</strong>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						<i class="fa fa-times"></i> Cancel</button>
					<a href="" class="btn btn-danger btn-delete">
						<i class="fa fa-check-circle"></i> Delete</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<?php $this->load->view('template/footer'); ?>

	<!-- Javascript -->
	<?php $this->load->view('template/js'); ?>
	<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.datatables.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/js/datatables.bootstrap.min.js'); ?>"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#member').addClass('active');
			$('#member_table').DataTable({
				"lengthMenu": [ 5, 10 ]
			});

			// validate add member form on keyup and submit
			$(".insert_modal").validate({
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
					address: "required"
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
					address: "Alamat harap diisi"
				},
				highlight : function(element) {
					$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				},
				unhighlight : function(element) {
					$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
				}
			});

			// validate update member form on keyup and submit
			$(".update_modal").validate({
				rules: {
					first_name: {
						required : true,
						maxlength : 50
					},
					last_name: {
						required : true,
						maxlength : 50
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
					address: "required"
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
					email: {
						required: "Email harap diisi",
						email: "Format email tidak valid"
					},
					phone: {
						required: "Nomor telepon harap diisi",
						number : "Input hanya berupa angka",
						maxlength : "Maksimal 50 Karakter"
					},
					address: "Alamat harap diisi"
				},
				highlight : function(element) {
					$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				},
				unhighlight : function(element) {
					$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
				}
			});
		});

		$('.trigger-delete').click(function(e) {
			e.preventDefault();
			$('#modal-delete .btn-delete').attr("href", $(this).attr("href"));
			$('#modal-delete').modal();
		});

		$('.trigger-update').click(function(e) {
			e.preventDefault();
			var updateURL = $(this).attr("href");
			$.getJSON(updateURL, function(data) {
				$('input[name="update_id"]').val(data.id);
				$('#update_firstname').val(data.first_name);
				$('#update_lastname').val(data.last_name);
				$('#update_email').val(data.email);
				$('#update_phone').val(data.phone);
				$('#update_address').val(data.address);
			});
			$('#update_modal').modal();
		});
	</script>
</body>
</html>