<table>
	<tr>
		<th>Nombre</th>
        <th>Apellido</th>
	</tr>
	<?php 
		$authors = $param['authors'];
		foreach ($authors as $author) :
	?>
	<tr>
		<td><?php echo $author->author_name; ?></td>
        <td><?php echo $author->author_lastname; ?></td>
		<td><a href="<?php echo URL_ROUTE ?>authors/edit/<?php echo $author->author_id ?>">Edit</a></td>
	</tr>
	<?php endforeach; ?>
</table>

<a href="<?php echo URL_ROUTE ?>authors/create">Agregar nuevo Autor</a>