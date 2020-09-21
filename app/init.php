<?php 
	# Load assets
	require_once 'core/config/config.php';
	require_once 'core/helpers/url.php';
	require_once 'core/helpers/Seeder.php';

	# Autoload
	spl_autoload_register(function($className){
		require_once 'core/assets/' . $className . '.php';
	}); 	
?>