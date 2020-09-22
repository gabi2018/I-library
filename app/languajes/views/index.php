<table>
	<tr>
		<th>idioma</th>
		<th>Editar</th>
	</tr>
	<?php 
		$languajes = $param['languaje'];
		foreach ($languajes as $languaje) :
	?>
	<tr>
		<td><?php echo $languaje->languaje_desc ?></td>
		<td><a href="<?php echo URL_ROUTE ?>languajes/edit/<?php echo $languaje->languaje_id ?>">Edit</a></td>
	</tr>
	<?php endforeach; ?>
</table>

<a href="<?php echo URL_ROUTE ?>languajes/create">Agregar nuevo idioma</a>