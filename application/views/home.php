<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<title>Selamat Di Aplikasi Pemesanan Furniture</title>
</head>
<body>
	<!-- Navbar -->
	<?php $this->load->view('template/navbar'); ?>
	<?php $this->load->view('template/header'); ?>
	<div class="container">

		<?php if (!empty($this->session->flashdata('not_found'))): ?>
			<div class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>	</button>
				<strong><?php echo $this->session->flashdata('not_found'); ?></strong>
			</div>
		<?php endif ?>

		<div class="row">
			<!-- Left Content (Categories) -->
			<?php $this->load->view('template/left'); ?>

			<!-- Main Content (Product) -->
			<div class="col-sm-8">
				<h3 class="text-center"><strong>Our Products</strong></h3>
				<?php foreach ($products_rands as $product_rand): ?>
					<div class="col-sm-6">

					<?php if ($product_rand->stok == 0): ?>
						<div class="thumbnail relative-thumbnail">
							<img src='<?php echo !empty($product_rand->filename) ? site_url('images/products/' . $product_rand->filename ): site_url('images/blank.jpg'); ?>' alt='<?php echo $product_rand->name; ?>' class="img-responsive img-thumbnail" height="180px" width="240px">
							<div class="caption text-center relative-caption">
								<h1 class="text-soldout text-primary rotate"><strong>SOLD OUT</strong></h1>
							</div>
						</div>

					<?php else: ?>
						<div class="thumbnail">
							<a href="<?php echo site_url('product/detail/' . $product_rand->id); ?>">
								<img src='<?php echo !empty($product_rand->filename) ? site_url('images/products/' . $product_rand->filename ): site_url('images/blank.jpg'); ?>' alt='<?php echo $product_rand->name; ?>' class="img-responsive img-thumbnail" height="180px" width="240px">
							</a>
							<div class="caption text-center">
								<strong class="text-danger"><?php echo $product_rand->name; ?></strong><br><br>
								<a class="btn btn-primary" href="<?php echo site_url('product/detail/' . $product_rand->id); ?>"><i class="fa fa-search"></i>&nbsp;Detail</a>
							</div>
						</div>
					<?php endif ?>
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