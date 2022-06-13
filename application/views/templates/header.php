<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo "Ambulance Africa ". $title; ?></title>
	<link rel="shortcut icon" href="<?php echo base_url("assets/backend/images/amblogo.ico");?>" type="image/x-icon">
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="<?php echo base_url("assets/backend/plugins/fontawesome-free/css/all.min.css");?>">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url("assets/backend/plugins/select2/css/select2.min.css");?>">
	<link rel="stylesheet"
		href="<?php echo base_url("assets/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css");?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/backend/plugins/css/icheck-bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/backend/dist/css/dialog.css");?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/backend/dist/css/adminlte.css");?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/backend/plugins/css/OverlayScrollbars.min.css");?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/backend/plugins/css/daterangepicker.css");?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/backend/plugins/css/summernote-bs4.min.css");?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/backend/plugins/css/dataTables.bootstrap4.min.css");?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/backend/plugins/css/responsive.bootstrap4.min.css");?>">
	<link rel="stylesheet"
		href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
	<link href="<?php echo base_url('assets/backend/dist/css/vendor-morris.css');?>" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="<?php echo base_url("dashboard"); ?>" class="nav-link">Home</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="#" class="nav-link">Contact</a>
				</li>
			</ul>
			<form class="form-inline ml-3">
				<div class="input-group input-group-sm">
					<input class="form-control form-control-navbar" type="search" placeholder="Search"
						aria-label="Search" />
					<div class="input-group-append">
						<button class="btn btn-navbar" type="submit">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</form>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-bell mt-2"></i>
						<span class="badge badge-danger navbar-badge">3</span>
					</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link user-panel" data-toggle="dropdown" href="#">
						<img src="<?php echo base_url('assets/uploads/admins/'.$user['image'])?>" class="img-circle"
							alt="User" />
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<span class="dropdown-item">Settings</span>
						<div class="dropdown-divider"></div>
						<a href="<?php echo base_url("profile"); ?>" class="dropdown-item">
							<i class="fas fa-cog mr-2"></i> profile
						</a>
						<div class="dropdown-divider mt-2"></div>
						<a href="<?php echo base_url("logout"); ?>" class="dropdown-item">
							<i class="fas fa-power-off mr-2"></i> logout
						</a>
						<div class="dropdown-divider mt-2"></div>
					</div>
				</li>
			</ul>
		</nav>
