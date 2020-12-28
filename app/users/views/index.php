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
		<a href="javascript:void(0)" data-filter=".card" id="card" class="view-type" ><span class="material-icons">view_module</span></a>
		<a href="javascript:void(0)" data-filter=".list" id="list" class="view-type"style="display: none;"><span class="material-icons">view_list</span></a>
	</div>
	<div class="col-6">
		<?php require_once "search.php"?>
	</div>
</div>

<div class="col-12 mt-4 row" id="user_list">
	<?php 
		$users = $param['users']; 
		foreach ($users as $user){ require "partner.php"; }
	?> 
</div>

<div class="col-12 mt-4" id="search_result_user" style="display: none;"></div>