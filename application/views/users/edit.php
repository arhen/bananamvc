	<h1>Edit User page</h1><hr/>
	<?php foreach ($this->user as $key => $value): ?>
		<form method="POST" action="<?php echo URL;?>users/editSave/<?php echo $value['userId'];  ?>">
			<div>
			<input type="text" name="username" value="<?php echo $value['username'];  ?>" required>
			</div>
			<div>
			<input type="password" id="pass" name="password" value="<?php echo $value['password'];  ?>" required>
			</div>
			<div>
				<select name="role">
				<option value="default" <?php if ($value['role'] == 'default') echo "selected"; ?>>Default</optioDn>
				<option value="owner" <?php if ($value['role'] == 'owner') echo "selected"; ?>>Owner</optioDn>
				<option value="Admin" <?php if ($value['role'] == 'admin') echo "selected"; ?>>Admin</optioDn>SA
							</select>
						</div>
					<?php endforeach ?>
					<input type="submit" id="submit" name="submit" value="submit">
				</form>
				<br/>
			</div>