<?php 
	# Load assets
	require_once 'config/config.php';
	require_once 'helpers/url.php';
	require_once 'helpers/Seeder.php';

	# Autoload
	spl_autoload_register(function($className){
		require_once 'assets/' . $className . '.php';
	
		
	}); 
	


	?>