<table>
	<tr>
		<th>Nombre escuela</th>
		<th></th>
	</tr>
	<?php 
		$schools = $param['school'];
		foreach ($schools as $school) :
	?>
	<tr>
		<td><?php echo $school->school_name; ?></td>
		<td><a href="<?php echo URL_ROUTE ?>schools/edit/<?php echo $school->school_id ?>">Edit</a></td>
	</tr>
	<?php endforeach; ?>
</table>

<a href="<?php echo URL_ROUTE ?>schools/create">Agregar nueva Categoria</a>