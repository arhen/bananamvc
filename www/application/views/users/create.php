	<h1>Create User page</h1><hr/>
	<form method="POST" action="<?php echo URL;?>users/create">
		<div>
			<input type="text" name="username" placeholder="Your Username" required>
		</div>
		<div>
			<input type="password" id="pass" name="password" placeholder="Password" required>
		</div>
		<div>
			<input type="password" id="re-pass" placeholder="Re-Password" required>
			<label id="valid"></label><br/>
		</div>
		<div>
			<select name="role">
				<option value="default">Default</optioDn>
				<option value="owner">Owner</optioDn>
				<option value="Admin">Admin</optioDn>SA
			</select>
		</div>
		<input type="submit" ID="submit" name="submit" value="submit">
	</form>
<br/>
</div>