
<?php  
	require_once APP_ROUTE.'\main\views\home.php';  
?>

<div class="row mt-3 justify-content-around">
	<div class="col-8">
		<div class="row alert alert-primary mb-4sssssss">
			<div class="col-8 mt-2">
				<h3 class="mb-4">Hola <strong><?php echo $_SESSION['username']?></strong>!</h3>
				<p>Bienvenido a tu administrador de biblioteca universitaria. Aquí podrás ver tus libros en circulación y la situación de tus socios.</p>
			</div> 
			<div class="col-4 img-banner" id="main-img"></div>
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
	<div class="col-3" id="main-news">
		<p class="mt-3"><strong>Ultimas novedades</strong></p>  
		<div class="alert alert-info" role="alert">  
			<div class="row justify-content-between">
				<div class="col-1">
					<span class="material-icons"style="font-size: 40px;">books</span>
				</div>
				<div class="col-10">
					<span>+500 Libros</span>
					<p><small><span class="material-icons" style="font-size: 11px;"> person</span> Ignacio Morinigo - <span class="material-icons" style="font-size: 11px;">schedule</span> 4 hs</small></p>
				</div> 
			</div> 
		</div>
		<hr>
		<div class="alert alert-success" role="alert">
			<div class="row justify-content-between">
				<div class="col-1">
					<i class="material-icons" style="font-size: 40px;">people</i>
				</div>
				<div class="col-10">
					<span>+500 Libros</span>
					<p><small><span class="material-icons" style="font-size: 11px;"> person</span> Ignacio Morinigo - <span class="material-icons" style="font-size: 11px;">schedule</span> 4 hs</small></p>
				</div>
			</div>
		</div>
		<hr>
		<div class="alert alert-secondary" role="alert">
			<div class="row">
				<div class="col-2">
					<i class="material-icons" style="font-size: 40px;">assignment_return</i>
				</div>
				<div class="col-10">
					<span>+500 Libros</span>
					<p><small><span class="material-icons" style="font-size: 11px;"> person</span> Ignacio Morinigo - <span class="material-icons" style="font-size: 11px;">schedule</span> 4 hs</small></p>
				</div>
			</div>
		</div>
		<hr>
		<div class="alert alert-warning" role="alert">
			<div class="row">
				<div class="col-2">
					<i class="material-icons" style="font-size: 40px;">warning</i>
				</div>
				<div class="col-10">
					<span>+500 Libros</span>
					<p><small><span class="material-icons" style="font-size: 11px;"> person</span> Ignacio Morinigo - <span class="material-icons" style="font-size: 11px;">schedule</span> 4 hs</small></p>
				</div>
			</div>
		</div>
		<hr>
		<div class="alert alert-danger" role="alert">
			<div class="row">
				<div class="col-2">
					<i class="material-icons" style="font-size: 40px;">error</i>
				</div>
				<div class="col-10">
					<span>+500 Libros</span>
					<p><small><span class="material-icons" style="font-size: 11px;"> person</span> Ignacio Morinigo - <span class="material-icons" style="font-size: 11px;">schedule</span> 4 hs</small></p>
				</div>
			</div>
		</div>
	</div>
</div>
>>>>>>> 65f954655cfcb23374bc167d7a4033d032263cfe
