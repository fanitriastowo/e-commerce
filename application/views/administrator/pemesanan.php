<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/datatables.bootstrap.min.css'); ?>">
	<title>Daftar Pemesanan</title>
</head>
<body>
	<!-- Navbar -->
	<?php $this->load->view('template/navbar'); ?>
	<div class="container">
		<h1>Daftar Pemesanan</h1>

		<table id="pemesanan_table" class="table table-hover table-bordered table-striped">
			<thead>
				<tr>
					<th width="5%">No.</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th>Pemesan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($pemesanans as $i => $pemesanan): ?>
				<tr>
					<td><?php echo $i + 1; ?></td>
					<td><?php echo date("d F Y G.i", strtotime($pemesanan->created)); ?></td>
					<td><?php echo $pemesanan->status; ?></td>
					<td><?php echo $pemesanan->first_name; ?> <?php echo $pemesanan->last_name; ?></td>
					<td>
						<a href="<?php echo site_url('administrator/pemesanan/detail/' . $pemesanan->id); ?>" class="btn btn-xs btn-warning"><i class="fa fa-gear"></i> Detail</a>
						<?php if ($pemesanan->status === 'Disetujui'): ?>
						<a href="<?php echo site_url('administrator/pemesanan/cetak/' . $pemesanan->id); ?>" class="btn btn-xs btn-info"><i class="fa fa-gear"></i> Cetak</a>
						<?php endif ?>
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
			$('#pemesanan').addClass('active');
			$('#pemesanan_table').DataTable({
				"lengthMenu": [ 5, 10 ]
			});
		});
	</script>
</body>
</html>