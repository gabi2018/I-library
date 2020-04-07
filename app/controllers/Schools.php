<?php
	class Schools extends Controller{
		private $schoolModel;
		public function __construct(){
				$this->schoolModel = $this->model('school');		
		}

		public function index(){
			$school = $this->schoolModel->getSchools();
			$param  = [ 'school' => $school ];
			$this->view('schools/index',$param);
		}

		public function create(){
			$this->view('schools/create');
		}

		public function store(){
			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register-school'])){
				if(!empty($_POST['school_name'])){
					$param = [
						'school_name' 	=> trim($_POST['school_name'])
					];
				
					if($this->schoolModel->schoolRecord($param)){
						redirect('schools/index.php');		
						echo 'guardado con exito';		
					}	
				}
				else{ 
					echo 'error';
				}
			}
		}

		public function show(){ }

		public function update(){
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['school-update'])){
				if(!empty($_POST['school_name'])&&!empty($_POST['school-id'])){
					$param = [
						'school-id' => trim($_POST['school-id']),
						'school_name' => trim($_POST['school_name'])
					];
					if ($this->schoolModel->editSchool($param)) {
						redirect('schools/index');
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
			$school = $this->schoolModel->getSchool($id); 
			$param = ['school' => $school,];
			$this->view('schools/edit', $param);
		}

		public function delete(){ }
	}	
?>