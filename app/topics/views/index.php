<table>
	<tr>
		<th>Nombre</th>
		<th>Editar</th>
	</tr>
	<?php 
		$topics = $param['topics'];
		foreach ($topics as $topic) :
	?>
	<tr>
		<td><?php echo $topic->topic_desc; ?></td>
		<td><a href="<?php echo URL_ROUTE ?>topics/edit/<?php echo $topic->topic_id ?>">Edit</a></td>
	</tr>
	<?php endforeach; ?>
</table>

<a href="<?php echo URL_ROUTE ?>topics/create">Agregar Temas</a>