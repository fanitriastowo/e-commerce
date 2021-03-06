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
				<span class="fa fa-plus" aria-hidden="true"></span>&nbsp;Tambah</button> 
			<a href="<?php echo site_url('akuinginwisuda/product/cetak_semua'); ?>" class="btn btn-info"><span class="fa fa-print"></span>&nbsp;Cetak</a> <br /> <br />
		</div>

		<table id="products_table" class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th width="5%">No.</th>
					<th width="25%">Name</th>
					<th width="15%">Price</th>
					<th width="30%">Description</th>
					<th width="5%">Stok</th>
					<th width="10%">Category</th>
					<th width="5%">Operation</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($products as $key => $product): ?>
				<tr>
					<td><?php echo $key + 1; ?></td>
					<td><?php echo $product->name; ?></td>
					<td>Rp. <?php echo number_format($product->price, NULL, NULL, '.'); ?></td>
					<td><?php echo $product->description; ?></td>
					<td><?php echo $product->stok; ?></td>
					<td><?php echo $product->category_name; ?></td>
					<td>
						<a href="<?php echo site_url('akuinginwisuda/product/detail/' . $product->id); ?>" class="btn btn-xs btn-info trigger-update"><i class="fa fa-pencil"></i></a>
						<a href="<?php echo site_url('akuinginwisuda/product/delete/' . $product->id); ?>" class="btn btn-xs btn-danger trigger-delete"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>

	<!-- Add Modal -->
	<?php echo form_open_multipart('akuinginwisuda/product/insert', 'class="form-horizontal" id="add_product_modal"'); ?>
	<?php echo form_hidden('form_insert', 'form_insert'); ?>
		<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Product</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="add_name" class="col-sm-2 control-label">Nama:</label>
									<div class="col-sm-10">
										<?php echo form_input('name','', 'class="form-control" id="add_name" placeholder="Input Nama Product" required'); ?>
									</div>
								</div>			

								<div class="form-group">
									<label for="add_price" class="col-sm-2 control-label">Harga:</label>
									<div class="col-sm-10">
										<?php echo form_input('price','', 'class="form-control" id="add_price" placeholder="Input Harga (tanpa titik)" required'); ?>
									</div>
								</div>

								<div class="form-group">
									<label for="add_category" class="col-sm-2 control-label">Kategori:</label>
									<div class="col-sm-6">
										<?php echo form_dropdown('category_id', $categories_dropdown, '', 'class="form-control"'); ?>
									</div>
								</div>

								<div class="form-group">
									<label for="add_stok" class="col-sm-2 control-label">Stok:</label>
									<div class="col-sm-6">
										<?php echo form_input('stok','1', 'class="form-control" id="add_stok" placeholder="Input Stok" required'); ?>
									</div>
								</div>
							</div>
							<div class="col-sm-6">

								<div class="form-group">
									<label for="add_description" class="col-sm-2 control-label">Deskripsi:</label>
									<div class="col-sm-10">
										<?php echo form_textarea(array( 'name' => 'description', 'id' => 'add_description', 'style' => 'resize:none', 'rows' => 3, 'class' => 'form-control')); ?>
									</div>
								</div>

								<div class="form-group">
									<label for="add_filename" class="col-sm-2 control-label">Upload:</label>
									<div class="col-sm-10">
										<input type="file" name="add_filename" id="add_filename" class="form-control" accept="image/x-png, image/gif, image/jpeg, image/jpg">
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-12">
										<img class="img-responsive img-thumbnail image_product" src="">
									</div>
								</div>						
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
	<?php echo form_open_multipart('akuinginwisuda/product/update', 'class="form-horizontal" id="update_product_modal"'); ?>
	<?php echo form_hidden('form_update', 'form_update'); ?>
		<div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Update Product</h4>
					</div>
					<div class="modal-body">
						<?php echo form_hidden('update_id'); ?>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="input_name" class="col-sm-2 control-label">Nama:</label>
									<div class="col-sm-10">
										<?php echo form_input('update_name','', 'class="form-control" id="input_name" placeholder="Input Nama Product" required'); ?>
									</div>
								</div>			

								<div class="form-group">
									<label for="input_price" class="col-sm-2 control-label">Harga:</label>
									<div class="col-sm-10">
										<?php echo form_input('update_price','', 'class="form-control" id="input_price" placeholder="Input Harga (tanpa titik)" required'); ?>
									</div>
								</div>

								<div class="form-group">
									<label for="select_category" class="col-sm-2 control-label">Kategori:</label>
									<div class="col-sm-6">
										<?php echo form_dropdown('update_category_id', $categories_dropdown, '', 'class="form-control" id="select_category"'); ?>
									</div>
								</div>

								<div class="form-group">
									<label for="input_stok" class="col-sm-2 control-label">Stok:</label>
									<div class="col-sm-6">
										<?php echo form_input('update_stok','', 'class="form-control" id="input_stok" placeholder="Input Stok" required'); ?>
									</div>
								</div>		
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="input_description" class="col-sm-2 control-label">Deskripsi:</label>
									<div class="col-sm-10">
										<?php echo form_textarea(array( 'name' => 'update_description', 'id' => 'input_description', 'style' => 'resize:none', 'rows' => 3, 'class' => 'form-control')); ?>
									</div>
								</div>	

								<div class="form-group">
									<label for="input_filename" class="col-sm-2 control-label">Upload:</label>
									<div class="col-sm-10">
										<input type="file" name="update_filename" id="input_filename" class="form-control" accept="image/x-png, image/gif, image/jpeg, image/jpg">
									</div>
								</div>	

								<div class="form-group">
									<div class="col-sm-12">
										<img class="img-responsive img-thumbnail image_product" src="">
									</div>
								</div>				
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
	<script type="text/javascript" src="<?php echo site_url('assets/js/bootstrap.touchspin.js'); ?>"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#products').addClass('active');
			$('#products_table').DataTable({
				"lengthMenu": [ 5, 10 ]
			});

			$("input[name='stok']").TouchSpin({
				min: 1,
				max: 100,
				stepinterval: 50
			});

			$("input[name='update_stok']").TouchSpin({
				min: 1,
				max: 100,
				stepinterval: 50
			});

			$("#add_product_modal").validate({
				rules: {
					name: {
						required : true,
						maxlength : 255,
						pattern : /^[0-9a-zA-Z'.\s]{1,40}$/
					},
					category_id: {
						required : true
					},
					price: {
						required : true,
						number : true
					},
					stok: {
						required : true,
						number : true
					}
				},
				messages: {
					name: {
						required : "Nama produk harus diisi",
						maxlength : "Maksimal 255 Karakter",
						pattern : "Tidak boleh mengandung special character"
					},
					category_id: {
						required : "Kategori harus diisi"
					},
					price: {
						required : "Harga produk harus diisi",
						number : "Harga produk hanya berupa angka"
					},
					stok: {
						required : "Stok produk harus diisi",
						number : "Stok produk hanya berupa angka"
					}
				},
				highlight : function(element) {
					$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				},
				unhighlight : function(element) {
					$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
				}
			});

			$("#update_product_modal").validate({
				rules: {
					update_name: {
						required : true,
						maxlength : 255,
						pattern : /^[0-9a-zA-Z'.\s]{1,40}$/
					},
					update_price: {
						required : true
					},
					update_category_id: {
						required : true,
						number : true
					},
					update_stok: {
						required : true,
						number : true
					}
				},
				messages: {
					update_name: {
						required : "Nama produk harus diisi",
						maxlength : "Maksimal 255 Karakter",
						pattern : "Tidak boleh mengandung special character"
					},
					update_price: {
						required : "Kategori harus diisi"
					},
					update_category_id: {
						required : "Harga produk harus diisi",
						number : "Harga produk hanya berupa angka"
					},
					update_stok: {
						required : "Stok produk harus diisi",
						number : "Stok produk hanya berupa angka"
					}
				},
				highlight : function(element) {
					$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				},
				unhighlight : function(element) {
					$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
				}
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
				$('#input_stok').val(data.stok);
				$('#input_description').val(data.description);
				if (!data.filename) {
					$('.image_product').attr('src', '<?php echo site_url("images/blank.jpg"); ?>');
				} else {
					$('.image_product').attr('src', '<?php echo site_url("images/products"); ?>' + '/' + data.filename);
				};
			});
			$('#update-modal').modal();
		});

		$('.trigger-delete').click(function(e) {
			e.preventDefault();
			$('#modal-delete .btn-delete').attr("href", $(this).attr("href"));
			$('#modal-delete').modal();
		});

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('.image_product').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}

		$("#add_filename").change(function(){
			readURL(this);
		});

		$("#input_filename").change(function(){
			readURL(this);
		});
	</script>
</body>
</html>