<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<table class="table">
	<tr>
		<th>Nombre</th>
        <th>Apellido</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Email</th>  
        <th>Tipo</th>
		<th>Editar</th>
		<th>Deshactivar</th>
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
		<td><a href="<?php echo URL_ROUTE  ?>users/edit/<?php echo $user->user_dni ?>" class="btn btn-info"> Edit</a></td>
		<td><a href="<?php echo URL_ROUTE ?>users/disable/<?php echo $user->user_dni ?>" class="btn btn-danger">
		<?php echo($user->user_defaulter)?'Disable':'Enable' ; ?>
		</a></td>

	</tr>
	<?php endforeach; ?>
</table>

<a href="<?php echo URL_ROUTE ?>users/create" class="btn btn-success">Agregar nuevo usuario</a> 


<div class="form-group">
  <label for="usr">Buscar</label>
  <input type="text" class="form-control" id="search-user" name="user" require data-url="<?php echo URL_ROUTE?>/users/search" placeholder="Ingresa datos a buscar:">
</div>