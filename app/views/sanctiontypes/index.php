<table>
	<tr>
		<th>Tipo</th>
		<th>Editar</th>
	</tr>
	<?php 
		$sanctiontypes = $param['sanctiontypes'];
		foreach ($sanctiontypes as $sanctiontype) :
	?>
	<tr>
		<td><?php echo $sanctiontype->sanction_type_measure; ?></td>
		<td><a href="<?php echo URL_ROUTE ?>sanctionTypes/edit/<?php echo $sanctiontype->sanction_type_id ?>">Edit</a></td>
	</tr>
	<?php endforeach; ?>
</table>

<a href="<?php echo URL_ROUTE ?>sanctionTypes/create">Agregar nuevo tipo de sancion</a>