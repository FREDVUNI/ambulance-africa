<aside class="main-sidebar sidebar-dark-primary">
	<div class="text-center">
		<a href="<?php echo base_url("dashboard");?>" class="logo-image">
			<img src="<?php echo base_url('assets/backend/images/ambulance.jpg')?>" alt="Ambulance Africa"
				class="brand-image rounded-circle" />
		</a>
	</div>
	<div class="sidebar">
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?php echo base_url('assets/uploads/admins/'.$user['image'])?>" class="img-circle mt-2"
					alt="User" />
			</div>
			<div class="info mt-3">
				<a href="<?php echo base_url("profile"); ?>" class="d-block"><?php echo $user['username'];?></a>
			</div>
		</div>
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-header">DASHBOARD</li>
				<li class="nav-item">
					<a href="<?php echo base_url("dashboard"); ?>"
						class="nav-link  <?php echo (current_url() == base_url("dashboard"))?"active":"";?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url("certificates"); ?>"
						class="nav-link <?php echo (current_url() == base_url("certificates"))?"active":"";?>">
						<i class="nav-icon fas fa-certificate"></i>
						<p>
							Certificates
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url("fire-extinguishers"); ?>"
						class="nav-link <?php echo (current_url() == base_url("fire-extinguishers"))?"active":"";?>">
						<i class="nav-icon fas fa-fire-extinguisher"></i>
						<p>
							Fire Extinguishers
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url("admins"); ?>"
						class="nav-link <?php echo (current_url() == base_url("admins"))?"active":"";?>">
						<i class="nav-icon fas fa-user"></i>
						<p>
							Admins
						</p>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>
