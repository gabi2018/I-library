<table>
	<tr>
		<th>Nombre</th>
		<th>Editar</th>
	</tr>
	<?php 
		$sectors = $param['sectors'];
		foreach ($sectors as $sector) :
	?>
	<tr>
		<td><?php echo $sector->sector_desc; ?></td>
		<td><a href="<?php echo URL_ROUTE ?>sectors/edit/<?php echo $sector->sector_id ?>">Edit</a></td>
	</tr>
	<?php endforeach; ?>
</table>

<a href="<?php echo URL_ROUTE ?>sectors/create">Agregar nuevo sector</a>
