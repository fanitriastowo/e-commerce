<!DOCTYPE html>
<html lang="en">
<head>
	<!-- CSS -->
	<?php $this->load->view('template/css'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/datatables.bootstrap.min.css'); ?>">
	<title>Pemesanan Detail</title>
</head>
<body>
	<!-- Navbar -->
	<?php $this->load->view('template/navbar'); ?>
	<div class="container">
		<h1>Detail Pemesanan</h1><hr>
		<h3>Pemesan: <?php echo $pemesanan->first_name; ?> <?php echo $pemesanan->last_name; ?></h3>
		<p>Alamat: <?php echo $pemesanan->address; ?></p><hr>

		<?php echo form_open('akuinginwisuda/pemesanan/approve'); ?>
		<?php echo form_hidden('approve_id', $pemesanan->id); ?>
		<table id="pemesanan_detail_table" class="table table-hover table-bordered table-striped">
			<thead>
				<tr>
					<th width="5%">No.</th>
					<th>Nama Produk</th>
					<th>Jumlah</th>
					<th>Harga</th>
					<th>Subtotal</th>
				</tr>
			</thead>
			<tbody>
			<?php $jumlah = 0; ?>
			<?php foreach ($pemesanan_details as $i => $pemesanan_detail): ?>
				<tr>
					<td><?php echo $i + 1; ?></td>
					<td><?php echo $pemesanan_detail->name; ?></td>
					<td><?php echo $pemesanan_detail->qty; ?></td>
					<td><?php echo number_format($pemesanan_detail->price, NULL, NULL, '.'); ?></td>
					<td><?php echo $pemesanan_detail->subtotal; ?></td>
				</tr>
				<?php $jumlah += $pemesanan_detail->subtotal; ?>
			<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td><strong>Jumlah</strong></td>
					<td><strong><?php echo number_format($jumlah, NULL, NULL, '.'); ?></strong></td>
				</tr>
			</tfoot>
		</table>
		<hr>
		<?php if ($pemesanan->status === 'Proses'): ?>
			<div class="text-center">
				<div class="btn-group" role="group" aria-label="Operation">
					<?php echo form_submit('submit', 'Approve', 'class="btn btn-lg btn-success"'); ?>
					<a href="<?php echo site_url('akuinginwisuda/pemesanan/batal/' . $pemesanan->id); ?>" class="btn btn-lg btn-danger">Cancel</a>
				</div>
			</div>
		<?php endif ?>
		<?php echo form_close(); ?>
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
			$('#pemesanan_detail_table').DataTable({
				"lengthMenu": [ 5, 10 ]
			});
		});
	</script>
</body>
</html>