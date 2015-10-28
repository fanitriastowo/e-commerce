 <div class="e-masthead navbar-fixed-top">
 	<div class="container">
 		<div class="navbar-header">
 			<?php echo anchor('/', '<span class="fa fa-lg fa-internet-explorer"></span> - Randu Jati', 'class="e-navbar-brand"'); ?>
 		</div>
 		<div class="navbar-right">
 			<nav class="e-nav">
 				<?php if (!$this->ion_auth->logged_in()): ?>
 					<?php echo anchor('about', 'About', 'id="about" class="e-nav-item"'); ?>
 					<?php echo anchor('ketentuan', 'Ketentuan', 'id="ketentuan" class="e-nav-item"'); ?>
 					<?php echo anchor('register', 'Registration', 'id="registration" class="e-nav-item" title="Input your registration identity"'); ?>
 					<?php echo anchor('user/user/login', 'Login', 'id="login" class="e-nav-item"'); ?>
 				<?php endif ?>
 				
 				<?php if ($this->ion_auth->logged_in() && !$this->ion_auth->is_admin()): ?>
 					<a href="<?php echo site_url('user/pesan/show_all_products'); ?>" class="btn btn-default"><span id="cart"  class="glyphicon glyphicon-shopping-cart"></span></a>
 					<?php echo anchor('about', 'About', 'id="about" class="e-nav-item"'); ?>
 					<?php echo anchor('ketentuan', 'Ketentuan', 'id="ketentuan" class="e-nav-item"'); ?>
 					<?php echo anchor('user/profile', 'Profile', 'id="profile" class="e-nav-item"'); ?>
 					<?php echo anchor('user/user/logout', 'Logout', 'class="e-nav-item"'); ?>
 				<?php endif ?>

 				<?php if ($this->ion_auth->is_admin()): ?>
 					<?php echo anchor('administrator/product', 'Products', 'id="products" class="e-nav-item"'); ?>
 					<?php echo anchor('administrator/category', 'Categories', 'id="categories" class="e-nav-item"'); ?>
 					<?php echo anchor('administrator/pemesanan', 'Pemesanan', 'id="pemesanan" class="e-nav-item"'); ?>
 					<?php echo anchor('administrator/member', 'Members', 'id="member" class="e-nav-item"'); ?>
 					<?php echo anchor('#', 'Config', 'id="config" class="e-nav-item"'); ?>
 					<?php echo anchor('administrator/administrator/logout', 'Logout', 'class="e-nav-item"'); ?>
 				<?php endif ?>
 			</nav>
 		</div>
 	</div>
 </div>