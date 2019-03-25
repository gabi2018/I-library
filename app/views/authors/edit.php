<?php $author =  $param['author']; ?>
<form method="post" action="<?php echo URL_ROUTE ?>authors/update" target="_top">
	<input type="text" name="author-name" placeholder="Nombre del Autor" value="<?php echo $author->author_name; ?>">

	<input type="text" name="author-lastname" placeholder="Apellido del Autor" value="<?php echo $author->author_lastname; ?>">
	<input type="hidden" name="author-id" value="<?php echo $author->author_id; ?>">
	<button type="submit" name="author-update">Guardar</button>
</form>