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
		<div class="col-sm-8">
			<?php if (!empty($this->session->flashdata('failed'))): ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<strong><?php echo $this->session->flashdata('failed'); ?></strong>
				</div>
			<?php endif ?>
			<h2 class="text-center">Daftar Pesanan Anda</h2> <hr>
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
							<td>
								<a href="#" class="btn btn-xs btn-warning"><i class="fa fa-times"></i>&nbsp;Batal</a>
							</td>
						</tr>
						<?php $i++; ?>
					<?php endforeach ?>
				</tbody>
			</table>
			<p class="text-warning">* Barang pesanan akan dikirim ke alamat Member</p>
			<a href="<?php echo site_url('product/checkout'); ?>" class="btn btn-lg btn-primary btn-block">Checkout</a>
		</div>

		<!-- Right Content (New Product) -->
		<?php $this->load->view('template/right'); ?>
	</div>

	<!-- Footer -->
	<?php $this->load->view('template/footer'); ?>

	<!-- Javascript -->
	<?php $this->load->view('template/js'); ?>

	<!-- Login Modal -->
	<?php echo form_open('user/user/quick_login', 'class="form-signin"'); ?>
		<div class="modal fade" id="quick_login_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Silahkan Login</h4>
					</div>
					<div class="modal-body">
						<h3 class="form-signin-heading">Please sign in</h3>
						<hr class="colorgraph"><br>
						<?php echo form_input(array('name' => 'email', 'id' => 'email', 'value' => '', 'class' => 'form-control', 'placeholder' => 'Email Address', 'required' => '', 'autofocus' => '')); ?>
						<?php echo form_password(array('name' => 'password', 'id' => 'password', 'value' => '', 'class' => 'form-control', 'placeholder' => 'Password', 'required' => '')); ?>
					</div>
					<div class="modal-footer">
						<?php echo form_submit('submit', 'Login', 'class = "btn btn-lg btn-primary btn-block"'); ?>
					</div>
				</div>
			</div>
		</div>
	<?php echo form_close(); ?>

	<?php if ($this->session->flashdata('not_logged_in') === TRUE): ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#quick_login_modal').modal();
		});
	</script>
	<?php endif ?>
</body>
</html>