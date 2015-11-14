<div class="col-sm-2">
	<div class="nav-side-menu">
		<div class="brand"><strong>Hari ini</strong></div>
		<div class="calendar">
			<div class="clock">
				<div id="Date"></div>
				<ul class="separator">
					<li class="inline-time" id="hours"></li>
					<li class="inline-time" id="point">:</li>
					<li class="inline-time" id="min"></li>
				</ul>
				<hr>
				<label>Your Ip: <?php echo $ip_address; ?></label>
				<label>Your Browser: <?php echo $user_agent; ?></label>
				<label>Visitor: </label>
			</div>
		</div>
	</div>
	<hr>
	<div class="nav-side-menu">
		<div class="brand"><strong>New Product</strong></div>
		<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-product"></i>

		<div class="menu-list">
			<ul id="menu-product" class="menu-content collapse out">

			<?php foreach ($products as $product): ?>
			<?php if ($product->stok == 0): ?>
				<li class="text-center">
				<div class="thumbnail relative-thumbnail">
					<a href="<?php echo site_url('product/detail/' . $product->id); ?>">
						<img src='<?php echo !empty($product->filename) ? site_url('images/products/' . $product->filename ): site_url('images/blank.jpg'); ?>' class="img-responsive img-thumbnail" width="120px">
					</a>
					<div class="caption text-center relative-caption">
						<h3 class="text-soldout text-primary rotate"><strong>SOLD OUT</strong></h3>
					</div>
					<br>
					<?php echo $product->name; ?>
				</div>
				</li>
				<br>
			<?php else: ?>
				<li class="text-center">
					<a href="<?php echo site_url('product/detail/' . $product->id); ?>">
						<img src='<?php echo !empty($product->filename) ? site_url('images/products/' . $product->filename ): site_url('images/blank.jpg'); ?>' class="img-responsive img-thumbnail" width="120px">
					</a><br>
					<?php echo $product->name; ?>
				</li>
				<br>
			<?php endif ?>
			<?php endforeach ?>
			</ul>
		</div>
	</div>
</div>