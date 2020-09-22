<?php $category =  $param['category']; ?>
<form method="post" action="<?php echo URL_ROUTE ?>categories/update" target="_top">
	<input type="text" name="category-name" placeholder="Nombre de Categoria" value="<?php echo $category->category_name; ?>">
	<input type="hidden" name="category-id" value="<?php echo $category->category_id; ?>">
	<button type="submit" name="category-update">Guardar</button>
</form>