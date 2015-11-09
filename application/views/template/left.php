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
		<div class="brand"><strong>Live Chat</strong></div>
		<a href="ymsgr:SendIM?mikeybest_drummer">
		<img border=0 src="http://opi.yahoo.com/online?u=mikeybest_drummer&m=g&t=13"></a>
	</div>
	<hr>

	<div class="brand"><strong>Kontak</strong></div>
	<div class="panel panel-warning">
		<div class="panel-body bg-warning">
			<p>Visit us in facebook</p>
			<a class="btn btn-xs btn-primary btn-block" href="https://www.facebook.com/meublerandujati">Facebook</a> <hr>
			<h3 class="label label-warning">Phone Number</h3>
			<p class="label label-danger">0815-4266-6676</p> <hr>
			<h3 class="">Alamat</h3>
			<p class="">Jalan Bhayangkara RT 02 RW 04 Desa Karangmangu Kroya</p>
		</div>
	</div>
</div>