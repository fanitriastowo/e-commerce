<div class="col-sm-2">
	<h3 class="text-center bg-warning"><strong>New Product</strong></h3>
	<ul class="nav nav-pills nav-stacked">
		<?php foreach ($products as $product): ?>
			<li role="presentation">
				<a href="<?php echo site_url('product/detail/' . $product->id); ?>"><i class="fa fa-star fa-fw"></i>&nbsp; <?php echo $product->name; ?></a>
			</li>
		<?php endforeach ?>
	</ul>
</div>