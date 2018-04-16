	<h1>Users</h1><hr/>
	<form action="users/addUser">
	   <input type="submit" value="Create New User" />
	</form>

	<table>
	<?php
		foreach ($this->userList as $key => $value) {
			echo '<tr>';
			echo '<td>' . $value['userId'] . '</td>';
			echo '<td>' . $value['username'] . '</td>';
			echo '<td>' . $value['role'] . '</td>';
			echo '<td>' . '<a href="'.URL.'users/editUser/'.$value['userId'].'">Edit</a> ';
							if ($value['role'] != Session::get('role')) {
								echo '<a href="'.URL.'users/delete/'.$value['userId'].'">Delete</a></td>';
							}
			echo '</tr>';
		}
		// print_r($this->userList); 
	?>
	</table>
<br/>
</div>