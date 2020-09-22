<table>
	<tr>
		<th>Tipo</th>
		<th>Editar</th>
	</tr>
	<?php 
		$authortypes = $param['authortypes'];
		foreach ($authortypes as $authortype) :
	?>
	<tr>
		<td><?php echo $authortype->author_type_identifier; ?></td>
		<td><a href="<?php echo URL_ROUTE ?>AuthorTypes/edit/<?php echo $authortype->ahutor_type_id ?>">Edit</a></td>
	</tr>
	<?php endforeach; ?>
</table>

<a href="<?php echo URL_ROUTE ?>AhutorTypes/create">Agregar nuevo tipo de usuario</a>