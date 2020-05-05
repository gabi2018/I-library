<?php
	class Topics extends Controller{
		private $topicModel;

		public function __construct(){
			$this->topicModel = $this->model('Topic');
		}

		public function index(){
			$topics = $this->topicModel->getTopics();
			$param = [ 'topics' => $topics ];
			$this->view('topics/index', $param);
		}

		public function store(){
			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['topic-register'])){ 
				if($this->topicModel->getInit()){
					redirect('subjets/index.php');		
					echo 'guardado con exito';		
				}	 
				else{
					echo 'ya se guardaron los temas';
				}
			}
		}

		public function SearchTopicCDU($cdu){
			$topic = $this->topicModel->getTopic($cdu); 
		}
	}
?>