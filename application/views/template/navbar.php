<div class="navbar-wrapper">
<div class="e-masthead navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
 			<?php echo anchor('/', '<span class="fa fa-lg fa-internet-explorer"></span> - Randu Jati', 'class="e-navbar-brand"'); ?>
 		</div>
 		<div class="col-sm-4 col-md-4">
 			<?php echo form_open('', 'class="navbar-form" role="search"'); ?>
	 			<div class="input-group">
	 				<input size="40" type="text" placeholder="Pencarian" class="form-control" name="search">
	 				<div class="input-group-btn">
	 					<button class="btn btn-default" type="submit">
	 						<i class="glyphicon glyphicon-search"></i></button>
	 				</div>
 				</div>
			<?php echo form_close(); ?>
 		</div>
		<div class="navbar-right">
			<nav class="e-nav">
 				<?php if (!$this->ion_auth->logged_in()): ?>
	 				<a href="<?php echo site_url('product/show_all_products'); ?>" class="btn btn-default">
	 					<span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;<span id="cart" class="badge"></span></a>
 					<?php echo anchor('about', 'About', 'id="about" class="e-nav-item"'); ?>
 					<?php echo anchor('caramemesan', 'Cara Memesan', 'id="caramemesan" class="e-nav-item"'); ?>
 					<?php echo anchor('register', 'Registration', 'id="registration" class="e-nav-item" title="Input your registration identity"'); ?>
 					<?php echo anchor('user/user/login', 'Login', 'id="login" class="e-nav-item"'); ?>
 				<?php endif ?>
 				
 				<?php if ($this->ion_auth->logged_in() && !$this->ion_auth->is_admin()): ?>
	 				<a href="<?php echo site_url('product/show_all_products'); ?>" class="btn btn-default">
	 					<span id="cart" class="glyphicon glyphicon-shopping-cart badge"></span></a>
 					<?php echo anchor('about', 'About', 'id="about" class="e-nav-item"'); ?>
 					<?php echo anchor('caramemesan', 'Cara Memesan', 'id="caramemesan" class="e-nav-item"'); ?>
 					<?php echo anchor('user/profile', 'Profile', 'id="profile" class="e-nav-item"'); ?>
 					<?php echo anchor('user/user/logout', 'Logout', 'class="e-nav-item"'); ?>
 				<?php endif ?>

 				<?php if ($this->ion_auth->is_admin()): ?>
 					<?php echo anchor('administrator/product', 'Products', 'id="products" class="e-nav-item"'); ?>
 					<?php echo anchor('administrator/category', 'Categories', 'id="categories" class="e-nav-item"'); ?>
 					<?php echo anchor('administrator/pemesanan', 'Pemesanan', 'id="pemesanan" class="e-nav-item"'); ?>
 					<?php echo anchor('administrator/member', 'Members', 'id="member" class="e-nav-item"'); ?>
 					<?php echo anchor('administrator/config', 'Config', 'id="config" class="e-nav-item"'); ?>
 					<?php echo anchor('administrator/administrator/logout', 'Logout', 'class="e-nav-item"'); ?>
 				<?php endif ?>
 			</nav>
		</div>
	</div>
</div>
</div>