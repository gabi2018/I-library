<?php require_once APP_ROUTE . '/views/modules/header.php'; ?>

<div class="row mt-4" bgcolor="#edf3ff">
	<div class="col-12 text-center mt-5">
		<h2>I-Library</h2>
		<h4>Administración de Biblioteca Universitaria</h4>
		<p>Version 2.0</p>
	</div>
	<div class="col-8 mt-5 mx-auto""> 
		<form>
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Buscador">
				<div class="input-group-append">
					<span class="input-group-text material-icons">search</span>
				</div>
			</div>
		</form>
	</div>

	<div class="col-12 row tiles justify-content-around">
		<div class="col-3">
			<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="card bg-dark text-white">
							<img src="<?php echo URL_ROUTE ?>/media/images/color1.png" class="card-img" alt="...">
							<div class="card-img-overlay justify-content-around">
								<p class="card-text material-icons text-center" style="font-size: 90px">person</p>
								<p class="card-text text-center">Last updated 3 mins ago</p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="card bg-dark text-white">
							<img src="<?php echo URL_ROUTE ?>/media/images/color2.png" class="card-img" alt="...">
							<div class="card-img-overlay justify-content-around">
								<p class="card-text material-icons text-center" style="font-size: 90px">person</p>
								<p class="card-text text-center">Last updated 3 mins ago</p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="card bg-dark text-white">
							<img src="<?php echo URL_ROUTE ?>/media/images/color3.png" class="card-img" alt="...">
							<div class="card-img-overlay justify-content-around">
								<p class="card-text material-icons text-center" style="font-size: 90px">person</p>
								<p class="card-text text-center">Last updated 3 mins ago</p>
							</div>
						</div>
					</div>
				</div> 
			</div>
		</div>
		<div class="col-3">
			<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="card bg-dark text-white">
							<img src="<?php echo URL_ROUTE ?>/media/images/color4.png" class="card-img" alt="...">
							<div class="card-img-overlay justify-content-around">
								<p class="card-text material-icons text-center" style="font-size: 90px">book</p>
								<p class="card-text text-center">Last updated 3 mins ago</p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="card bg-dark text-white">
							<img src="<?php echo URL_ROUTE ?>/media/images/color5.png" class="card-img" alt="...">
							<div class="card-img-overlay justify-content-around">
								<p class="card-text material-icons text-center" style="font-size: 90px">book</p>
								<p class="card-text text-center">Last updated 3 mins ago</p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="card bg-dark text-white">
							<img src="<?php echo URL_ROUTE ?>/media/images/color6.png" class="card-img" alt="...">
							<div class="card-img-overlay justify-content-around">
								<p class="card-text material-icons text-center" style="font-size: 90px">book</p>
								<p class="card-text text-center">Last updated 3 mins ago</p>
							</div>
						</div>
					</div>
				</div> 
			</div>
		</div>
		<div class="col-3">
			<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="card bg-dark text-white">
							<img src="<?php echo URL_ROUTE ?>/media/images/color7.png" class="card-img" alt="...">
							<div class="card-img-overlay justify-content-around">
								<p class="card-text material-icons text-center" style="font-size: 90px">assignment_return</p>
								<p class="card-text text-center">Last updated 3 mins ago</p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="card bg-dark text-white">
							<img src="<?php echo URL_ROUTE ?>/media/images/color8.png" class="card-img" alt="...">
							<div class="card-img-overlay justify-content-around">
								<p class="card-text material-icons text-center" style="font-size: 90px">assignment_return</p>
								<p class="card-text text-center">Last updated 3 mins ago</p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="card bg-dark text-white">
							<img src="<?php echo URL_ROUTE ?>/media/images/color9.png" class="card-img" alt="...">
							<div class="card-img-overlay justify-content-around">
								<p class="card-text material-icons text-center" style="font-size: 90px">assignment_return</p>
								<p class="card-text text-center">Last updated 3 mins ago</p>
							</div>
						</div>
					</div>
				</div> 
			</div>
		</div>
	
	</div>
</div>
<?php require_once APP_ROUTE . '/views/modules/footer.php'; ?>