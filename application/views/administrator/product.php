<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/datatables.bootstrap.min.css'); ?>">
	<title>Daftar Product</title>
</head>
<body>
	<!-- Navbar -->
	<?php $this->load->view('template/navbar'); ?>
	<div class="container">
		<?php if (!empty($this->session->flashdata('error_insert'))): ?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<strong><?php echo $this->session->flashdata('error_insert'); ?></strong>
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

		<h1 class="text-center">Daftar Product</h1>
		
		<div class="text-right">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-modal">
				<span class="fa fa-plus" aria-hidden="true"></span> Add Product</button> <br /> <br />
		</div>

		<table id="products_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th width="5%">No.</th>
					<th>Name</th>
					<th>Price</th>
					<th>Description</th>
					<th>Category</th>
					<th>Operation</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($products as $key => $product): ?>
				<tr>
					<td><?php echo $key + 1; ?></td>
					<td><?php echo $product->name; ?></td>
					<td><?php echo $product->price; ?></td>
					<td><?php echo $product->description; ?></td>
					<td><?php echo $product->category_name; ?></td>
					<td>
						<a href="<?php echo site_url('administrator/product/detail/' . $product->id); ?>" class="btn btn-xs btn-info trigger-update"><i class="fa fa-pencil"></i> Update</a>
						<a href="<?php echo site_url('administrator/product/delete/' . $product->id); ?>" class="btn btn-xs btn-danger trigger-delete"><i class="fa fa-trash"></i> Delete</a>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>

	<!-- Add Modal -->
	<?php echo form_open('administrator/product/insert', 'class="form-horizontal"'); ?>
	<?php echo form_hidden('form_insert', 'form_insert'); ?>
		<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Product</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="add_name" class="col-sm-2 control-label">Nama:</label>
							<div class="col-sm-10">
								<?php echo form_input('name','', 'class="form-control" id="add_name" placeholder="Input Nama Product" required'); ?>
							</div>
						</div>			

						<div class="form-group">
							<label for="add_price" class="col-sm-2 control-label">Harga:</label>
							<div class="col-sm-10">
								<?php echo form_input('price','', 'class="form-control" id="add_price" placeholder="Input Harga" required'); ?>
							</div>
						</div>

						<div class="form-group">
							<label for="add_category" class="col-sm-2 control-label">Kategori:</label>
							<div class="col-sm-4">
								<?php echo form_dropdown('category_id', $categories_dropdown, '', 'class="form-control"'); ?>
							</div>
						</div>

						<div class="form-group">
							<label for="add_description" class="col-sm-2 control-label">Deskripsi:</label>
							<div class="col-sm-10">
								<?php echo form_textarea(array( 'name' => 'description', 'id' => 'add_description', 'style' => 'resize:none', 'rows' => 3, 'class' => 'form-control')); ?>
							</div>
						</div>						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">
							<i class="fa fa-times"></i> Cancel</button>
						<button type="submit" class="btn btn-success" name="submit_save">
							<i class="fa fa-check-circle"></i> Save</button>
					</div>
				</div>
			</div>
		</div>
	<?php echo form_close(); ?>

	<!-- Update Modal -->
	<?php echo form_open('administrator/product/update', 'class="form-horizontal"'); ?>
	<?php echo form_hidden('form_update', 'form_update'); ?>
		<div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Update Product</h4>
					</div>
					<div class="modal-body">
						<?php echo form_hidden('update_id'); ?>
						<div class="form-group">
							<label for="input_name" class="col-sm-2 control-label">Nama:</label>
							<div class="col-sm-10">
								<?php echo form_input('update_name','', 'class="form-control" id="input_name" placeholder="Input Nama Product" required'); ?>
							</div>
						</div>			

						<div class="form-group">
							<label for="input_price" class="col-sm-2 control-label">Harga:</label>
							<div class="col-sm-10">
								<?php echo form_input('update_price','', 'class="form-control" id="input_price" placeholder="Input Harga" required'); ?>
							</div>
						</div>

						<div class="form-group">
							<label for="select_category" class="col-sm-2 control-label">Kategori:</label>
							<div class="col-sm-4">
								<?php echo form_dropdown('update_category_id', $categories_dropdown, '', 'class="form-control" id="select_category"'); ?>
							</div>
						</div>

						<div class="form-group">
							<label for="input_description" class="col-sm-2 control-label">Deskripsi:</label>
							<div class="col-sm-10">
								<?php echo form_textarea(array( 'name' => 'update_description', 'id' => 'input_description', 'style' => 'resize:none', 'rows' => 3, 'class' => 'form-control')); ?>
							</div>
						</div>						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">
							<i class="fa fa-times"></i> Cancel</button>

						<button type="submit" class="btn btn-success" name="submit_update">
							<i class="fa fa-check-circle"></i> Save</button>
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
					<h4 class="modal-title" id="myModalLabel">Hapus Product</h4>
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
	<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.datatables.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/js/datatables.bootstrap.min.js'); ?>"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#products').addClass('active');
			$('#products_table').DataTable({
				"lengthMenu": [ 5, 10 ]
			});
		});

		$('.trigger-update').click(function(e) {
			e.preventDefault();
			var updateURL = $(this).attr("href");
			$.getJSON(updateURL, function(data) {
				$('input[name="update_id"]').val(data.id);
				$('#input_name').val(data.name);
				$('#input_price').val(data.price);
				$('#select_category').val(data.category_id);
				$('#input_description').val(data.description);
			});
			$('#update-modal').modal();
		});

		$('.trigger-delete').click(function(e) {
			e.preventDefault();
			$('#modal-delete .btn-delete').attr("href", $(this).attr("href"));
			$('#modal-delete').modal();
		});
	</script>
</body>
</html>