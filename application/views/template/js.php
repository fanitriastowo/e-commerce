<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.validate.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/additional-methods.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/bootstrap.min.js'); ?>"></script>

<?php if (!$this->ion_auth->is_admin()): ?>
<script type="text/javascript">
	$(document).ready(function(){

		// validate signup form on keyup and submit
		$("#registration_form").validate({
			rules: {
				first_name: "required",
				last_name: "required",
				password: {
					required: true,
					minlength: 3
				},
				confirm_password: {
					required: true,
					minlength: 3,
					equalTo: "#register_confirm_password"
				},
				email: {
					required: true,
					email: true
				},
				phone: {
					required: true,
					number : true
				},
				address: "required"
			},
			messages: {
				first_name: "Firstname harap diisi",
				last_name: "Lastname harap diisi",
				password: {
					required: "Password harap diisi",
					minlength: "minimal 3 karakter"
				},
				confirm_password: {
					required: "Confirm Password harap diisi",
					minlength: "minimal 3 karakter",
					equalTo: "Confirm Password tidak sama"
				},
				email: {
					required: "Email harap diisi",
					email: "Format email tidak valid"
				},
				phone: {
					required: "Nomor telepon harap diisi",
					number : "Input hanya berupa angka"
				},
				address: "Alamat harap diisi"
			},
			highlight : function(element) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			unhighlight : function(element) {
				$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			}
		});

		var totalProductsURL = '<?php echo site_url("user/pesan/total_products"); ?>';
		$.getJSON(totalProductsURL, function(data) {
			$('#cart').html(data);
		});
	});
</script>
<?php endif ?>