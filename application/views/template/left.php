<div class="col-sm-2">
	<div class="nav-side-menu">
		<div class="brand"><strong>Category</strong></div>
		<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-category"></i>

		<div class="menu-list">
			<ul id="menu-category" class="menu-content collapse out">
			<?php foreach ($categories as $category): ?>
				<li>            	
					<a class="count_product_by_category" id="<?php echo $category->id; ?>"  href="<?php echo site_url('category/detail/' . $category->id); ?>">
						<i class="fa fa-asterisk fa-fw"></i>&nbsp;<?php echo $category->name; ?> 
						(<span class="badge count_product_by_category_result_<?php echo $category->id; ?>"></span>)
					</a>
				</li>
			<?php endforeach ?>
			</ul>
		</div>
	</div>
	<hr>

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