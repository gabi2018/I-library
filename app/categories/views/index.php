<table>
	<tr>
		<th>Nombre</th>
		<th>Editar</th>
	</tr>
	<?php 
		$categories = $param['categories'];
		foreach ($categories as $category) :
	?>
	<tr>
		<td><?php echo $category->category_name; ?></td>
		<td><a href="<?php echo URL_ROUTE ?>categories/edit/<?php echo $category->category_id ?>">Edit</a></td>
	</tr>
	<?php endforeach; ?>
</table>

<a href="<?php echo URL_ROUTE ?>categories/create">Agregar nueva Categoria</a>