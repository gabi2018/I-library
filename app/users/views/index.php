 <div class="mt-3 col-12 row alert alert-primary mb-4"> 
	<div class="col-8 mt-2">
		<h3 class="mb-4">Administra los <strong>socios</strong>!</h3>
		<p>Importa o registra nuevos socios, deshabilita o actualiza su informacion .</p>
	</div>
	<div class="col-4 img-banner" id="users-img"></div>
</div> 

<div class="col-12 row">
	<div class="col-6">
		<a href=""><span class="material-icons">filter_list</span></a>
		<a href=""><span class="material-icons">sort</span></a>
		<a href=""><span class="material-icons">swap_vert</span></a> 
		<a href=""><span class="material-icons">view_module</span></a>
		<a href=""><span class="material-icons">view_list</span></a>
	</div>
	<div class="col-6">
		<?php require_once "search.php"?>
	</div>
</div>

<div class="col-12 mt-4">
	<?php require_once "partner.php"?>
</div>

 
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