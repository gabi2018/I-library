<table>
	<tr>
		<th>Nombre</th>
        <th>Apellido</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Email</th>  
        <th>Tipo</th>
		<th>Editar</th>
	</tr>
	<?php 
		$users = $param['users'];
		foreach ($users as $user) :
	?>
	<tr>
		<td><?php echo $user->user_name; ?></td>
        <td><?php echo $user->user_lastname; ?></td>
        <td><?php echo $user->user_address; ?></td>
        <td><?php echo $user->user_phone; ?></td>
        <td><?php echo $user->user_email; ?></td> 
        <td><?php echo $user->user_type_desc; ?></td>
		<td><a href="<?php echo URL_ROUTE ?>users/edit/<?php echo $user->user_id ?>">Edit</a></td>
	</tr>
	<?php endforeach; ?>
</table>

<a href="<?php echo URL_ROUTE ?>users/create">Agregar nuevo usuario</a> 
