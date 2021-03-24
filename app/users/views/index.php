<?php require_once "banner.php"?>
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
		foreach ($users as $user){require "partner.php"; }
	?> 
</div>

<div class="col-12 mt-4" id="search_result_user" style="display: none;"></div>
<script type="text/javascript" src="<?php echo URL_ROUTE;?>js/users.js"></script>