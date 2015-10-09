 <div class="e-masthead">
 	<div class="container">
 		<div class="navbar-header">
 			<?php echo anchor('/', '<span class="fa fa-lg fa-internet-explorer"></span> - Randu Jati', 'class="e-navbar-brand"'); ?>
 		</div>
 		<div class="navbar-right">
 			<nav class="e-nav">
 				<?php if (!$this->ion_auth->logged_in()): ?>
 					<?php echo anchor('#', 'Registration', 'id="registration" class="e-nav-item" title="Input your registration identity" data-toggle="modal" data-target="#registration_modal"'); ?>
 					<?php echo anchor('user/user/login', 'Login', 'id="login" class="e-nav-item"'); ?>
 				<?php endif ?>
 				
 				<?php if ($this->ion_auth->logged_in() && !$this->ion_auth->is_admin()): ?>
 					<?php echo anchor('#', '<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 0', 'class="btn btn-default"'); ?>
 					<?php echo anchor('user/profile', 'Profile', 'id="profile" class="e-nav-item"'); ?>
 					<?php echo anchor('user/user/logout', 'Logout', 'class="e-nav-item"'); ?>
 				<?php endif ?>

 				<?php if ($this->ion_auth->is_admin()): ?>
 					<?php echo anchor('#', 'Products', 'id="products" class="e-nav-item"'); ?>
 					<?php echo anchor('#', 'Categories', 'id="categories" class="e-nav-item"'); ?>
 					<?php echo anchor('administrator/pemesanan', 'Pemesanan', 'id="pemesanan" class="e-nav-item"'); ?>
 					<?php echo anchor('#', 'Users', 'id="users" class="e-nav-item"'); ?>
 					<?php echo anchor('#', 'Config', 'id="users" class="e-nav-item"'); ?>
 					<?php echo anchor('user/user/logout', 'Logout', 'class="e-nav-item"'); ?>
 				<?php endif ?>
 			</nav>
 		</div>
 	</div>
 </div>

 <!-- Registration Modal -->
 <?php echo form_open('user/user/registration', 'class = form-horizontal'); ?>
 <div class="modal fade" id="registration_modal" tabindex="-1" role="dialog" aria-labelledby="registration_modal_label">
 	<div class="modal-dialog" role="document">
 		<div class="modal-content">
 			<div class="modal-header bg-info">
 				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 				<h4 class="modal-title" id="registration_modal_label"><strong>Create Account</strong></h4>
 				<p>It's free and always be</p>
 			</div>
 			<div class="modal-body">

 				<div class="form-group">
 					<div class="col-sm-6">
 						<?php echo form_input('first_name','', 'class="form-control" id="register_firstname" placeholder="Firstname" required'); ?>
 					</div>
 					<div class="col-sm-6">
 						<?php echo form_input('last_name','', 'class="form-control" id="register_lastname" placeholder="Lastname" required'); ?>
 					</div>
 				</div>

 				<div class="form-group">
 					<div class="col-sm-6">
 						<?php echo form_password('password','', 'class="form-control" id="register_password" placeholder="Password" required'); ?>
 					</div>
 					<div class="col-sm-6">
 						<?php echo form_password('confirm_password','', 'class="form-control" id="register_confirm_password" placeholder="Confirm Password" required'); ?>
 					</div>
 				</div>

 				<div class="form-group">
 					<div class="col-sm-12">
 						<?php echo form_input('email','', 'class="form-control" id="register_email" placeholder="Email" required'); ?>
 					</div>
 				</div>

 				<div class="form-group">
 					<div class="col-sm-12">
 						<?php echo form_input('phone','', 'class="form-control" id="register_phone" placeholder="Phone Number" required'); ?>
 					</div>
 				</div>

 			</div>
 			<div class="modal-footer">
 				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 				<?php echo form_submit('submit', 'Register', 'class = "btn btn-primary"'); ?>
 			</div>
 		</div>
 	</div>
 </div>
 <?php echo form_close(); ?>