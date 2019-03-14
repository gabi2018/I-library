<?php
	class Topics extends Controller{
		private $topicModel;

	// conectar el modelo con los temas
		public function __construct(){
			$this->topicModel = $this->model('Topic');
			session_start();
		}

	//se llama a la vista del tema
		public function viewTopic(){

			$this->view('topic/create');	
		}	

	// almacenando el tema
	
		public function store(){
			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
				if(!empty($_POST['topic_name'])){
					$param = ['topic_name' => trim($_POST)['topic_name']];
					if($this->topicModel->topicRecord($param)){

					// redirect ('topic/create.php');	
						echo "save ok";

					}
					else{
						//redirect ('app/views/topic/create.php');
						echo "error";
					}
				}
			}
		}	
	}
?>