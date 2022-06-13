<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ambulance Africa</title>
	<link rel="shortcut icon" href="<?php echo base_url("assets/backend/images/amblogo.ico");?>" type="image/x-icon">
	<link rel="stylesheet" href="<?php echo base_url("assets/backend/plugins/fontawesome-free/css/all.min.css");?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/backend/dist/css/adminlte.css");?>">
</head>

<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-5 col-lg-12 col-md-9">
				<div class="card o-hidden border-0 shadow-lg my-5 mx-auto col-md-10 col-sm-6">
					<div class="card-body p-0">
						<div class="row">
							<div class="col-lg-12">
								<div class="p-3">
									<div class="text-center">
										<span class="mb-3">
											<img src="<?php echo base_url('assets/backend/images/Logo.jpg')?>"
												alt="ambulance-africa Logo" width="250px" class="mb-5 mt-5" />
										</span>
										<h5 class="m-0 text-muted mb-5">SIGN IN</h5>
									</div>
									<?php echo $this->session->flashdata('message');?>
									<form class="user" id="validate" action="<?php echo base_url("login");?>"
										method="post" novalidate="novalidate">
										<div class="form-group">
											<input type="email"
												class="form-control form-control-user <?php if(form_error('email')): echo "is-invalid"; endif;?>"
												id="email" name="email" placeholder="Enter Email Address"
												value="<?php echo set_value('email');?>" autofocus>
											<span class="is-invalid"><?php echo form_error('email');?></span>
										</div>
										<div class="form-group">
											<input type="password"
												class="form-control form-control-user <?php if(form_error('password')): echo "is-invalid"; endif;?>"
												id="password" name="password" placeholder="Password"
												value="<?php echo set_value('password');?>" />
											<span class="is-invalid"><?php echo form_error('password');?></span>
										</div>
										<div class="form-group">
											<div class="custom-control custom-checkbox small">
												<input type="checkbox" class="custom-control-input" id="customCheck" />
												<label class="custom-control-label" for="customCheck">Remember
													me</label>
											</div>
										</div>
										<button type="submit" class="btn btn-success btn-user btn-block">
											LOGIN
										</button>
									</form>
									<hr />
									<div class="text-center">
										<a id="torecover" class="text-muted" href="<?php echo base_url("#");?>">
											Forgot password?
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url("assets/backend/plugins/jquery/jquery.min.js");?>"></script>
	<script src="<?php echo base_url("assets/backend/plugins/jquery/jquery.validate.min.js");?>"></script>
	<script src="<?php echo base_url("assets/backend/plugins/jquery/additional-methods.min.js");?>"></script>
	<script src="<?php echo base_url("assets/backend/plugins/jquery/scripts.js");?>"></script>
</body>

</html>
