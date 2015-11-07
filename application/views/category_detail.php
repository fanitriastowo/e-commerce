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

		<div class="row">
			<!-- Left Content (Categories) -->
			<?php $this->load->view('template/left'); ?>

			<!-- Main Content (Product) -->
			<div class="col-sm-8">
				<h1 class="text-right">Detail Kategori</h1> 
				<hr class="colorgraph">
				<?php foreach ($produts_by_categories as $category_detail): ?>
					<div class="col-sm-4">
						<?php if ($category_detail->stok == 0): ?>
						<div class="thumbnail relative-thumbnail">
							<img src='<?php echo !empty($category_detail->filename) ? site_url('images/products/' . $category_detail->filename ): site_url('images/blank.jpg'); ?>' alt='<?php echo $category_detail->name; ?>' class="img-responsive img-thumbnail">
							<div class="caption text-center relative-caption">
								<h1 class="text-soldout text-primary rotate"><strong>SOLD OUT</strong></h1>
							</div>
						</div>
						<?php else: ?>
						<div class="thumbnail">
							<a href="<?php echo site_url('product/detail/' . $category_detail->id); ?>"><img src='<?php echo !empty($category_detail->filename) ? site_url('images/products/' . $category_detail->filename ): site_url('images/blank.jpg'); ?>' alt='<?php echo $category_detail->name; ?>' class="img-responsive img-thumbnail"></a>
							<div class="caption text-center">
								<div class="text-danger">
									<strong><?php echo $category_detail->name; ?></strong>
								</div> <br>
								<a class="btn btn-primary" href="<?php echo site_url('product/detail/' . $category_detail->id); ?>"><i class="fa fa-search"></i>&nbsp;Beli</a>
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
