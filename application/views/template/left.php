<div class="col-sm-2">
	<div class="nav-side-menu">
		<div class="brand"><strong>Category</strong></div>
		<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

		<div class="menu-list">
			<ul id="menu-content" class="menu-content collapse out">
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
</div>