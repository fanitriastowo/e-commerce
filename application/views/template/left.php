<div class="col-sm-2">
	<h3 class="text-center bg-warning"><strong>Categories</strong></h3>
	<ul class="nav nav-pills nav-stacked">
		<?php foreach ($categories as $category): ?>
			<li role="presentation">
				<a class="count_product_by_category" id="<?php echo $category->id; ?>"  href="<?php echo site_url('category/detail/' . $category->id); ?>">
					<i class="fa fa-caret-right fa-fw"></i>&nbsp;<?php echo $category->name; ?> (<span class="count_product_by_category_result_<?php echo $category->id; ?>"></span>)</a>
			</li>
		<?php endforeach ?>
	</ul>
</div>