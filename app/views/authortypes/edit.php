<?php $authortype =  $param['authortype']; ?>
<form method="post" action="<?php echo URL_ROUTE ?>AuthorTypes/update" target="_top">
	<input type="text" name="authortype-identifier" placeholder="Tipo de author" value="<?php echo $authortype->author_type_identifier; ?>">
	<input type="hidden" name="authortype-id" value="<?php echo $authortype->author_type_id; ?>">
	<button type="submit" name="authortype-update">Guardar</button>
</form>