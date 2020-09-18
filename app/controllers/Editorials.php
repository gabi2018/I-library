<?php
	class Editorials extends Controller{
		private	$editorialModel;
		
		# Conectar con el model  editorial
		public function __construct(){
			$this->editorialModel = $this->model('Editorial');
		}

		public function index(){ 
			$editorial = $this->editorialModel->getEditorials();

			$param = [ 'editorial' => $editorial];
			$this->view('editorials/index',$param);
		}

		#Llamar vista de editorial S
		public function create(){
			$this->view('editorials/create');
		}
 
		# Almacenar editorial
		public function store(){
			if(!empty($_POST['editorial_name']) && !empty($_POST['editorial_address'])){
				$param = [
					'editorial-name' 	=> trim($_POST['editorial_name']),
					'editorial-address' => trim($_POST['editorial_address']),			
				];

				$id = $this->editorialModel->addEditorial($param);
				if($id != null){ 
					echo $id;		
				}	
			} 
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
					echo 'error';
				}
			}
		}

		public function show(){
			$this->view('editorials/show');
		}

		public function search(){
			if(isset($_POST['search'])){
				$param     = ['editorial' => trim($_POST['search'])];
				$editorial = $this->editorialModel->getEditorialName($param);

				foreach ($editorial as $key => $value) {
					echo "<li class='option'><span>$value</span><input type='hidden' value=$key name='editorial-id'></li>";
				}   
			}
		}
	}
?>