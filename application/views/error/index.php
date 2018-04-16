<!DOCTYPE html>
<html>
<head>
	<title><?=(isset($this->title)) ? $this->title : 'Simple MVC'; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/error.css">
</head>
<body>
	<div id="error">
		<h1>404</h1>
		<small>ERROR</small>
	</div>
	<br>
	<hr>
	<p>This Page Doesn't Exist!</p>
</body>
</html>
