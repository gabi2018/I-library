<?php 
	class Controller{
		
		# Load model
		public function model($model){
			require_once '../app/models/' . $model . '.php';
			return new $model();
		}

		# Load view
		public function view($view, $param = []){
			if (file_exists('../app/views/' . $view . '.php')){
				require_once '../app/views/' . $view . '.php';
			}
			else{
				#require_once '../app/views/modules/404/index.html';
				die('ERROR');
			}
		}

		public static function authenticated(){
			session_start();
			if (!isset($_SESSION['user'])){
			    return false;
			}
			else{
				return true;
			}
		}

		# Delete possible injections 
		public static function deleteSpecialChars($param, $type){		
			switch ($type) {
				case 'email':
					$filter = FILTER_SANITIZE_EMAIL;
					break;
				case 'int':
					$filter = FILTER_SANITIZE_NUMBER_INT;
					break;
				case 'float':
					$filter = FILTER_SANITIZE_NUMBER_FLOAT;
					break;
				case 'char':
					$filter = FILTER_SANITIZE_SPECIAL_CHARS;
					break;
			}
			return filter_var(htmlspecialchars(trim($param)), $filter);
		}
	}
?>