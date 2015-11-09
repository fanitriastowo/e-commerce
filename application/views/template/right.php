<div class="col-sm-2">
	<div class="nav-side-menu">
		<style type="text/css">
			.calendar {
				position: relative;
				background-color: #663300;
			}

			.clock {
				width: auto;
				margin: 0 auto;
				border: 1px solid #333;
				color: #fff;
			}

			#Date {
				font-family: 'BebasNeueRegular', Arial, Helvetica, sans-serif;
				font-size: 12px;
				text-align: center;
				text-shadow: 0 0 5px #00c6ff;
			}

			.separator {
				width: 180px;
				margin: 0 auto;
				padding: 0px;
				list-style: none;
				text-align: center;
			}

			.separator > .inline-time {
				display: inline;
				font-size: 12px;
				text-align: center;
				font-family: 'BebasNeueRegular', Arial, Helvetica, sans-serif;
				text-shadow: 0 0 5px #00c6ff;
			}

			#point {
				position: relative;
				padding-left: 5px;
				padding-right: 5px;
			}

			.brand {
				background-color: #94C3EA;
				line-height: 40px;
				display: block;
				text-align: center;
				font-size: 23px;
			}
		</style>
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
		<hr>
	</div>
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
						<img src='<?php echo !empty($product->filename) ? site_url('images/products/' . $product->filename ): site_url('images/blank.jpg'); ?>' class="img-responsive img-thumbnail" width="80%">
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
						<img src='<?php echo !empty($product->filename) ? site_url('images/products/' . $product->filename ): site_url('images/blank.jpg'); ?>' class="img-responsive img-thumbnail" width="80%">
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