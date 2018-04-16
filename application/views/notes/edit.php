	<h1>Edit Note</h1><hr/>
	<?php foreach ($this->noteList as $key => $value): ?>
		<form method="POST" action="<?php echo URL;?>notes/editSave/<?php echo $value['noteId'];  ?>">
			<div>
				<input type="text" name="title" value="<?php echo $value['title'];  ?>" required>
			</div>
			<div>
				<textarea name="content"><?php echo $value['content'];  ?></textarea>
			</div>
			<input type="submit" ID="submit" name="submit" value="submit">
		<?php endforeach ?>
	</form>
	<br/>
</div>