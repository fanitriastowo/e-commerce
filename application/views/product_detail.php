<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<title>Product Detail</title>
</head>
<body>
	<!-- Navbar -->
	<?php $this->load->view('template/navbar'); ?>
	<div class="container">
		<?php $this->load->view('template/header'); ?>
		<div class="row">
			<!-- Left Content (Categories) -->
			<?php $this->load->view('template/left'); ?>

			<!-- Main Content (Product) -->
			<div class="col-sm-8">
				<h3 class="text-center bg-info"><strong>Detail Product</strong></h3>
				<div class="thumbnail">
					<a href="#"><img src='<?php echo site_url('images/blank.jpg'); ?>' alt='<?php echo $product_detail->name; ?>'></a>
					<div class="caption text-center">
						<div class="text-danger">
							<strong><?php echo $product_detail->name; ?></strong>
						</div>
					</div>
				</div>
			</div>

			<!-- Right Content (New Product) -->
			<?php $this->load->view('template/right'); ?>
		</div>
	</div>

	<!-- Footer -->
	<?php $this->load->view('template/footer'); ?>

	<!-- Javascript -->
	<?php $this->load->view('template/js'); ?>
</body>
</html>