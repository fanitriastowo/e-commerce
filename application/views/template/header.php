	<!-- Carousel
	================================================== -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img class="carousel-image" src="<?php echo site_url('assets/images/1.png'); ?>" alt="First slide">
				<div class="container">
					<div class="carousel-caption">
						<h1>Produk berkualitas</h1>
						<p>Produk yang berkualitas adalah kunci kepuasan pelanggan.</p>
						<p>Produk kami datangkan langsung dari pabrik yang sudah berpengalaman lebih dari 20 Tahun.</p>
					</div>
				</div>
			</div>
			<div class="item">
				<img class="carousel-image"src="<?php echo site_url('assets/images/2.jpg'); ?>" alt="Second slide">
				<div class="container">
					<div class="carousel-caption">
						<h1>Kami utamakan kepuasan pelanggan</h1>
						<p>Kunci dari puasnya pelanggan adalah dengan pelayanan yang maksimal.</p>
						<p>Kami pastikan produk yang kami kirimkan tepat waktu dan sesuai dengan kondisi yang baik.</p>
					</div>
				</div>
			</div>
			<div class="item">
				<img class="carousel-image" src="<?php echo site_url('assets/images/3.jpg'); ?>" alt="Third slide">
				<div class="container">
					<div class="carousel-caption">
						<h1>Pencarian Produk</h1>
						<p>Ketikan keyword produk yang Anda cari di bawah ini.</p>
						<?php echo form_open(); ?>
						<div class="input-group">
							<input type="text" placeholder="Pencarian" class="form-control" name="search" autofocus>
							<span class="input-group-btn">
								<button class="btn btn-default" type="button">Search</button></span>
						</div>
						<?php echo form_close(); ?>
						<hr> 
					</div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<hr class="colorgraph">
	</div><!-- /.carousel -->