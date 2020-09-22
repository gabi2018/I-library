<table>
	<tr>
		<th>codigo</th>
        <th>nombre</th>
	</tr>
	<?php 
		$subjets = $param['subjet'];
		foreach ($subjets as $subjet) :
	?>
	<tr>
		<td><?php echo $subjet->subjet_id; ?></td>
        <td><?php echo $subjet->subjet_name; ?></td>
       
		<td><a href="<?php echo URL_ROUTE ?>subjets/edit/<?php echo $subjet->subjet_id ?>">Edit</a></td>
	</tr>
	<?php endforeach; ?>
</table>

<a href="<?php echo URL_ROUTE ?>subjets/create">Agregar nueva materia </a>