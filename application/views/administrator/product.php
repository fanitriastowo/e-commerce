<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/datatables.bootstrap.min.css'); ?>">
	<title>Daftar Product</title>
</head>
<body>
	<!-- Navbar -->
	<?php $this->load->view('template/navbar'); ?>
	<div class="container">
		<h1>Daftar Product</h1>
		<table id="products_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>No.</th>
					<th>Name</th>
					<th>Price</th>
					<th>Description</th>
					<th>Operation</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($products as $key => $product): ?>
				<tr>
					<td><?php echo $key + 1; ?></td>
					<td><?php echo $product->name; ?></td>
					<td><?php echo $product->price; ?></td>
					<td><?php echo $product->description; ?></td>
					<td>
						<a href="<?php echo site_url('#'); ?>" class="btn btn-info">Update</a>
						<a href="<?php echo site_url('#'); ?>" class="btn btn-danger">Delete</a>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>

	<!-- Footer -->
	<?php $this->load->view('template/footer'); ?>

	<!-- Javascript -->
	<?php $this->load->view('template/js'); ?>
	<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.datatables.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/js/datatables.bootstrap.min.js'); ?>"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#products').addClass('active');
			$('#products_table').DataTable({
				"lengthMenu": [ 5, 10 ]
			});
		});
	</script>
</body>
</html>