	<h1>Create Notes</h1><hr/>
	<form method="POST" action="<?php echo URL;?>notes/create">
		<div>
			<input type="text" name="title" placeholder="Your Title" required>
		</div>
		<div>
			<textarea name="content"></textarea>
		</div>
		<input type="submit" ID="submit" name="submit" value="submit">
	</form>
<br/>
</div>