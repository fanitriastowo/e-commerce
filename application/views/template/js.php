<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.validate.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/additional-methods.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/bootstrap.min.js'); ?>"></script>

<?php if ($this->ion_auth->logged_in() && !$this->ion_auth->is_admin()): ?>
<script type="text/javascript">
	$(document).ready(function(){
		var totalProductsURL = '<?php echo site_url("user/pesan/total_products"); ?>';
		$.getJSON(totalProductsURL, function(data) {
			$('#cart').html(data);
		});
	});
</script>
<?php endif ?>

<?php if (!$this->ion_auth->is_admin()): ?>
<script type="text/javascript">
	$(document).ready(function(){
		$(".count_product_by_category").each(function(){
		   	var id = $(this).attr('id');
			var count = '<?php echo site_url("product/count_product_by_category/"); ?>/' + id;
			$.getJSON(count, function(data) {
				$('.count_product_by_category_result_' + id).html(data);
			});
		});
	});
</script>
<?php endif ?>