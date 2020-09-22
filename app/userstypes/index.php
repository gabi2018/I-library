<table>
	<tr>
		<th>Tipo</th>
		<th>Editar</th>
	</tr>
	<?php 
		$usertypes = $param['usertypes'];
		foreach ($usertypes as $usertype) :
	?>
	<tr>
		<td><?php echo $usertype->user_type_desc; ?></td>
		<td><a href="<?php echo URL_ROUTE ?>userTypes/edit/<?php echo $usertype->user_type_id ?>">Edit</a></td>
	</tr>
	<?php endforeach; ?>
</table>

<a href="<?php echo URL_ROUTE ?>userTypes/create">Agregar nuevo tipo de usuario</a>