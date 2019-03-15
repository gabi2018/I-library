<?php
	class Topics extends Controller{
		private $topicModel;

	// conectar el modelo con los temas
		public function __construct(){
			$this->topicModel = $this->model('Topic');
			
		}

	//se traen lo temas y se muestra en la vista
		public function index(){
			$topics = $this->topicModel->getTopics();
			$param = ['topics' => $topics
			];
			$this->view('topics/index', $param);	
		}	

		public function create(){
			$this->view('topics/create');
		}
	// almacenando el tema
	
		public function store(){
			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['topic-register'])){
				if(isset($_POST['topic-name'])){
					$param = ['topic-name' => trim($_POST)['topic-name']];

					if($this->topicModel->addTopic($param)){

						redirect ('topics/index');	
					}
					else{
						die("ERROR");
					}
				}
			}
		}	
	}
?>