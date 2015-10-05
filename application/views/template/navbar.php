 <div class="e-masthead">
 	<div class="container">
 		<div class="navbar-header">
 			<a class="e-navbar-brand" href='<?php echo site_url(); ?>'><span class="fa fa-lg fa-internet-explorer"></span> - Randu Jati</a>
 		</div>
 		<div class="navbar-right">
 			<nav class="e-nav">
 				<?php if (!$this->ion_auth->logged_in()): ?>
	 				<a id="registration" class="e-nav-item" href="#">Registration</a>
	 				<a id="login" class="e-nav-item" href="<?php echo site_url('user/login'); ?>">Login</a>
 				<?php endif ?>
 				
 				<?php if ($this->ion_auth->logged_in()): ?>
	 				<a class="btn btn-default" href="#"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 0</a>
	 				<a id="profile" class="e-nav-item" href="#">Your Profile</a>
	 				<a class="e-nav-item" href="<?php echo site_url('user/logout'); ?>">Logout</a>
 				<?php endif ?>
 			</nav>
 		</div>
 	</div>
 </div>