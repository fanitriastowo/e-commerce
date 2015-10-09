<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<title>Daftar Category</title>
</head>
<body>
	<!-- Navbar -->
	<?php $this->load->view('template/navbar'); ?>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading text-center"><strong class="panel-title">Daftar Category</strong></div>
			<div class="panel-body">
				<?php foreach ($categories as $category): ?>
					<div class="col-sm-4">
						<div class="thumbnail">
							<a href="#"><img class="img-thumbnail" src='<?php echo site_url('images/blank.jpg'); ?>' alt='<?php echo $category->name; ?>'></a>
							<div class="caption text-center">
								<h4><strong class="text-danger"><?php echo $category->name; ?></strong></h4>
								<div class="btn-group" role="group" aria-label="Operation">
									<a href="#" class="btn btn-info"><i class="fa fa-pencil"></i>&nbsp; Update</a>
									<a href="#" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp; Delete</a>
								</div>


							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
			<div class="panel-footer">
				<a href="#" class="btn btn-success btn-lg btn-block"><i class="fa fa-plus"></i>&nbsp; Add Category</a>
			</div>
		</div>
		
	</div>

	<!-- Footer -->
	<?php $this->load->view('template/footer'); ?>

	<!-- Javascript -->
	<?php $this->load->view('template/js'); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#categories').addClass('active');
		});
	</script>
</body>
</html>