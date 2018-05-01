<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$activeLink = (isset($activeLink)) ? $activeLink :  "";?>

<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">


	<a class="navbar-brand" href="<?php echo base_url();?>"><img id="logo-menu" src="<?php echo base_url() ?>assets/images/logo-img/logo.png" alt=""></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" 
	aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse menu navbar-right" id="navbarsExampleDefault">
	<ul class="navbar-nav ml-auto ">
		<li class="nav-item <?php echo ($activeLink=='items'?'active':'');?>">
			<a class="nav-link" href="<?php echo base_url();?>items">Items</a>
		</li>     
		<div class="nav-link navbar dropdown <?php echo ($activeLink=='others'?'active':'');?> ">
			<li class="nav-item dropdown-toggle " data-toggle="dropdown">
				Setting  
				<li class="nav-item dropdown-menu">
					<a class="dropdown-item" href="<?php echo base_url();?>category">Categories</a>
					<a class="dropdown-item" href="<?php echo base_url();?>materials">Materials</a>
					<a class="dropdown-item" href="<?php echo base_url();?>departments">Departments</a>
					<a class="dropdown-item" href="<?php echo base_url();?>brand">Brands</a>
					<a class="dropdown-item" href="<?php echo base_url();?>location">Locations</a>
					<a class="dropdown-item" href="<?php echo base_url();?>models">Models</a>
					<a class="dropdown-item" href="<?php echo base_url();?>owner">Owners</a>
					<a class="dropdown-item" href="<?php echo base_url();?>report">Reports</a>
					<a class="dropdown-item" href="<?php echo base_url();?>users">Admin</a>
				</li>
			</li>
		</div>
		<?php if($this->session->loggedIn === TRUE) { ?>
		<!-- <div class="navbar-collapse collapse navbar-right"> -->
			<!--   <ul class="navbar-nav ml-auto"> -->
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>connection/logout">
						<?php echo $this->session->fullname;?> <i class="mdi mdi-power"></i>
					</a>
				</li>
			</ul>
		</div>
		<?php } ?>
	</nav>
<br>


