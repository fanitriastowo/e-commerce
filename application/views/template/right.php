<div class="col-sm-2">
	<div class="nav-side-menu">
		<div class="brand"><strong>New Product</strong></div>
		<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-product"></i>

		<div class="menu-list">
			<ul id="menu-product" class="menu-content collapse out">

			<?php foreach ($products as $product): ?>
			<li class="text-center">
				<a href="<?php echo site_url('product/detail/' . $product->id); ?>">
					<img src='<?php echo !empty($product->filename) ? site_url('images/products/' . $product->filename ): site_url('images/blank.jpg'); ?>' class="img-responsive img-thumbnail" width="80%">
				</a><br>
				<?php echo $product->name; ?>
			</li>
			<br>
			<?php endforeach ?>
			</ul>
		</div>
	</div>
</div>