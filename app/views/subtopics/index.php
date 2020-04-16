<table>
	<tr>
		<th>Nombre</th>
		<th>Editar</th>
	</tr>
	<?php 
		$subtopics = $param['subtopics'];
		foreach ($subtopics as $subtopic) :
	?>
	<tr>
		<td><?php echo $subtopic->subtopic_name; ?></td>
        <td><?php echo $subtopic->category_name; ?></td>
		<td><a href="<?php echo URL_ROUTE ?>subtopics/edit/<?php echo $topic->topic_id ?>">Edit</a></td>
	</tr>
	<?php endforeach; ?>
</table>

<a href="<?php echo URL_ROUTE ?>subtopics/create">Agregar nuevo Tema</a>