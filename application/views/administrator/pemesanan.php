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
	
		<?php if (!empty($this->session->flashdata('delete_success'))): ?>
			<div class="alert alert-info alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<strong><?php echo $this->session->flashdata('delete_success'); ?></strong>
			</div>
		<?php endif ?>
	
		<h1>Daftar Pemesanan</h1>
		<div class="text-right">
			<a href="#" class="btn btn-info">
				<i class="fa fa-print"></i>&nbsp;Cetak</a><br><br>
		</div>
		<table id="pemesanan_table" class="table table-hover table-bordered table-striped">
			<thead>
				<tr>
					<th width="5%">No.</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th>Pemesan</th>
					<th>Domisili</th>
					<th width="20%">Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($pemesanans as $i => $pemesanan): ?>
				<tr>
					<td><?php echo $i + 1; ?></td>
					<td><?php echo date("d F Y G.i", strtotime($pemesanan->created)); ?></td>
					<td><?php echo $pemesanan->status; ?></td>
					<td><?php echo $pemesanan->first_name; ?> <?php echo $pemesanan->last_name; ?></td>
					<td><?php echo $pemesanan->domisili; ?></td>
					<td>
						<a href="<?php echo site_url('akuinginwisuda/pemesanan/detail/' . $pemesanan->id); ?>" class="btn btn-xs btn-warning"><i class="fa fa-gear"></i> Detail</a>
						<?php if ($pemesanan->status === 'Disetujui'): ?>
						<a href="<?php echo site_url('akuinginwisuda/pemesanan/cetak/' . $pemesanan->id); ?>" class="btn btn-xs btn-info"><i class="fa fa-print"></i> Cetak</a>
						<?php endif ?>
						<a href="<?php echo site_url('akuinginwisuda/pemesanan/delete/' . $pemesanan->id); ?>" class="btn btn-xs btn-danger prepare-delete"><i class="fa fa-trash"></i> Delete</a>						
					</td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<!-- Footer -->
	<?php $this->load->view('template/footer'); ?>
	
	<!-- Modal Remove -->
	<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span><span class="sr-only">Tutup</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Hapus Pemesanan</h4>
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

		$('.prepare-delete').click(function(e) {
			e.preventDefault();
			$('#modal-delete .btn-delete').attr("href", $(this).attr("href"));
			$('#modal-delete').modal();
		});
	</script>
</body>
</html>