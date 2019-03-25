<?php
		class Editorials extends Controller{
	private	$editorialModel;
#conectar con el model  editorial
		public function __construct(){
			 $this->editorialModel = $this->model('Editorial');
			session_start(); 
		}

#llamar vista de editorial S
		public function create(){

			$this->view('editorials/create');
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
					redirect('editorials/index.php');		
						echo 'guardado con exito';		
					}	
				}
			    else{
					
					echo 'error';
				}
			}
		
		}

		public function index(){
				
				$editorial=$this->editorialModel->getEditorials();
				
				$param=[
					'editorial' => $editorial,
				];
				$this->view('editorials/index',$param);
		}


		

public function edit($id){
			$editorial = $this->editorialModel->getEditorial($id);
			$param = [
				'editorial' => $editorial,
			];
			$this->view('editorials/edit', $param);
		}




		public function update(){
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['editorial-update'])){
				if (!empty($_POST['editorial-id'])&&!empty($_POST['editorial-name'])&&!empty($_POST['editorial-address'])) {
					$param = [
						'editorial-id'	  => trim($_POST['editorial-id']),
						'editorial-name' => trim($_POST['editorial-name']),
						'editorial-address' => trim($_POST['editorial-address']),

					];

					if($this->editorialModel->editEditorial($param)){
						redirect('editorials/index');
					}
					else{
						die("FATAL ERROR");
					}

				}

				else{

					echo 'error puto no guardes vacio';
				}
			}
		}
}
?>