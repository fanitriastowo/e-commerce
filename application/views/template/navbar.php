 <div class="e-masthead">
 	<div class="container">
 		<div class="navbar-header">
 			<?php echo anchor('/', '<span class="fa fa-lg fa-internet-explorer"></span> - Randu Jati', 'class="e-navbar-brand"'); ?>
 		</div>
 		<div class="navbar-right">
 			<nav class="e-nav">
 				<?php if (!$this->ion_auth->logged_in()): ?>
 					<?php echo anchor('#', 'Registration', 'id="registration" class="e-nav-item" title="Input your registration identity" data-toggle="modal" data-target="#registration_modal"'); ?>
 					<?php echo anchor('user/login', 'Login', 'id="login" class="e-nav-item"'); ?>
 				<?php endif ?>
 				
 				<?php if ($this->ion_auth->logged_in()): ?>
 					<?php echo anchor('#', '<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 0', 'class="btn btn-default"'); ?>
 					<?php echo anchor('#', 'Your Profile', 'id="profile" class="e-nav-item"'); ?>
 					<?php echo anchor('user/logout', 'Logout', 'class="e-nav-item"'); ?>
 				<?php endif ?>
 			</nav>
 		</div>
 	</div>
 </div>

 <!-- Modal -->
 <?php echo form_open('user/registration', 'class = form-horizontal'); ?>
 <div class="modal fade" id="registration_modal" tabindex="-1" role="dialog" aria-labelledby="registration_modal_label">
 	<div class="modal-dialog" role="document">
 		<div class="modal-content">
 			<div class="modal-header bg-danger">
 				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 				<h4 class="modal-title" id="registration_modal_label"><strong>Input your identity</strong></h4>
 			</div>
 			<div class="modal-body">

 				<div class="form-group">
	 				<?php echo form_label('Username', 'register_username', array('class' => 'col-sm-2 control-label')); ?>
 					<div class="col-sm-10">
 						<?php echo form_input('username','', 'class="form-control" id="register_username" placeholder="Username" required'); ?>
 					</div>
 				</div>

 				<div class="form-group">
	 				<?php echo form_label('Email', 'register_email', array('class' => 'col-sm-2 control-label')); ?>
 					<div class="col-sm-10">
 						<?php echo form_input('email','', 'class="form-control" id="register_email" placeholder="Email" required'); ?>
 					</div>
 				</div>

 				<div class="form-group">
 					<?php echo form_label('Password', 'register_password', array('class' => 'col-sm-2 control-label')); ?>
 					<div class="col-sm-10">
 						<?php echo form_password('password','', 'class="form-control" id="register_password" placeholder="Password" required'); ?>
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