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
					<img width="80%" class="img-responsive img-rounded" src='<?php echo !empty($product_detail->filename) ? site_url('images/products/' . $product_detail->filename ): site_url('images/blank.jpg'); ?>' alt='<?php echo $product_detail->name; ?>'>
					<div class="caption text-center">
						<h3><strong><?php echo $product_detail->name; ?></strong></h3>
						<p><?php echo $product_detail->description; ?></p>
						<p>Harga : Rp. <?php echo $product_detail->price; ?></p>
						<p>Tesedia : <?php echo $product_detail->stok; ?> Stok</p>

						<?php if (!$this->ion_auth->is_admin()): ?>
							<?php echo form_open('product/add_product/' . $product_detail->id, 'id="form_qty"'); ?>
							<fieldset>
								<label>Jumlah</label> 
								<?php echo form_input('qty', '1', 'maxlength="2" style="width: 18px;" id="txt_jmlh"'); ?>
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

	<style type="text/css">
		.modal {
			/*   display: block;*/
			background-color: rgba(4, 4, 4, 0.8); 
		}

		.modal-dialog {
			top: 20%;
			width: 100%;
			position: absolute;
		}
		.modal-content {
			border-radius: 0px;
			border: none;
			top: 40%;
		}
		.modal-body {
			background-color: #0f8845;
			color: white;
		}

	</style>
	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-body">
					<div class="text-center">
						<h2>Oooppssss!</h2>
						<h4>Pesanan Anda melebih stok yang tersedia.</h4>
					</div>	
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<?php $this->load->view('template/footer'); ?>

	<!-- Javascript -->
	<?php $this->load->view('template/js'); ?>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#form_qty').submit(function(e) {
				var jml = $('#txt_jmlh').val();
				var stok = <?php echo $product_detail->stok; ?>;
				if (jml > stok) {
					e.preventDefault();
					$('.bs-example-modal-lg').modal();
				};
			});
		});
	</script>
</body>
</html>
