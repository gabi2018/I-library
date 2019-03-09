<?php
		class Editorials extends Controller{
	private	$editorialModel;
#conectar con el model  editorial
		public function __construct(){
			 $this->editorialModel = $this->model('Editorial');
			session_start(); 
		}

#llamar vista de editorial 
		public function viewEditorial(){

			$this->view('editorial/create');
		}
 # almacenar editorial
		public function store(){
			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
				if(isset($_POST['editorial-name']) && isset($_POST['editorial-address'])){
				$param = [
					'editorial-name' 	=> trim($_POST['editorial-name']),
					'editorial-address' 	=> trim($_POST['editorial-address']),
					
				];
				
					if($this->editorialModel->editorialRecord($param)){
						redirect('editorial/create.php');
						echo 'guardado con exito';
					}	
				}

			
				else{
					redirect('editorial/create.php');
					echo 'error';
				}

			}
		
		
	}
}
?>