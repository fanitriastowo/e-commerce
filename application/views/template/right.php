<div class="col-sm-2">
	<h3 class="text-center bg-warning"><strong>New Product</strong></h3>
	<ul class="nav nav-pills nav-stacked">
		<?php foreach ($products as $product): ?>
			<li role="presentation">
				<a href="<?php echo site_url('product/detail/' . $product->id); ?>">
					<img src='<?php echo !empty($product->filename) ? site_url('images/products/' . $product->filename ): site_url('images/blank.jpg'); ?>' class="img-responsive img-thumbnail" width="50%">
				</a>
			</li>
			<p><?php echo $product->name; ?></p>
		<?php endforeach ?>
	</ul>
</div>