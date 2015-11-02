<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<title>Selamat datang pengujung</title>
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
				<h3 class="text-center"><strong>Our Products</strong></h3>
				<?php foreach ($products_rands as $product_rand): ?>
					<div class="col-sm-6">
					<div class="thumbnail">
						<a href="<?php echo site_url('product/detail/' . $product_rand->id); ?>">
							<img src='<?php echo !empty($product_rand->filename) ? site_url('images/products/' . $product_rand->filename ): site_url('images/blank.jpg'); ?>' alt='<?php echo $product_rand->name; ?>' class="img-responsive img-thumbnail" width="80%">
						</a>
						<div class="caption text-center">
							<strong class="text-danger"><?php echo $product_rand->name; ?></strong>
						</div>
					</div>
					</div>
				<?php endforeach ?>
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