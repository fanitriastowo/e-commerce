<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<title>Testimonial</title>
</head>
<body>
	<!-- Navbar -->
	<?php $this->load->view('template/navbar'); ?>
	<div class="container">

		<h1 class="text-right">Testimonial</h1> 
		<hr class="colorgraph">

		<!-- Left Content (Categories) -->
		<?php $this->load->view('template/left'); ?>
		
		<!-- Main Content (Testimoni) -->
		<div class="col-sm-8">
			<?php foreach ($testimonis as $testimoni): ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title"><?php echo $testimoni->name; ?> - <?php echo $testimoni->kota; ?></div>
					</div>
					<div class="panel-body">
						<p><?php echo $testimoni->pesan; ?></p>
					</div>
					<div class="panel-footer">
						<strong><?php echo $testimoni->created; ?></strong>
					</div>
				</div>
			<?php endforeach ?>
			<hr>
			<div class="panel panel-info">
				<div class="panel-heading">
					<strong>Kirim Testimoni</strong>
				</div>
				<?php echo form_open('testimoni/post_testimoni', 'class="form-horizontal" id="testimoni_form"'); ?>
					<div class="panel-body">
						<div class="form-group">
							<div class="col-sm-5">
								<input type="text" class="form-control" name="name" id="name" placeholder="Nama">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-8">
								<input type="email" class="form-control" name="email" id="email" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-8">
								<input type="text" class="form-control" name="kota" id="kota" placeholder="Kota">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<textarea rows="3" name="pesan" id="pesan" class="form-control" placeholder="Ketikan Testimoni Anda"></textarea>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<div class="form-group">
							<div class="col-sm-12">
								<button type="submit" class="btn btn-primary">Kirim Testimoni</button>
							</div>
						</div>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>

		<!-- Right Content (New Product) -->
		<?php $this->load->view('template/right'); ?>
	</div>

	<!-- Footer -->
	<?php $this->load->view('template/footer'); ?>

	<!-- Javascript -->
	<?php $this->load->view('template/js'); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#testimoni').addClass('active');
		});
	</script>
</body>
</html>