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

		<?php if (!empty($this->session->flashdata('error_insert'))): ?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<strong><?p
			</div>
		<?php endif ?>
		<?php if (!empty($this->session->flashdata('error_update'))): ?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<strong><?php echo $this->session->flashdata('error_update'); ?></strong>
			</div>
		<?php endif ?>
		<?php if (!empty($this->session->flashdata('notif'))): ?>
			<div class="alert alert-success alert-dismissible text-center" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<strong><?php echo $this->session->flashdata('notif'); ?></strong>
			</div>
		<?php endif ?>
		
		<div class="panel panel-primary">
			<div class="panel-heading text-center"><strong class="panel-title">Daftar Category</strong></div>
			<div class="panel-body">
				<?php foreach ($categories as $category): ?>
					<div class="col-sm-4">
						<div class="thumbnail">
							<img class="img-thumbnail" src='<?php echo site_url('images/categories/' . $category->filename); ?>' alt='<?php echo $category->name; ?>'>
							<div class="caption text-center">
								<h4><strong class="text-danger"><?php echo $category->name; ?></strong></h4>
								<div class="btn-group" role="group" aria-label="Operation">
									<a href="<?php echo site_url('administrator/category/detail/' . $category->id); ?>" class="btn btn-info trigger-update"><i class="fa fa-pencil"></i>&nbsp; Update</a>
									<a href="<?php echo site_url('administrator/category/delete/' . $category->id); ?>" class="btn btn-danger trigger-delete"><i class="fa fa-trash"></i>&nbsp; Delete</a>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
			<div class="panel-footer">
				<button class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#add-category-modal">
					<i class="fa fa-plus"></i>&nbsp; Add Category</button>
			</div>
		</div>
	</div>

	<!-- Add Modal -->
	<?php echo form_open_multipart('administrator/category/insert', 'class="form-horizontal"'); ?>
	<div class="modal fade" id="add-category-modal" tabindex="-1" role="dialog" aria-labelledby="add-category-modal-label">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="add-category-modal-label"><strong>Add Category</strong></h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="insert_name" class="col-sm-2 control-label">Nama</label>
						<div class="col-sm-10">
							<?php echo form_input('name', '', 'class="form-control" placeholder="Nama Kategori" id="insert_name" required'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="insert_image" class="col-sm-2 control-label">Upload</label>
						<div class="col-sm-10">
							<input type="file" name="filename" size="20" id="insert_image" />
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>

	<!-- Update Modal -->
	<?php echo form_open('administrator/category/update', 'class="form-horizontal"'); ?>
	<?php echo form_hidden('update_id'); ?>
	<div class="modal fade" id="update-category-modal" tabindex="-1" role="dialog" aria-labelledby="update-category-modal-label">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="update-category-modal-label"><strong>Add Category</strong></h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="update_name" class="col-sm-2 control-label">Nama</label>
						<div class="col-sm-10">
							<?php echo form_input('update_name', '', 'class="form-control" placeholder="Nama Kategori" id="update_name" required'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="update_image" class="col-sm-2 control-label">Ganti Gambar</label>
						<div class="col-sm-10">
							<input type="file" name="update_image" id="update_image" class="form-control">
						</div>
					</div>
					<div class="col-sm-12">
						<img class="img-responsive" id="image_category" src="">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>

	<!-- Modal Remove -->
	<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span><span class="sr-only">Tutup</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Hapus Category</h4>
				</div>
				<div class="modal-body">
					<strong>Apakah Anda yakin akan menghapus?</strong>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						<i class="fa fa-times"></i> Cancel</button>
					<a href="" class="btn btn-danger btn-delete">
						<i class="fa fa-check-circle"></i> Delete</a>
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
			$('#categories').addClass('active');
		});

		$('.trigger-update').click(function(e) {
			e.preventDefault();
			var updateURL = $(this).attr("href");
			$.getJSON(updateURL, function(data) {
				$('input[name="update_id"]').val(data.id),
				$('#update_name').val(data.name),
				$('img[id="image_category"]').attr('src', '<?php echo site_url("images/categories"); ?>' + '/' + data.filename)
			});
			$('#update-category-modal').modal();
		});

		$('.trigger-delete').click(function(e) {
			e.preventDefault();
			$('#modal-delete .btn-delete').attr("href", $(this).attr("href"));
			$('#modal-delete').modal();
		});
	</script>
</body>
</html>