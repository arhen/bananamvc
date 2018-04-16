<!DOCTYPE html>
<html>
<head>
	<title><?=(isset($this->title)) ? $this->title : 'Simple MVC'; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/login.css">
	<script type="text/javascript" src="<?php echo URL;?>public/js/jquery.min.js"></script>
</head>
<body>
	<div id="container">
		<div id="form-login">
			<h1>Login Page</h2>
			<div id="form-login-panel">
				<form method="POST" action="<?php echo URL;?>login/run">   
					<label><?=(isset($this->msg)) ? $this->msg : ''; ?></label></br>
					<label>Username</label><input type="text" name="username" placeholder="Username"><br/>
					<label>Password</label><input type="password" name="password" placeholder="Password">
					<input type="submit" class="login" name="submit" value="Submit"> 
				</form>
			</div>
			<a href="<?php echo URL;?>">&larr; Back to home</a>
		</div>
	</div>
	
</body>
</html>
