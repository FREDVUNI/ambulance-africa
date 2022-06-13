<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ambulance Africa</title>
	<link rel="shortcut icon" href="<?php echo base_url("assets/backend/images/amblogo.ico");?>" type="image/x-icon">
	<link rel="stylesheet" href="<?php echo base_url("assets/backend/plugins/fontawesome-free/css/all.min.css");?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/backend/dist/css/adminlte.css");?>">
	<link href="<?php echo base_url("assets/backend/style.css");?>" rel="stylesheet">
</head>

<body class="bg-img-hero-fixed" style="background-image:
	url(<?php echo base_url('assets/backend/images/error-404.svg');?>);">
	<header id="header" class="header header-bg-transparent header-abs-top py-3">
		<div class="header-section">
			<div id="logoAndNav" class="container">
				<nav class="navbar">
					<a class="navbar-brand" href="<?php echo base_url("dashboard");?>" aria-label="saber">
						<img src="<?php echo base_url('assets/backend/images/Logo.jpg')?>" alt="ambulance-africa Logo"
							width="250px" />
					</a>
				</nav>
			</div>
		</div>
	</header>
	<div class="container">
		<main id="content" role="main">
			<div class="d-lg-flex">
				<div class="container d-lg-flex align-items-lg-center min-vh-lg-100">
					<div class="w-lg-60 w-xl-50">
						<div class="mb-4">
							<img class="max-w-23rem mb-3"
								src="<?php echo base_url('assets/backend/images/error-number-404.svg');?>" alt="svg">
							<p class="h4 text-success">Oops! Looks like you followed a bad link <a
									class="font-primary text-muted" href="<?php echo base_url("dashboard");?>"><br />
									return to dashboard</a></p>
						</div>
					</div>
				</div>
			</div>
		</main>
		<footer class="position-absolute right-0 bottom-0 left-0">
			<div class="container">
				<div class="d-flex justify-content-between align-items-center space-1">
					<p class="text-muted mb-0">© Ambulance Africa <?php echo date('Y');?>.</p>
					<ul class="list-inline mb-0">
						<li class="list-inline-item">
							<a class="btn btn-lg btn-icon text-muted" href="https://www.facebook.com/ambulanceafrica/"
								target="_blank">
								<i class="fab fa-facebook-f"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a class="btn btn-lg btn-icon text-muted" href="https://www.facebook.com/ambulanceafrica/"
								target="_blank">
								<i class="fab fa-twitter"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</footer>
	</div>
</body>

</html>
