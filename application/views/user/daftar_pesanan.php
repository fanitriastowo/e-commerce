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
		<?php $this->load->view('template/header'); ?>
		<!-- Left Content (Categories) -->
		<?php $this->load->view('template/left'); ?>
		
		<!-- Main Content (Product) -->
		<div class="col-sm-8">
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
			<a href="<?php echo site_url('user/pesan/checkout'); ?>" class="btn btn-lg btn-primary btn-block">Checkout</a>
		</div>

		<!-- Right Content (New Product) -->
		<?php $this->load->view('template/right'); ?>
	</div>

	<!-- Footer -->
	<?php $this->load->view('template/footer'); ?>

	<!-- Javascript -->
	<?php $this->load->view('template/js'); ?>
</body>
</html>