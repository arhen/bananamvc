<!DOCTYPE html>
<html>
<head>
	<title><?=(isset($this->title)) ? $this->title : 'Simple MVC'; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/default.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/jquery-ui.css">
</head>
<body>
	<?php Session::init(); ?>
	<div id="header">
		<div class="navbar">
			<ul>
				<?php if(Session::get('loggedIn') == FALSE): ?>
					<li ><a href="<?php echo URL;?>">Index</a></li>
					<li ><a href="<?php echo URL;?>help">Help</a></li>
				<?php endif; ?>
				<?php if(Session::get('loggedIn') == TRUE): ?>
					<li><a href="<?php echo URL;?>dashboard"">Dashboard</a></li>
					<?php if(Session::get('role') == 'owner'): ?>
						<li><a href="<?php echo URL;?>users"" >Users</a></li>
						<li><a href="<?php echo URL;?>notes"" >Notes</a></li>
						<li><a href="<?php echo URL;?>form"" >Form</a></li>
					<?php endif; ?>
					<li class="dropdown">
						<a href="<?php echo URL;?>fsettings" class="dropbtn">Settings</a>
						<div class="dropdown-content">
							<a href="<?php echo URL;?>dashboard/logout">Logout</a>
						</div>
					</li>
				<?php else: ?>
					<li ><a href="<?php echo URL;?>login">login</a></li>
					<li ><a href="<?php echo URL;?>register">register</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
	<hr/>
	<div id="content">
