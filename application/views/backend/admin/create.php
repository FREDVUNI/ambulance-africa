<div class="content-wrapper" style="min-height:540.031px">
	<div class="content-header">
		<div class="container-fluid">
			<section class="content">
				<div class="card card-earnings">
					<div class="p-2 card">
						<form class="user" id="validate" method="post" novalidate="novalidate"
							action="<?php echo base_url('admin');?>">
							<div class="form-group">
								<label htmlFor="username">Username</label>
								<input type="text"
									class="form-control form-control-user <?php if(form_error('username')): echo "is-invalid"; endif;?>"
									id="username" name="username" required placeholder="Enter username"
									value="<?php echo set_value('username');?>" />
								<span class="is-invalid"><?php echo form_error('username');?></span>
							</div>
							<div class="form-group">
								<label htmlFor="email">Email</label>
								<input type="email"
									class="form-control form-control-user <?php if(form_error('email')): echo "is-invalid"; endif;?>"
									id="email" name="email" required placeholder="Enter email address"
									value="<?php echo set_value('email');?>" />
								<span class="is-invalid"><?php echo form_error('email');?></span>
							</div>
							<div class="form-group">
								<label htmlFor="role">Role</label>
								<select class="form-control" name="role">
									<option value="">choose admin role</option>
									<option value="admin">admin</option>
									<option value="user">user</option>
								</select>
								<span class="is-invalid"><?php echo form_error('role');?></span>
							</div>
							<div class="form-group">
								<label htmlFor="password">Password</label>
								<input type="password"
									class="form-control form-control-user <?php if(form_error('password')): echo "is-invalid"; endif;?>"
									id="password" name="password" required placeholder="Enter password"
									value="<?php echo set_value('password');?>" />
								<span class="text-danger"><?php echo form_error('password');?></span>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-success btn-sm">
									create
								</button>
							</div>
						</form>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<script src="<?php echo base_url("assets/backend/plugins/jquery/jquery.min.js");?>"></script>
<script src="<?php echo base_url("assets/backend/plugins/jquery/jquery.validate.min.js");?>"></script>
<script src="<?php echo base_url("assets/backend/plugins/jquery/additional-methods.min.js");?>"></script>
<script>
	$('#validate').validate({
		rules: {
			role: {
				required: true,
			},
			password: {
				required: true,
			},
			username: {
				required: true,
			},
			email: {
				required: true,
				email: true
			},

		},
		messages: {
			username: {
				required: "The username field is required",
			},
			role: {
				required: "The role field is required",
			},
			email: {
				required: "The email field is required",
				email: "The email is invalid"
			},
			password: {
				required: "The password field is required",
			},
		},
		errorElement: 'span',
		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		}
	});

</script>
