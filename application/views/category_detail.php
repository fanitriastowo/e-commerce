<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<title>Category Detail</title>
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
				<h3 class="text-center bg-info"><strong>Detail Categories</strong></h3>
				<?php foreach ($produts_by_categories as $category_detail): ?>
					<div class="col-sm-4">
						<div class="thumbnail">
							<a href="<?php echo site_url('product/detail/' . $category_detail->id); ?>"><img src='<?php echo site_url('images/blank.jpg'); ?>' alt='<?php echo $category_detail->name; ?>'></a>
							<div class="caption text-center">
								<div class="text-danger">
									<strong><?php echo $category_detail->name; ?></strong>
								</div>
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