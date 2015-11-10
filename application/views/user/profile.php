<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<title>Your Profile</title>
	<style>
		.view {
			margin: 5px;
			float: left;
			border: 5px solid #fff;
			overflow: hidden;
			position: relative;
			text-align: center;
			box-shadow: 0px 0px 5px #aaa;
			cursor: default;
		}

		.view .mask {
			width: 200px;
			height: 200px;
			position: absolute;
			overflow: hidden;
			top: 0;
			left: 0;
		}

		.view img {
			display: block;
			position: relative;
			height: auto;
			width: auto;
			margin-left: auto;
			margin-right: auto;
			margin-bottom: auto;
			margin-top: auto;
		}

		.view a.info {
			background: url(<?php echo site_url('assets/images/link.png'); ?>) center no-repeat;
			display: inline-block;
			text-decoration: none;
			padding: 0;
			text-indent: -9999px;
			width: 20px;
			height: 20px;
		}

		.third-effect .mask {
			opacity: 0;
			overflow: visible;
			border: 100px solid rgba(0, 0, 0, 0.7);
			box-sizing: border-box;
			transition: all 0.4s ease-in-out;
		}

		.third-effect a.info {
			position: relative;
			top: 10px; 
			left: 50px; 
			opacity: 0;
			transition: opacity 0.5s 0s ease-in-out;
		}

		.third-effect:hover .mask {
			opacity: 1;
			border: 100px solid rgba(0, 0, 0, 0.7);
		}

		.third-effect:hover a.info {
			opacity: 1;
			transition-delay: 0.3s;
			cursor: hand;
			opacity: 1;
		}
	</style>
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
		<div class="col-sm-8">

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

			<?php if (!empty($this->session->flashdata('success_upload'))): ?>
				<div class="alert alert-success alert-dismissible text-center" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<strong><?php echo $this->session->flashdata('success_upload'); ?></strong>
				</div>
			<?php endif ?>

			<div class="col-sm-6">

				<div class="row">
					<div class="view third-effect">
						<?php if (count($principal->photo)): ?>
							<img class="img-thumbnail" src="<?php echo site_url('images/members/' . $principal->photo); ?>" alt="Your Avatar">
						<?php else: ?>
							<img class="img-thumbnail" src="<?php echo site_url('images/blank.jpg'); ?>" alt="Your Avatar">
						<?php endif ?>
						<div class="mask">
							<a href="#" class="info" id="btn_upload_image_modal"></a>
						</div>
					</div>
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

		<!-- Right Content (New Product) -->
		<?php $this->load->view('template/right'); ?>

	</div>

	<!-- Footer -->
	<?php $this->load->view('template/footer'); ?>

	<!-- Ganti Akun Modal -->
	<?php echo form_open('user/profile/update', 'class="form-horizontal" id="change_profile_modal"'); ?>
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
							<?php echo form_password('password','', 'id="update_password" class="form-control" placeholder="Password" '); ?>
						</div>
						<div class="col-sm-6">
							<?php echo form_password('confirm_password','', 'id="update_confirm_password" class="form-control" placeholder="Confirm Password" '); ?>
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
							<?php echo form_dropdown('domisili',array('Banjarnegara' => 'Banjarnegara','Purbalingga' => 'Purbalingga','Banyumas' => 'Banyumas','Cilacap' => 'Cilacap','Kebumen' => 'Kebumen'),'Cilacap', 'class="form-control" id="update_domisili"');?>
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

	<!-- Upload Modal -->
	<?php echo form_open_multipart('user/profile/upload', 'class="form-horizontal"'); ?>
	<div class="modal fade" id="modalImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Unggah Foto</h4>
				</div>
				<div class="modal-body">
					<?php echo form_hidden('upload_id', '') ?>

					<div class="form-group">
						<label for="insert_image" class="col-sm-2 control-label">Upload</label>
						<div class="col-sm-10">
							<input type="file" name="photo_upload" size="20" id="insert_image"  class="form-control"/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-12">
							<img class="img-responsive image_profile" src="">
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					<input type="submit" class="btn btn-primary" value="Simpan" />
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

			$("#change_profile_modal").validate({
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
						minlength: 3
					},
					confirm_password: {
						minlength: 3,
						equalTo: "#update_password"
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
						minlength: "minimal 3 karakter"
					},
					confirm_password: {
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
				$('#update_domisili').val(data.domisili);
				$('#update_address').val(data.address);
			});
			$('#ganti_akun_modal').modal();
		});

		$('#btn_upload_image_modal').click(function(e) {
			e.preventDefault();
			var updateURL = '<?php echo site_url('user/profile/get_principal'); ?>';
			$.getJSON(updateURL, function(data) {
				$('input[name="upload_id"]').val(data.id);
			});
			$('#modalImage').modal();
		});

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('.image_profile').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}

		$("#insert_image").change(function(){
			readURL(this);
		});
	</script>
</body>
</html>