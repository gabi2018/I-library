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
				if(!empty($_POST['editorial-name']) && !empty($_POST['editorial-address'])){
					$param = [
						'editorial-name' 	=> trim($_POST['editorial-name']),
						'editorial-address' 	=> trim($_POST['editorial-address']),
						
					];
				
					if($this->editorialModel->editorialRecord($param)){
					#redirect('editorial/create.php');		
						echo 'guardado con exito';		
					}	
				}
			    else{
					#redirect('app/views/editorial/create.php');
					echo 'error';
				}
			}
		
		}

		public function show(){
			if ($_POST['view']){
				$this->view('editorial/show');
				$editoriales=$this->editorialModel->getEditorialAll();
				
				$parama=[
					'editorial' => $editoriales;

				]
				$this->view('editorial/show',$param);
			}


		}


}
?>