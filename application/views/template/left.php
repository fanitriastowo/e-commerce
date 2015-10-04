<div class="col-sm-2">
	<h3 class="text-center bg-warning"><strong>Categories</strong></h3>
	<ul class="nav nav-pills nav-stacked">
		<?php foreach ($categories as $category): ?>
			<li role="presentation"><a href="#"><?php echo $category->name; ?></a></li>
		<?php endforeach ?>
	</ul>
</div>