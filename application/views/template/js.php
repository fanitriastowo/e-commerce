<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var totalProductsURL = '<?php echo site_url("user/pesan/total_products"); ?>';
		$.getJSON(totalProductsURL, function(data) {
			$('#cart').html(data);
		});
	});
</script>