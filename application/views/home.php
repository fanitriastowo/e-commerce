<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css.php'); ?>
	<title>Selamat datang pengujung</title>
</head>
<body>
	<!-- Navbar -->
	<?php $this->load->view('template/navbar.php'); ?>
	<div class="container">
		<?php $this->load->view('template/header.php'); ?>
		<div class="row">
			<div class="col-sm-2">
				<h3 class="text-center">Categories</h3>
				<ul class="nav nav-pills nav-stacked">
					<?php foreach ($categories as $category): ?>
						<li role="presentation"><a href="#"><?php echo $category->name; ?></a></li>
					<?php endforeach ?>
				</ul>
			</div>
			<div class="col-sm-8">
				<h3 class="text-center">Our Products</h3>
				<div class="col-sm-4">
					<div class="thumbnail">
						<a href="#"><img src='<?php echo site_url('images/blank.jpg'); ?>' alt="Product Name"></a>
						<div class="caption">
							<h3>Product Name</h3>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="thumbnail">
						<a href="#"><img src='<?php echo site_url('images/blank.jpg'); ?>' alt="Product Name"></a>
						<div class="caption">
							<h3>Product Name</h3>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="thumbnail">
						<a href="#"><img src='<?php echo site_url('images/blank.jpg'); ?>' alt="Product Name"></a>
						<div class="caption">
							<h3>Product Name</h3>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="thumbnail">
						<a href="#"><img src='<?php echo site_url('images/blank.jpg'); ?>' alt="Product Name"></a>
						<div class="caption">
							<h3>Product Name</h3>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="thumbnail">
						<a href="#"><img src='<?php echo site_url('images/blank.jpg'); ?>' alt="Product Name"></a>
						<div class="caption">
							<h3>Product Name</h3>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="thumbnail">
						<a href="#"><img src='<?php echo site_url('images/blank.jpg'); ?>' alt="Product Name"></a>
						<div class="caption">
							<h3>Product Name</h3>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="thumbnail">
						<a href="#"><img src='<?php echo site_url('images/blank.jpg'); ?>' alt="Product Name"></a>
						<div class="caption">
							<h3>Product Name</h3>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="thumbnail">
						<a href="#"><img src='<?php echo site_url('images/blank.jpg'); ?>' alt="Product Name"></a>
						<div class="caption">
							<h3>Product Name</h3>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="thumbnail">
						<a href="#"><img src='<?php echo site_url('images/blank.jpg'); ?>' alt="Product Name"></a>
						<div class="caption">
							<h3>Product Name</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<h3 class="text-center">Latest Product</h3>
				<ul class="nav nav-pills nav-stacked">
					<?php foreach ($products as $product): ?>
						<li role="presentation"><a href="#"><?php echo $product->name; ?></a></li>
					<?php endforeach ?>
				</ul>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<?php $this->load->view('template/footer.php'); ?>

	<!-- Javascript -->
	<?php $this->load->view('template/js.php'); ?>
</body>
</html>