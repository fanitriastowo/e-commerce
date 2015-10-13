<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<title>Daftar User</title>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/datatables.bootstrap.min.css'); ?>">
</head>
<body>
	<!-- Navbar -->
	<?php $this->load->view('template/navbar'); ?>
	<div class="container">
		<h1 class="text-center">Daftar User</h1>
		<div class="text-right">
			<button class="btn btn-success">
				<i class="fa fa-plus"></i> Add User</button>
		</div> <br />
		<table id="user_table" class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th width="5%">No.</th>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Operation</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($users as $key => $user): ?>
				<tr>
					<td><?php echo $key + 1; ?></td>
					<td><?php echo $user->first_name; ?></td>
					<td><?php echo $user->last_name; ?></td>
					<td><?php echo $user->email; ?></td>
					<td><?php echo $user->phone; ?></td>
					<td>
						<a href="#" class="btn btn-xs btn-info">
							<i class="fa fa-pencil"></i> Update</a>
						<a href="#" class="btn btn-xs btn-danger">
							<i class="fa fa-trash"></i> Delete</a>
					</td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>

	<!-- Footer -->
	<?php $this->load->view('template/footer'); ?>

	<!-- Javascript -->
	<?php $this->load->view('template/js'); ?>
	<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.datatables.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/js/datatables.bootstrap.min.js'); ?>"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#users').addClass('active');
			$('#user_table').DataTable({
				"lengthMenu": [ 5, 10 ]
			});
		});
	</script>
</body>
</html>