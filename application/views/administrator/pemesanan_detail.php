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
		<h1>Detail Pemesanan</h1>

		<table id="pemesanan_detail_table" class="table table-hover table-bordered table-striped" cellspacing="0" width="100%">
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
			<?php foreach ($pemesanan_details as $i => $pemesanan_detail): ?>
				<tr>
					<td><?php echo $i + 1; ?></td>
					<td><?php echo $pemesanan_detail->name; ?></td>
					<td><?php echo $pemesanan_detail->qty; ?></td>
					<td><?php echo $pemesanan_detail->price; ?></td>
					<td><?php echo $pemesanan_detail->subtotal; ?></td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
		<hr>
		<a href="#" class="btn btn-lg btn-block btn-success">Approve</a>
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
				"lengthMenu": [ 5, 10 ],

				"footerCallback": function ( row, data, start, end, display ) {
		            var api = this.api(), data;
		 
		            // Remove the formatting to get integer data for summation
		            var intVal = function ( i ) {
		                return typeof i === 'string' ? i.replace(/[\$,]/g, '')*1 : typeof i === 'number' ? i : 0;
		            };
		 
		            // Total over all pages
		            total = api.column( 4 ).data().reduce( function (a, b) {
                    	return intVal(a) + intVal(b);
                	});
		 
		            // Total over this page
		            pageTotal = api.column( 4, { page: 'current'} ).data().reduce( function (a, b) {
	                    return intVal(a) + intVal(b);
	                }, 0 );
		 
		            // Update footer
		            $( api.column( 4 ).footer() ).html(
		                '$'+pageTotal +' ( $'+ total +' total)'
		            );
		        }
			});
		});
	</script>
</body>
</html>