	<h1>Form Validating</h1><hr/>
	<?=(isset($this->msg)) ? $this->msg : '';?>
	<form action="<?php echo URL;?>form/addData" method="POST">
		<input type="text" name="name" placeholder="Name">
		<input type="text" name="age" placeholder="Age">
		<select name="gender" id="gender">
			<option value="Male">Male</option>
			<option value="Female">Female</option>
		</select>
		<input type="submit" name="submit" value="submit">
	</form>
<br/>
	<table>
		<tr>
			<td>Id</td>
			<td>Name</td>
			<td>Age</td>
			<td>Gender</td>
		</tr>
	<?php
		foreach ($this->listData as $key => $value) {
			echo '<tr>';
			echo '<td>' . $value['personId'] . '</td>';
			echo '<td>' . $value['name'] . '</td>';
			echo '<td>' . $value['age'] . '</td>';
			echo '<td>' . $value['gender'] . '</td>';
			echo '</tr>';
		}
		// print_r($this->listData); 
	?>
	</table>
</div>