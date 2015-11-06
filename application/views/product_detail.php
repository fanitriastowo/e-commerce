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

		<div class="row">
			<!-- Left Content (Categories) -->
			<?php $this->load->view('template/left'); ?>

			<!-- Main Content (Product) -->
			<div class="col-sm-8">
				<h1 class="text-right">Detail Produk</h1> 
				<hr class="colorgraph">

				<?php if (!empty($this->session->flashdata('notif'))): ?>
					<div class="alert alert-info alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
						<strong><?php echo $this->session->flashdata('notif'); ?></strong>
					</div>
				<?php endif ?>
				
				<div class="thumbnail">
					<img class="img-responsive" src='<?php echo !empty($product_detail->filename) ? site_url('images/products/' . $product_detail->filename ): site_url('images/blank.jpg'); ?>' alt='<?php echo $product_detail->name; ?>'>
					<div class="caption text-center">
						<h3><strong><?php echo $product_detail->name; ?></strong></h3>
						<p><?php echo $product_detail->description; ?></p>
						<p>Harga : Rp. <?php echo $product_detail->price; ?></p>

						<?php if (!$this->ion_auth->is_admin()): ?>
							<?php echo form_open('product/add_product/' . $product_detail->id); ?>
							<fieldset>
								<label>Quantity</label> 
								<?php echo form_input('qty', '1', 'maxlength="2" style="width: 18px;"'); ?>
								<button type="submit" class="btn btn-primary">Add&nbsp;<i class="fa fa-cart-plus"></i></button>
							</fieldset>
							<?php echo form_close(); ?>	
						<?php endif ?>
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
