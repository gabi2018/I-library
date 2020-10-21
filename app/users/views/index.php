<div class="row mt-3 justify-content-between">
	<div class="col-8 ml-3">
		<div class="row alert alert-primary mb-4">
			<div class="col-8 mt-2">
				<h3 class="mb-4">Administra los <strong>socios</strong>!</h3>
				<p>Importa o registra nuevos socios, deshabilita o actualiza su informacion .</p>
			</div> 
			<div class="col-4 img-banner" id="users-img"></div>
		</div>
		<h5>Estadistcas de uso</h5>
		<div class="col-12">
			<h6>Prestamos realizados</h6>
			<canvas id="statistics-loan"></canvas>
		</div>
		<div class="col-12">
			<h6>Temas populares</h6>
			<canvas id="statistics-book"></canvas>
		</div>
	</div> 
	<div class="col-3 mr-2" id="main-news">
		<p class="mt-3 "><strong>Ultimos estados</strong></p> 
		 
		<div class="alert alert-info" role="alert">
			<div class="row">
				<div class="col-3">
					<i class="material-icons" style="font-size: 50px;">books</i>
				</div>
				<div class="col-9">
					<span>Se agregaron 500 libros de ciencias y macumba</span>
					<p><small>Ignacio Morinigo - hace 4 horas</small></p>
				</div> 
			</div> 
		</div>
		<hr>
		<div class="alert alert-success" role="alert">
			<div class="row">
				<div class="col-2">
					<i class="material-icons" style="font-size: 50px;">people</i>
				</div>
				<div class="col-10">
					<span>Se agregaron 500 libros de ciencias y macumba</span>
					<p><small>Ignacio Morinigo - hace 4 horas</small></p>
				</div> 
			</div>
		</div>
		<hr>
		<div class="alert alert-secondary" role="alert">
			<div class="row">
				<div class="col-2">
					<i class="material-icons" style="font-size: 50px;">assignment_return</i>
				</div>
				<div class="col-10">
					<span>Se agregaron 500 libros de ciencias y macumba</span>
					<p><small>Ignacio Morinigo - hace 4 horas</small></p>
				</div> 
			</div>
		</div>
		<hr>
		<div class="alert alert-warning" role="alert">
			<div class="row">
				<div class="col-2">
					<i class="material-icons" style="font-size: 50px;">warning</i>
				</div>
				<div class="col-10">
					<span>Se agregaron 500 libros de ciencias y macumba</span>
					<p><small>Ignacio Morinigo - hace 4 horas</small></p>
				</div> 
			</div>
		</div>
		<hr>
		<div class="alert alert-danger" role="alert">
			<div class="row">
				<div class="col-2">
					<i class="material-icons" style="font-size: 50px;">error</i>
				</div>
				<div class="col-10">
					<span>Se agregaron 500 libros de ciencias y macumba</span>
					<p><small>Ignacio Morinigo - hace 4 horas</small></p>
				</div> 
			</div>
		</div>
	</div>
</div>
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
