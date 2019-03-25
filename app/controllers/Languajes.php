<?php 
	class Languajes extends Controller{
		 
		private $languajeModel;
		public function __construct(){
			 $this->languajeModel = $this->model('languaje');
			 
		}
		public function index(){
			$languaje=$this->languajeModel->getLanguajes();
				
				$param=[
					'languaje' => $languaje,
				];
				$this->view('languajes/index',$param);
		}
		public function create(){
			$this->view('languajes/create');
		}
		public function store(){
			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register-languaje'])){
				if(!empty($_POST['languaje_desc'])){
					$param = [
						'languaje_desc' 	=> trim($_POST['languaje_desc']),
						
					];
				
					if($this->languajeModel->languajeRecord($param)){
					redirect('languajes/index.php');		
						echo 'guardado con exito';		
					}	
				}
			    else{
					
					echo 'error';
				}
			}
		}
		public function show(){
		}
		public function update(){
				if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['languaje-update'])){
					if(!empty($_POST['languaje_desc'])&&!empty($_POST['languaje-id'])){
						$param = [
							'languaje-id' => trim($_POST['languaje-id']),
							'languaje_desc' => trim($_POST['languaje_desc']),
						];
							if ($this->languajeModel->editLanguaje($param)) {
								redirect('languajes/index');
							}
							else{
								die("FATAL ERROR");
							}
					}
					else{
					echo 'eror puto no guardes vacio';
					}		
				}
		}
		
		public function edit($id){
			$languaje = $this->languajeModel->getlanguaje($id); 
			$param = ['languaje' => $languaje,];
			$this->view('languajes/edit', $param);
		}
		public function delete(){
		}
	}	
	
?>