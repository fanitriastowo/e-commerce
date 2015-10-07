 <div class="e-masthead">
 	<div class="container">
 		<div class="navbar-header">
 			<a class="e-navbar-brand" href='<?php echo site_url(); ?>'><span class="fa fa-lg fa-internet-explorer"></span> - Randu Jati</a>
 		</div>
 		<div class="navbar-right">
 			<nav class="e-nav">
 				<?php if (!$this->ion_auth->logged_in()): ?>
 					<a id="registration" class="e-nav-item" href="#" data-toggle="modal" data-target="#registration_modal">Registration</a>
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

 <!-- Modal -->
 <div class="modal fade" id="registration_modal" tabindex="-1" role="dialog" aria-labelledby="registration_modal_label">
 	<div class="modal-dialog" role="document">
 		<div class="modal-content">
 			<div class="modal-header">
 				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 				<h4 class="modal-title" id="registration_modal_label">Input your identity</h4>
 			</div>
 			<div class="modal-body">
 				<?php echo form_open('', 'class = form-horizontal'); ?>

 				<div class="form-group">
 					<label for="register_username" class="col-sm-2 control-label">Username</label>
 					<div class="col-sm-10">
 						<input type="input" class="form-control" id="register_username" placeholder="Username">
 					</div>
 				</div>

 				<div class="form-group">
 					<label for="register_email" class="col-sm-2 control-label">Email</label>
 					<div class="col-sm-10">
 						<input type="email" class="form-control" id="register_email" placeholder="Email">
 					</div>
 				</div>

 				<div class="form-group">
 					<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
 					<div class="col-sm-10">
 						<input type="password" class="form-control" id="inputPassword3" placeholder="Password">
 					</div>
 				</div>

 				<?php echo form_close(); ?>
 			</div>
 			<div class="modal-footer">
 				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 				<button type="button" class="btn btn-primary">Register</button>
 			</div>
 		</div>
 	</div>
 </div>