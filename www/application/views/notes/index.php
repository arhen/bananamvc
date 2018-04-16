	<h1>Notes</h1><hr/>
	<form action="notes/addNote">
		<input type="submit" value="Create New Notes" />
	</form>

	<table>
		<tr>
			<td>No</td>
			<td>Title</td>
			<td>Content</td>
			<td>Date</td>
			<td>Action</td>
		</tr>
		<?php
		if (empty($this->noteList)) {
			echo "<tr>";
			echo "<td><p>No Data</p></td>";
			echo "</tr>";
		}else{	
			foreach ($this->noteList as $key => $value) {
				echo '<tr>';
				echo '<td>' . $value['noteId'] . '</td>';
				echo '<td>' . $value['title'] . '</td>';
				echo '<td>' . $value['content'] . '</td>';
				echo '<td>' . $value['date_added'] . '</td>';
				echo '<td>' . '<a href="'.URL.'notes/editNote/'.$value['noteId'].'">Edit</a> ';
				echo '<a class="delete" href="'.URL.'notes/delete/'.$value['noteId'].'">Delete</a></td>';
				echo '</tr>';
			}
		}
		// print_r($this->noteList	); 
		?>
	</table>
	<br/>
</div>