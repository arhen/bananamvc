<hr/>
<div id="footer">
	(C) footer <br/>
</div>

<!-- Javascript Plugin -->
<script type="text/javascript" src="<?php echo URL;?>public/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo URL;?>public/js/jquery-ui.min.js"></script>
<?php if (isset($this->js)) {
	foreach ($this->js as $js) {
		echo '
		<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>
		';
	}
} ?>
</body>
</html>